<?php

    require_once('utils/php/init.php');

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

        <script src="utils/js/registration/register.js"></script>

    </head>

    <body>

        <div id = "form-container">

            <h2>Register</h2>
            <h3>to Accounting-Sheet</h3>

            <form action = "" method = "POST" id = "form-register">

                <input type = "text" id = "input-username" name = "input-username" placeholder="Username" autocomplete="username">

                <input type = "email" id = "input-email" name = "input-email" placeholder="EMail" autocomplete="username">

                <input type = "password" id = "input-password" name = "input-password" placeholder="Password" autocomplete="new-password">

                <input type = "password" id = "input-password2" name = "input-password2" placeholder="Password" autocomplete="new-password">

                <input type = "submit" name = "submit-register" value = "REGISTER">

            </form>

            <a href = "index.php" id = "label-sign-up">Already registered?</a>

        </div>

    </body>

</html>

















