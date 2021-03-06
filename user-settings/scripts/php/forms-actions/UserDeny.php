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

    $sql = "UPDATE user SET active = 0 WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["AllowingError1"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["Denied"]]);

?>