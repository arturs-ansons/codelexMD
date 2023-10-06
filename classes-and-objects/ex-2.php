<?php
class Point {
    private int $num1;
    private int $num2;

    public function __construct(int $num1, int $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function swapPoints(Point $a, Point $b) {
        $tempNum1 = $a->num1;
        $tempNum2 = $a->num2;
        $a->num1 = $b->num1;
        $a->num2 = $b->num2;
        $b->num1 = $tempNum1;
        $b->num2 = $tempNum2;
    }

    public function getNum1() {
        return $this->num1;
    }

    public function getNum2() {
        return $this->num2;
    }
}

class Main {
    public static function main() {
        $p1 = new Point(5, 2);
        $p2 = new Point(-3, 6);

        $p1->swapPoints($p1, $p2);

        echo "(" . $p1->getNum1() . ", " . $p1->getNum2() . ")";
        echo "(" . $p2->getNum1() . ", " . $p2->getNum2() . ")";
    }
}

Main::main();
