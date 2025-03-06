<?php
function checkDeanState($state) {
    $checkDeanState = false;

    switch ($state) {
        case 7:
            $checkDeanState = true;
            echo "7";
            break;
        case 15:
            $checkDeanState = true;
            echo "15";
            break;
        case 20:
            $checkDeanState = true;
            echo "20";
            break;
        case 25:
            $checkDeanState = true;
            echo "25";
            break;
        case 30:
            $checkDeanState = true;
            echo "30";
            break;
        case 34:
            $checkDeanState = true;
            echo "34";
            break;
        default:
            $checkDeanState = false;
            break;
    }

    return $checkDeanState;
}
