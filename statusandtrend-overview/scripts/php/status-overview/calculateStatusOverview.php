<?php
    require_once('../../../../utils/php/setup.php');

    include '../../../../utils/php/NumberFormat.php';

    //save sended data
    $numberFormat = $user->getNumberFormat();

    //get current year
    $curDateYear = date("Y");

    $sql = "SELECT  IFNULL((SELECT SUM(amount) FROM cost WHERE year(date) = '$curDateYear'), 0) AS curCosts,
            IFNULL((SELECT SUM(amount) FROM cost WHERE year(date) < '$curDateYear'), 0) AS prevCosts,
            IFNULL((SELECT SUM(advance) FROM advance WHERE year(date) = '$curDateYear'), 0) AS curAdvance,
            IFNULL((SELECT SUM(advance) FROM advance WHERE year(date) < '$curDateYear'), 0) AS prevAdvance";

    //execute sql code
    $result = $db->query($sql);

    $row = mysqli_fetch_assoc($result);

    $surplusPreviousYearsValue = $row['prevAdvance'] - $row['prevCosts'];
    $advanceValue = $row['curAdvance'] + $surplusPreviousYearsValue;
    $currentStateValue = $advanceValue - $row['curCosts'];

    $array = array(getFormattedNumber(round($row['curCosts'], 2), $numberFormat), 
                    getFormattedNumber(round($advanceValue, 2),  $numberFormat), 
                    getFormattedNumber(round($surplusPreviousYearsValue, 2), $numberFormat), 
                    getFormattedNumber(round($currentStateValue, 2),  $numberFormat));

    //return array
    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>