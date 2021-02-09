<?php
    require_once('setup.php');

    include 'NumberFormat.php';

    $db->connect();

    if($db->isConnected() == FALSE) {
        echo "Connection to database failed";
        return;
    }

    //save sended data
    $userId = $_POST["userId"];
    $numberFormatId = $user->getNumberFormatId();

    //get current year
    $curDateYear = date("Y");

    ////////////////////* CURRENT COSTS *////////////////////

    // ---
    /*
    $sqlCostCurYear = "SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) = 2020";
    $sqlCostPrevYear = "SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) = 2020";
    $sqlAdvanceCurYear = "SELECT SUM(advance) FROM advance WHERE advance.userId WHERE advance.userId = user.userId AND year(date) = 2020";
    $sqlAdvancePrevYears = "SELECT SUM(advance) FROM advance WHERE advance.userId WHERE advance.userId = user.userId AND year(date) < 2020";

    //surplusPreviousYearsValue and current state is missing, will be calculated
    $sql = "SELECT ('$sqlCostCurYear') AS curyear, ('$sqlCostCurYear') AS curyear, ";
    */
    // ---

    //sum costs of current year    
    $sql = "SELECT SUM(amount) FROM cost WHERE userId = ". $userId  ." AND year(date) = ". $curDateYear;

    echo $sql;

    return;

    //execute sql code
    $result = $db->fastQuery($sql);

    //get data of result
    $row = $result->fetch_array();

    //get summed costs
    $currentCostValue = $row[0];    

    if($row[0] == 0) $currentCostValue = 0;

    ////////////////////* CURRENT ADVANCE *////////////////////

    //sum advance of current year
    $sql = "SELECT SUM(advance) FROM advance WHERE userId = ". $userId ." AND year(date) = ". $curDateYear;

    //execute sql code
    $result = $db->fastQuery($sql);

    //get data of result
    $row = $result->fetch_array();

    //get summed advance
    $currentAdvance = $row[0];

    if($row[0] == 0) $currentAdvance = 0;

    ////////////////////* ADVANCE OF PREVIOUS YEARS *////////////////////

    //sum advance of previous years
    $sql = "SELECT SUM(advance) FROM advance  WHERE userId = ". $userId ." AND year(date) < ". $curDateYear;

    //execute sql code
    $result = $db->fastQuery($sql);

    //get data of result
    $row = $result->fetch_array();

    //get summed advance
    $advancePreviousYears = $row[0];

    if($row[0] == 0) $advancePreviousYears = 0;


    ////////////////////* COSTS OF PREVIOUS YEARS *////////////////////

    //sum costs of previous years
    $sql = "SELECT SUM(amount) FROM cost WHERE userId = ". $userId ." AND year(date) < ". $curDateYear;

    //execute sql code
    $result = $db->fastQuery($sql);

    //get data of result
    $row = $result->fetch_array();

    //get summed costs of previous year
    $costsPreviousYears = $row[0];

    if($row[0] == 0) $costsPreviousYears = 0;

    /* surplus previous years */
    $surplusPreviousYearsValue = $advancePreviousYears - $costsPreviousYears;

    //add to the current advance the rest of previous years
    $advanceValue = $currentAdvance + $surplusPreviousYearsValue;       

    /* CURRENT_STATE */    
    $currentStateValue = $advanceValue - $currentCostValue;

  
    //add variables to an array and round each variable on the 2th number after the comma      
    $array = array(getFormattedNumber(round($currentCostValue, 2), $numberFormatId), 
                    getFormattedNumber(round($advanceValue, 2), $numberFormatId), 
                    getFormattedNumber(round($surplusPreviousYearsValue, 2), $numberFormatId), 
                    getFormattedNumber(round($currentStateValue, 2), $numberFormatId));
   
    $db->close();

    //return array
    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>