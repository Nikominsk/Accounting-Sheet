<?php

    if(isset($_SESSION) == false)
            session_start();

    include 'Database.php';
    include 'UserProfile.php';

    $db = new Database();

    //used if user logs out
    if(isset($_SESSION['user'])) {
        
        $user = unserialize($_SESSION['user']);
        $user = NULL;
        $_SESSION['user'] = serialize($user); 

    }

    $_SESSION['db'] = serialize($db);    

?>