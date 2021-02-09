<?php

    require_once('../../../../../../utils/php/setup.php');

    //save received date into variables //trim: removes white-spaces before and after text
    $advanceId = $_POST['advanceId'];
    $date = $_POST['date'];
    $advance = str_replace(',', '.', trim($_POST['advance']));

    $userId = $user->getUserId();
    //check if valid advanceId => user has this advanceId
    $sql = "SELECT advanceId FROM advance WHERE userId = '$userId' AND advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput17"]]);
        return;
    }

    //check if advance is a number
    if(is_numeric($advance) === false || $advance < 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput6"]]);
        return;
    }

    //overwrite date and advance of user
    $sql = "UPDATE advance SET date = '$date', advance = '$advance' WHERE advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["UpdateError1"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);

?>