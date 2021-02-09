<?php

    require_once('../../../../utils/php/setup.php');
    require_once('../utils/AllowedToModify.php');

    //save received data into variable
    $userId = $_POST['userId'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //if userId is empty
    if($userId === "0" || !isAllowedToModify($userId, $user->getRankId(), $db)) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput8"]]);
        return;
    }

    if(trim($password) == "" || trim($password2) == "" || strcmp($password, $password2) != 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput10"]]);
        return;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = '$hashedPassword ' WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["ChangeError3"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["ChangedPassword"]]);

?>