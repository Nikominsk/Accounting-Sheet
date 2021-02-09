<?php

    require_once('../../../../utils/php/setup.php');

    //save received data into variable
    $category = trim($_POST['category']);

    if (preg_match("/^[0-9A-Za-z_äöüÄÖÜ-]+$/", $category) == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput16"]]);
        return;
    }

    $sql = "SELECT * FROM category WHERE label = '$category'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows != 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["AlreadyExistsError1"]]);
        return;
    }

    //Try to save category in database
    $sql = "INSERT INTO category (label) VALUES ('$category')";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["AddError1"]]);
        return;

    }

    echo json_encode([true, $lang[$user->getLanguage()]["Saved"]]);

?>