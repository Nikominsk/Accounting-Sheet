<?php

    require_once('../../../../utils/php/setup.php');
    require_once('../utils/AllowedToModify.php');

    //save received data into variable
    $userId = $_POST['userId'];
    $rankId = $_POST['rankId'];

    //if username is empty
    if($userId === "0" || $rankId === "0" || !isAllowedToModify($userId, $user->getRankId(), $db)) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput7"]]);
        return;
    }

    $sql = "UPDATE user SET rankId = '$rankId' WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([false,$lang[$user->getLanguage()]["ChangeError4"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["ChangedRank"]]);

?>