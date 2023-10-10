<?php

$num = "67";

switch ($num) {
    case $num<50:
        echo "low";
        break;
    case $num > 50 && $num<100:
        echo "medium";
        break;
    default:
        echo "high";
}
