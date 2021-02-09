<?php

    require_once('../../../../utils/php/setup.php');

    //save received data into variable
    $userId = $user->getUserId();
    $password = $_POST['password'];


    if(trim($_POST['password']) === "") {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput7"]]);
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

    $sql = "DELETE FROM user WHERE userId = '$userId'";

    $result = $db->query($sql);

    //try to delete row (because of foreign keys), if not possible set flag
    if($result === TRUE) {
        deleteUsersProfilePic($user);
        unset($_SESSION['user']);
        echo json_encode([true, '../index.php']);
        return;
    }

    $sql = "UPDATE user SET active = 0, deleted = 1 WHERE userId = '$userId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["DeleteAccount"]]);
        return;
    }

    deleteUsersProfilePic($user);

    unset($_SESSION['user']);
    echo json_encode([true, '../index.php']);

    function deleteUsersProfilePic($user) {
    //if user has profile pic, delete is as well
        if($user->getProfilePicName() != NULL) {
            $picName = $user->getProfilePicName();
            unlink("../../../../utils/css/img/profile_img/".$picName);
        }
    }

?>