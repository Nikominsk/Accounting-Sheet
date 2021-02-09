<?php

    require_once('../../../../utils/php/setup.php');

    $myRankId = $user->getRankId();

    $firstOptionText = $_POST['firstOptionText'];
    $active = (bool) $_POST['active'];
    $deleted = (bool) $_POST['deleted'];

    if(!isset($_POST['active'])) {
        $active = NULL;
    }

    if(!isset($_POST['deleted'])) {
        $deleted = NULL;
    }

    //get userId, username of database-table user of all user who are active and not deleted
    $sql = "SELECT userId, username FROM user WHERE password IS NOT NULL AND rankId < '$myRankId'";

    if($active === TRUE) {
        $sql .= " And active = 1";
    } else if($active === FALSE) {
        $sql .= " And active = 0";
    } 

    if($deleted === FALSE) {
        $sql .= " And deleted = 0";
    } else if($deleted === TRUE) {
        $sql .= " And deleted = 1";
    } 


    $result = $db->query($sql);

    //if no results
    if (!$result) {
        alertFailure($lang[$user->getLanguage()]["LoadError2"]);
    } else {

        echo '<option value = "0">'.$lang[$user->getLanguage()][$firstOptionText].'</option>';
        //list all categories
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            echo "<option value='$row[0]'>" . $row[1] . "</option>";

        }
    }

?>