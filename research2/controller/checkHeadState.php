<?php
function checkHeadState($state) {
    $checkHeadState = false;

    switch ($state) {
        case 3:
            $checkHeadState = true;
            echo "3";
            break;
        case 12:
            $checkHeadState = true;
            echo "12";
            break;
        case 17:
            $checkHeadState = true;
            echo "17";
            break;
        case 22:
            $checkHeadState = true;
            echo "22";
            break;
        case 27:
            $checkHeadState = true;
            echo "27";
            break;
        case 31:
            $checkHeadState = true;
            echo "31";
            break;
        default:
            $checkHeadState = false;
            break;
    }
    return $checkHeadState;
}