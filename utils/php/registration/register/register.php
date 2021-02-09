<?php

    require_once('../setupLoginRegister.php');

    $username = trim($_POST['username']); //get input user typed for username
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password2 = trim($_POST['password2']);

    if (preg_match("/^[0-9A-Za-z_-]+$/", $username) == 0) {
        echo "Invalid username, allowed characters: numbers, letters, underscore, dash";
        return;
    }

    //now check if username-input is email or username (user can choose between them)
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-Mail is not valid";
        return;
    }

    //check user input -> two times the same password
    //strcmp takes care of 	upper and lower case
    if (strcmp($password, $password2) !== 0) {
        echo "Passwords must be the same";
        return;
    }

    //check email already registered
    $sql = "SELECT username, email FROM user WHERE email = '$email'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo "E-Mail must be registered (for more information contact a secretary or boss)";
        return;
    }

    //check account exists already for this email
    $row = $result->fetch_array(MYSQLI_BOTH);

    if($row['username'] !== NULL) {
        echo "An account already exists for this email";
        return;
    }

    //check username already taken
    $sql = "SELECT username FROM user WHERE username = '$username'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows != 0) {
        echo "Username already taken";
        return;
    }

    //add a new setting Id for user
    $sql = "INSERT INTO setting () values ()";

    $settingId;

    $result = $db->insert($sql);

    if ($result === FALSE) {
        echo "Server error";
        return;
    } else {
        $settingId = $result;
    }

    //register user

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE user
            SET username = '$username', password = '$hashedPassword', settingId = '$settingId'
            WHERE email = '$email'";

    //execute sql code
    $result = $db->query($sql);

    if ($result === FALSE) {
        echo "Registration failed";
        return;

    }

    //route user to to Login-page
    echo "<script>window.location.replace('index.php');</script>";

?>