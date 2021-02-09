<?php

    require_once('../../../../utils/php/setup.php');

    $newLanguage = $_POST['language'];
    $userSettingId = $user->getSettingId();

    //get label-information from table category 
    $sql = "SELECT languageId FROM language WHERE language = '$newLanguage'";

    //execute sql code
    $result = $db->query($sql);

    //no results
    if($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["ChangeError1"]]);
        return;
    }

    //get data of result
    $row = $result->fetch_array();

    //selected format id
    $newLanguageId = $row[0];

    //save password of user into database
    $sql = "UPDATE setting
            SET languageId = '$newLanguageId'
            WHERE settingId = '$userSettingId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) { 
        echo json_encode([false, $lang[$user->getLanguage()]["ChangeError1"]]);
        return;
    }

    //now have to update users profile
    $user->setLanguageId($newLanguageId);
    $user->setLanguage($newLanguage);

    $_SESSION['user'] = serialize($user); 

    echo json_encode([true, $lang[$user->getLanguage()]["ChangedLanguage"]]);

?>