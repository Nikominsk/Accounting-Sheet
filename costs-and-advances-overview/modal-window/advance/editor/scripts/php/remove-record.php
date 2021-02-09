<?php

    require_once('../../../../../../utils/php/setup.php');

    $advanceId = $_POST['advanceId'];

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