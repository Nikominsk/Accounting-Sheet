<?php
    require_once('../../../../../utils/php/setup.php');

    include '../../../../../utils/php/NumberFormat.php';

    $numberFormat = $user->getNumberFormat();

    if(isset($_SESSION) == false)
        session_start();


    if(isset($_SESSION['total-costs'])) {
        echo getFormattedNumber($_SESSION['total-costs'],  $numberFormat);
    } else {
        echo getFormattedNumber(0,  $numberFormat);
    }

?>