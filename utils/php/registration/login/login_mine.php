<?php

    require_once('../setupLoginRegister.php');
    
    $userId = null;
    $usernameOrEmail = trim($_POST['username']); //get input user typed for username
    $email = null;
    $password = trim($_POST['password']); //get input user typed for password
    $settingId = null;
    $rankId = null;
    $hasAccess = 1; //default
    $isDeleted = 0; //default
    
    
    //check whether at least one input is empty
    if ($usernameOrEmail === "" || $password === "") {
        echo "Invalid Input";
        return;
    }

    //now check if username-input is email or username (user can choose between them)
    if(filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT userId, username, email, password, settingId, rankId, active, deleted  FROM user WHERE google_account = 0 AND email = '$usernameOrEmail'";
    } else {
        //must be a username
        $sql = "SELECT userId, username, email, password, settingId, rankId, active, deleted  FROM user WHERE google_account = 0 AND username = '$usernameOrEmail'";
    }

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo "Wrong username or password";
        return;
    }

    //Get all information of table user
    $row = mysqli_fetch_assoc($result);

    if(!password_verify($password, $row['password'])) {
        echo "Wrong username or password";
        return;
    }

    //get id of user 
    $userId = $row['userId'];

    $username = $row['username'];

    //get rankId of user
    $rankId = $row['rankId'];

    //get access of user
    $hasAccess = $row['active'];

    //get deleted of user
    $isDeleted = $row['deleted'];

        //get formatId of user
        $settingId = $row['settingId'];

    //check if user has access to software
    if($hasAccess == 0) {
        echo "Access denied";
        return;
    }

    //check if user is deleted
    if($isDeleted == 1) {
        echo "User is deleted";
        return;
    }

    //getting settings of user

    $sql = "SELECT setting.languageId, language, number_formatId, number_format.format  FROM setting, language, number_format WHERE settingId = '$settingId' AND setting.languageId = language.languageId AND setting.number_formatId = number_format.formatId";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo "Could not load users profile";
        return;
    }

    //Get information of table setting
    $row = $result->fetch_array(MYSQLI_BOTH);

    $languageId = $row['languageId'];
    $language = $row['language'];

    $number_formatId = $row['number_formatId'];
    $number_format = $row['format'];

    $user = new UserProfile($userId, $username, $rankId, $settingId, $languageId, $language,  $number_formatId, $number_format);  
    $_SESSION['user'] = serialize($user);   //serilize the object to create a string representation

    //route user to to page Entry
    echo "Success";

?>