<?php
    require_once('../../../../../utils/php/setup.php');

    $htmlText = "";

    $sql = "SELECT userId, username FROM user";

    $result = $db->query($sql);

    //if no results
    if ($result->num_rows == 0) {
        alertFailure($lang[$user->getLanguage()]["LoadError2"]);
    } else {

        $htmlText .= "<option value = 'ONLYACTIVES' selected>". $hlang[$user->getLanguage()]["onlyactiveuser"] ."</option>";
        $htmlText .= "<option value = 'ONLYINACTIVES'>". $hlang[$user->getLanguage()]["onlyinactiveuser"] ."</option>";

        //list all categories
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            $htmlText .= "<option value='$row[0]'>" . $row[1] . "</option>";
        }

    }

    echo $htmlText;
?>