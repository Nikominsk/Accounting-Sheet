<?php

    if(isset($_SESSION) == false)
        session_start();

    include 'Alert.php';
    include 'Database.php';
    include 'UserProfile.php';
    include 'translation.php';


    $db = unserialize($_SESSION['db']);
    $user = unserialize($_SESSION['user']);

    $jsLang = "hellou"; //$lang[$user->getLanguage()];

    //if user is not logged send him to login page
    if($user == NULL) {
        header("Location: ./../index.php");
    }

?>