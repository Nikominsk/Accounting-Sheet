<?php

    require_once('../utils/php/setup.php');

    if($user->getRankId() == 1) {
        header('Location: ../intern/entry.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- codification -->
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- disable x-scroll -->
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

    <!--Icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!--DESIGN LAYOUT -->
    <link rel = "stylesheet" type = "text/css" href = "../utils/css/template.css">
    <link rel = "stylesheet" type = "text/css" href = "../utils/css/global.css">


    <!-- JQuery include -->
    <script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>   <!-- able to update part of page with php -->

    <!-- sidemenu open/close -->
    <script src = "../templates/sidemenu/scripts/js/nav-close-open.js"></script>

    <!-- for appearing/disappearing profile menu -->
    <script src="../templates/header/scripts/js/profile-menu-appear-disappear.js"></script>

    <script src="../utils/js/utils.js"></script>

    <script src = "../user-settings/scripts/js/onload/onload.js"></script>

    <title>Accounting-Sheet-Entry</title>

</head>
<body>

    <div id = "wrapper">

    <!-- include header.html -->
    <?php include('../templates/header/html/'.$user->getLanguage().'/header.php'); ?>

    <main>

        <!-- include header.html -->
        <?php include('../templates/sidemenu/html/'.$user->getLanguage().'/sidemenu.php'); ?>

        <div id = "content-wrapper">

            <content>

                <?php include('../user-settings/html/'.$user->getLanguage().'/user-settings.php'); ?>

            </content>

        </div>

    </main>


    </div>

</body>
</html>

