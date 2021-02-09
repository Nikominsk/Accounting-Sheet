<?php

        require_once('../../../../utils/php/setup.php');

        //save inputs in variables //trim removes white spaces before and after text
        $date= trim($_POST['date']);
        $advance = str_replace(',', '.', trim($_POST['advance']));

        //check whether the input advance is a number
        if(is_numeric($advance) === false || $advance < 0) {
            echo json_encode([false, $lang[$user->getLanguage()]["InvInput6"]]);
            return;
        }

        // get Id of user
        $userId = $user->getUserId();

        //save date and advance of user
        $sql = "INSERT INTO advance (userId, date, advance) VALUES ('$userId', '$date', '$advance')";

        //send sql-code to database and let it execute
        $result = $db->query($sql);

        //if database was not able to insert input
        if ($result === FALSE) {
            echo json_encode([false, $lang[$user->getLanguage()]["SaveError2"]]);
            return;
        }

        echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);

?>