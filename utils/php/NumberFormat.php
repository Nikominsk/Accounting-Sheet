<?php

    function getFormattedNumber($number, $numberFormat) {
        if($numberFormat == "de_DE") return number_format($number, 2, ',', '.');
        else return number_format($number, 2, '.', ',');
    }

    function getDateFormat($numberFormat) {
        if($numberFormat == "de_DE") return "%d.%m.%y";
        else return "%y-%m-%d"; //en_US
    }

    function getRegion($numberFormatId) {

    }

?>