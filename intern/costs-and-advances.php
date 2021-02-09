<?php

    require_once('../utils/php/setup.php');

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
    <link rel = "stylesheet" type = "text/css" href = "../utils/css/dataTable.css">

    <!-- JQuery include -->
    <script src = "https://code.jquery.com/jquery-3.4.1.min.js"></script>   <!-- able to update part of page with php -->

    <script type = "text/javascript" src = "../dist/bundle.js"></script>

    <script type = "text/javascript" src = "../utils/js/DataTable/dataTable.js"></script>


    <!-- sidemenu open/close -->
    <script src = "../templates/sidemenu/scripts/js/nav-close-open.js"></script>

    <!-- for appearing/disappearing profile menu -->
    <script src = "../templates/header/scripts/js/profile-menu-appear-disappear.js"></script>

    <script src="../utils/js/utils.js"></script>

    <script src= "../utils/js/TableCSVConverter/TableCSVConverter.js"></script>

    <script src = "../costs-and-advances/scripts/js/onload/onload.js"></script>
    <script src = "../costs-and-advances/scripts/js/cost/filter-cost-table.js"></script>
    <script src = "../costs-and-advances/scripts/js/cost/refresh-cost-table.js"></script>
    <script src = "../costs-and-advances/scripts/js/advance/filter-advance-table.js"></script>
    <script src = "../costs-and-advances/scripts/js/advance/refresh-advance-table.js"></script>

    <!-- for appearing filter-modal-window -->
    <script src="../costs-and-advances/modal-window/cost/filter/scripts/js/actions.js"></script>
    <script src="../costs-and-advances/modal-window/advance/filter/scripts/js/actions.js"></script>

    <script src="../costs-and-advances/modal-window/cost/editor/scripts/js/actions.js"></script>
    <script src="../costs-and-advances/modal-window/advance/editor/scripts/js/actions.js"></script>

    <title>Accounting-Sheet</title>

</head>
<body>

    <!-- includes of filter-windows -->
    <?php include('../costs-and-advances/modal-window/cost/filter/html/'.$user->getLanguage().'/modal-window-filter-cost.php');?>
    <?php include('../costs-and-advances/modal-window/advance/filter/html/'.$user->getLanguage().'/modal-window-filter-advance.php');?>

    <!-- includes of editor-windows -->
    <?php include('../costs-and-advances/modal-window/cost/editor/html/'.$user->getLanguage().'/editor-window-cost.php');?>
    <?php include('../costs-and-advances/modal-window/advance/editor/html/'.$user->getLanguage().'/editor-window-advance.php');?>

    <div id = "wrapper">

        <!-- include header.html -->
        <?php include('../templates/header/html/'.$user->getLanguage().'/header.php'); ?>

        <main>

            <!-- include header.html -->
            <?php include('../templates/sidemenu/html/'.$user->getLanguage().'/sidemenu.php'); ?>

            <div id = "content-wrapper">

                <content>

                    <?php include('../costs-and-advances/html/'.$user->getLanguage().'/costs-and-advances.php'); ?>

                </content>

            </div>

        </main>


    </div>


</body>
</html>

