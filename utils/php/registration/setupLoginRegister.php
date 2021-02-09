<?php

    if(isset($_SESSION) == false)
        session_start();

    include '../../Alert.php';
    include '../..//Database.php';
    include '../../UserProfile.php'; 

    //muss dass hier weg? oder mit isset?
    $db = unserialize($_SESSION['db']);    

?>