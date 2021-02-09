<?php

    require_once('../../../../../../utils/php/setup.php');

    $costId = $_POST['costId'];

    $userId = $user->getUserId();

    //check if valid costId => user has this costId
    $sql = "SELECT costId FROM cost WHERE userId = '$userId' AND costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput18"]]);
        return;
    }

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