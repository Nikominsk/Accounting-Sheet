<?php

    require_once('../../../../../../utils/php/setup.php');

    $advanceId = $_POST['advanceId'];

    $userId = $user->getUserId();
    //check if valid advanceId => user has this advanceId
    $sql = "SELECT advanceId FROM advance WHERE userId = '$userId' AND advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput17"]]);
        return;
    }

    //delete the date where advanceId is equal to the global variable "advanceId_edit"
    $sql = "DELETE FROM advance WHERE advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["RemoveError1"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);


?>