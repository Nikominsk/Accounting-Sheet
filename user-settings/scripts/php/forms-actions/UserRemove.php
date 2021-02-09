<?php

    require_once('../../../../utils/php/setup.php');
    require_once('../utils/AllowedToModify.php');

    //save received data into variable
    $userId = $_POST['userId'];

    //if userId is empty
    if($userId === "0" || !isAllowedToModify($userId, $user->getRankId(), $db)) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput8"]]);
        return;
    }    

    $sql = "DELETE FROM user WHERE userId = '$userId'";

    $result = $db->query($sql);

    //try to delete row (because of foreign keys), if not possible set flag
    if($result === TRUE) {
        echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);
        return;
    }

    $sql = "UPDATE user SET active = 0, deleted = 1 WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([true, $lang[$user->getLanguage()]["RemoveError1"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);

?>