<?php
    //init
    require_once('utils/php/init.php');  //in login page

    include('utils/php/registration/google/GoogleLogin.php');

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

        <!-- for button -->
        <meta name="google-signin-client_id" content="366280318173-ddpb1h6ipv50thvummafk0uisa6nvjv2.apps.googleusercontent.com">
        <script src = "https://apis.google.com/js/platform.js"></script>

        <script src="templates/alert/scripts/js/alert.js"></script>

        <script src="utils/js/registration/login.js"></script>

    </head>

    <body>

        <div id = "form-container">

            <script>
                function onSuccess(googleUser) {
                    console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                }

                function onFailure(error) {
                    console.log(error);
                }

                function renderButton() {
                    gapi.signin2.render('my-signin2', {
                        'scope': 'profile email',
                        'width': 240,
                        'height': 30,
                        'longtitle': true,
                        'theme': 'dark',
                        'onsuccess': onSuccess,
                        'onfailure': onFailure
                    });
                }
            </script>

            <h2>Login</h2>
            <h3>to Accounting-Sheet</h3>

            <form action = "" method = "POST" id = "form-login">
 
                <input type = "text" id = "input-username" name = "input-username" placeholder="Username/EMail" autocomplete="username">
            
                <input type = "password" id = "input-password" name = "input-password" placeholder="Password" autocomplete="new-password">
               
                <p><a href = "#" id = "label-forgot-password">Forgot password</a></p>
              
                <input type = "submit" name = "submit-login" value = "LOGIN">
                
            </form>

            <p class = "text-algin-center ">or</p>

            <div id="my-signin2"></div>
            <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

            <a href = "register.php" id = "label-sign-up">Not registered yet?</a>


            
        </div>

    </body>

</html>

















