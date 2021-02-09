<?php

        require_once('../../../../utils/php/setup.php');

        $categoryId = $_POST['category'];

        //if categoryId is equal to the default (not allowed) value
        if($categoryId === "0") {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput1"]]);
            return;
        }

        //save inputs in variables //trim removes white spaces before and after text
        $travelId = trim($_POST['travelId']); //could be empty
        $date = trim($_POST['date']);
        $amount = str_replace(',', '.', trim($_POST['amount']));
        $description = trim($_POST['description']);

        //if travelId is not empty
        if($travelId !== "") {
            //check if id is a whole number
            if(filter_var($travelId, FILTER_VALIDATE_INT) === false || $travelId < 0) {
                echo json_encode([false, $lang[$user->getLanguage()]["InvInput15"]]);
                return;
            }
            //check if travelId already exists
            $sql = "SELECT travelId FROM cost WHERE travelId = '$travelId'";
            //execute sql code
            $result = $db->query($sql);

            if ($result->num_rows != 0) {
                echo json_encode([false, $lang[$user->getLanguage()]["AlreadyExistsError3"]]);
                return;
            }
        }

        if(filter_var($categoryId, FILTER_VALIDATE_INT) === false || $categoryId < 0) {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput15"]]);
            return;
        }

        //check whether inputs are empty
        if($description === ""){
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput3"]]);
            return;
        } else if (preg_match("/^[0-9A-Za-z äöü ÄÖÜ .,_() -]+$/", $description) == 0) {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput14"]]);
            return;
        }

        //check whether the input amount is a number
        if(is_numeric($amount) === false || $amount < 0) {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput4"]]);
            return;
        }

        // get Id of user
        $userId = $user->getUserId();

        //save input
        $sql = "INSERT INTO cost (userId, travelId, categoryId, date, amount, description) VALUES ('$userId',  NULLIF('$travelId',''), '$categoryId', '$date', '$amount', '$description')";

        //send sql-code to database and let it execute
        $result = $db->query($sql);

        //if database was not able to insert input
        if ($result == FALSE) {
            echo json_encode([false, $lang[$user->getLanguage()]["SaveError1"]]);
            return;
        }

        echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);

?>