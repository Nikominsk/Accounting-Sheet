<?php

    require_once('../../../../utils/php/setup.php');

    //save received data into variable
    $email = trim($_POST['email']);

    //if email is empty
    if($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput11"]]);
        return;
    }

    //Check whether name already taken
    $sql = "SELECT * FROM user WHERE email = '$email'";

    //execute sql code
    $result = $db->query($sql);


    if ($result->num_rows != 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["AlreadyExistsError1"]]);
        return;
    }

    //Try to save email in database
    $sql = "INSERT INTO user (email) VALUES ('$email')";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput11"]]); 
        return;

    }

    echo json_encode([true, $lang[$user->getLanguage()]["Added"]]);
    

?>