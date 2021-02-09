<?php

    require_once('../../../../utils/php/setup.php');

    $name = $_FILES['file']['name'];
    $fileError = $_FILES['file']['error'];
    $target_dir = "../../../../utils/css/img/profile_img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $userId = $user->getUserId();

    if ($fileError != UPLOAD_ERR_OK){
        echo json_encode([false, $lang[$user->getLanguage()]["UploadError1"]]);
        return;
    }
    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Check extension
    if(in_array($imageFileType,$extensions_arr) ){
        $userName = $user->getName();
        $storedImageName = $userId.$userName.".jpg";//.$imageFileType;

        // Upload file
        if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$storedImageName)) {
            $user->setProfilePicName($storedImageName);
            $_SESSION['user'] = serialize($user);
            echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);
        } else {
            echo json_encode([false, $lang[$user->getLanguage()]["UploadError1"]]);
        }

    } else {
        echo json_encode([false, $lang[$user->getLanguage()]["ExtensionError1"]]);
    }



?>