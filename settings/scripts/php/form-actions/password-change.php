<?php

    require_once('../../../../utils/php/setup.php');

    //save received data into variable
    $userId = $user->getUserId();

    $password = $_POST['password'];

    $passwordNew = $_POST['passwordNew'];
    $passwordNew2 = $_POST['passwordNew2'];


    if(trim($_POST['password']) === "" || trim($_POST['passwordNew']) === "" || trim($_POST['passwordNew2']) === "") {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput7"]]);
        return;
    }

    if(strcmp ($passwordNew, $passwordNew2)) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput10"]]);
        return;
    }

    //get password of user to compare with
    $sql = "SELECT password FROM user WHERE userId = '$userId'";

    $result = $db->query($sql);

    //Get all information of table user
    $row = mysqli_fetch_assoc($result);

    if(!password_verify($password, $row['password'])) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput9"]]);
        return;
    }

    $hashedPassword = password_hash($passwordNew, PASSWORD_DEFAULT);

    $sql = "UPDATE user SET password = '$hashedPassword' WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput9"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["ChangedPassword"]]);

?>