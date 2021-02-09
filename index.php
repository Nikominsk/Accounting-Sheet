<?php
    //init
    require_once('utils/php/init.php');  //in login page

?>

<!DOCTYPE html>
<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login Accounting-Sheet</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>

        <link rel = "stylesheet" type = "text/css" href = "utils/css/template.css">
        <link rel = "stylesheet" type = "text/css" href = "utils/css/registration.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="./utils/js/utils.js"></script>

        <script src="utils/js/registration/login.js"></script>

    </head>

    <body>

        <div id = "form-container">

            <h2>Login</h2>
            <h3>to Accounting-Sheet</h3>

            <form action = "" method = "POST" id = "form-login">

                <input type = "text" id = "input-username" name = "input-username" placeholder="Username/EMail" autocomplete="username">

                <input type = "password" id = "input-password" name = "input-password" placeholder="Password" autocomplete="new-password">

                <input type = "submit" name = "submit-login" value = "LOGIN">

            </form>

            <a href = "register.php" id = "label-sign-up">Not registered yet?</a>

        </div>

    </body>

</html>

















