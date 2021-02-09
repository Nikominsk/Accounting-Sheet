<?php
    require_once('../../../../utils/php/setup.php');

    include '../../../../utils/php/NumberFormat.php';


    $userId = $user->getUserId();
    $numberFormat = $user->getNumberFormat();

    //get current year
    $curDateYear = date("Y");

    $sql = "SELECT  IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) = '$curDateYear'), 0) AS curCosts,
                    IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) < '$curDateYear'), 0) AS prevCosts,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND year(date) = '$curDateYear'), 0) AS curAdvance,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND year(date) < '$curDateYear'), 0) AS prevAdvance
                    FROM user WHERE userId = '$userId'";
                    

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


    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>