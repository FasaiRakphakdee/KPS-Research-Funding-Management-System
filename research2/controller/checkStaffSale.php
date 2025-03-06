<?php
function checkStaffState($state) {
    $checkStaffState = false;

    switch ($state) {
        case 4:
            $checkStaffState = true;
            echo "4";
            break;
        case 8:
            $checkStaffState = true;
            echo "8";
            break;
        case 13:
            $checkStaffState = true;
            echo "13";
            break;
        case 19:
            $checkStaffState = true;
            echo "19";
            break;
        case 24:
            $checkStaffState = true;
            echo "24";
            break;
        case 29:
            $checkStaffState = true;
            echo "29";
            break;
        case 33:
            $checkStaffState = true;
            echo "33";
            break;
        default:
            $checkStaffState = false;
            break;
    }

    return $checkStaffState;
}