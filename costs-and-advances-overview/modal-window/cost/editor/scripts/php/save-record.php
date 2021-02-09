<?php

    require_once('../../../../../../utils/php/setup.php');

    //save received variables into variables //trim: removes white-spaces before and after text
    $costId = $_POST['costId'];
    $userId = $_POST['userId'];
    $travelId = trim($_POST['travelId']);
    $categoryId = $_POST['categoryId'];
    $date = $_POST['date'];
    $description = trim($_POST['description']);
    $amount = str_replace(',', '.', trim($_POST['amount']));

    if($userId === "0") {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput8"]]);
        return;
    }

    //if received categoryId is the default value "choose category"
    if($categoryId === "0") {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput1"]]);
        return;
    }

    //if travelId is not empty
    if($travelId !== "") {
        //if travelId is not a whole number
        if(filter_var($travelId, FILTER_VALIDATE_INT) === false || $travelId < 0) {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput15"]]);
            return;
        }

        //check if travelId, when changed!, already exists
        if(isset($_SESSION['travelIdBeforeLoad']) && $_SESSION['travelIdBeforeLoad'] != $travelId
        || !isset($_SESSION['travelIdBeforeLoad'])) { //if sessionvar not set => sessionvariable != travelId automatically

            //check if travelId already exists
            $sql = "SELECT travelId FROM cost WHERE travelId = '$travelId'";
            //execute sql code
            $result = $db->query($sql);

            if ($result->num_rows != 0) {
                echo json_encode([false, $lang[$user->getLanguage()]["AlreadyExistsError3"]]);
                return;
            }
        }

    }

    if(filter_var($costId, FILTER_VALIDATE_INT) === false || $costId < 0
    || filter_var($categoryId, FILTER_VALIDATE_INT) === false || $categoryId < 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput15"]]);
        return;
    }

    //if at least one input is empty
    if($description === "" || $amount === ""){
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput3"]]);
        return;
    }

    if (preg_match("/^[0-9A-Za-z äöü ÄÖÜ .,_() -]+$/", $description) == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput14"]]);
        return;
    }

    //if amount is not a number
    if(is_numeric($amount) === false || $amount < 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput4"]]);
        return;
    }

    //overwrite travelId, categoryId, date, amount and description in database
    $sql = "UPDATE cost SET userId = '$userId', travelId = NULLIF('$travelId', ''), categoryId = '$categoryId', date = '$date', amount = '$amount', description = '$description' WHERE costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["UpdateError1"]]);
        return;
    }

    if(isset($_SESSION['travelIdBeforeLoad']))
        unset($_SESSION['travelIdBeforeLoad']);

    echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);

?>