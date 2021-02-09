<?php

    require_once('../../../../utils/php/setup.php');

    $newFormat = $_POST['format'];
    $userSettingId = $user->getSettingId();

    //get label-information from table category 
    $sql = "SELECT formatId FROM number_format WHERE format = '$newFormat'";

    //execute sql code
    $result = $db->query($sql);

    //no results
    if($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["ChangeError2"]]);
        return;
    }

    //get data of result
    $row = $result->fetch_array();

    //selected format id
    $newFormatId = $row[0];

    //save password of user into database
    $sql = "UPDATE setting
            SET number_formatId = '$newFormatId'
            WHERE settingId = '$userSettingId'";

    //execute sql code
    $result = $db->query($sql);

    //if execution failed
    if ($result == FALSE) {
        echo json_encode([false, $lang[$user->getLanguage()]["ChangeError2"]]);
        return;
    }

    //now have to update users profile
    $user->setNumberFormatId($newFormatId);
    $user->setNumberFormat($newFormat);

    $_SESSION['user'] = serialize($user); 

    echo json_encode([true, $lang[$user->getLanguage()]["ChangedFormat"]]);

?>