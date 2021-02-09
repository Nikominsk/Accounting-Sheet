<?php

    require_once('../../../../utils/php/setup.php');

    //save received data into variable
    $categoryId = $_POST['categoryId'];

    if($categoryId === "0") {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput7"]]);
        return;
    }

    if($categoryId === "1") {
        echo json_encode([false, $lang[$user->getLanguage()]["RemoveError3"]]);
        return;
    }

    //Try to save username in database
    $sql = "DELETE FROM category WHERE categoryId = '$categoryId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result === FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["RemoveError2"]]);
        return;
    }

    echo json_encode([true, $lang[$user->getLanguage()]["Removed"]]);

?>