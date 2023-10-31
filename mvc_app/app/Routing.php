<?php

namespace MvcApp;

use FastRoute\RouteCollector;
use MvcApp\Controller\ApiService;
use function FastRoute\simpleDispatcher;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Routing
{
    public static function dispatch()
    {
        $loader = new FilesystemLoader(__DIR__ . '/Views');
        $twig = new Environment($loader);
        $apiService = new ApiService(); // Create an instance of ApiService

        $dispatcher = simpleDispatcher(function (RouteCollector $r) {
            $r->addRoute('GET', '/', 'MvcApp\\Controller\\HomeController::index');
            $r->addRoute('GET', '/{episodeUser}', 'MvcApp\\Controller\\EpisodeController::index');
        });

        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = rawurldecode($_SERVER['REQUEST_URI']);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                // Handle 404 Not Found
                echo '404 Not Found';
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                // Handle 405 Method Not Allowed
                echo '405 Method Not Allowed';
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                list($controllerClass, $action) = explode('::', $handler);
                $controller = new $controllerClass($twig, $apiService); // Pass both $twig and $apiService to the controller constructor
                $controller->$action($vars);
                break;
        }
    }
}

