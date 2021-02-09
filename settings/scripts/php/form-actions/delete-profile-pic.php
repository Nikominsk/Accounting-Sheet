<?php
    require_once('../../../../utils/php/setup.php');

    $imgFolder = "../../../../utils/css/img/profile_img/";

    if($user->getProfilePicName() != NULL) {
        unlink($imgFolder.$user->getProfilePicName());
        $user->setProfilePicName(NULL);
        $_SESSION['user'] = serialize($user);

        echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);
    }else {
        echo json_encode([false, $lang[$user->getLanguage()]["NotFoundError1"]]);
    }

?>