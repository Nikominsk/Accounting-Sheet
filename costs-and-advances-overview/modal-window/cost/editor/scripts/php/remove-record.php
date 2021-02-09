<?php

    require_once('../../../../../../utils/php/setup.php');

    $costId = $_POST['costId'];

    //delete data where costId is equal to the global variable costId_edit
    $sql = "DELETE FROM cost WHERE costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["UpdateError1"]]);
        return;
    }

    if(isset($_SESSION['travelIdBeforeLoad']))
        unset($_SESSION['travelIdBeforeLoad']);

    echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);

?>