<?php

function isValidNumeric($number) {
    if(is_numeric($number) && intval($number) > 0 && intval($number) == $number){
        return true;
    }
    return false;
}

function isValidYear($year) {
    if (isValidNumeric($year)) {
        return strlen((string)$year) === 4;
    }

    return false;
}

echo isValidYear(2423);

?>