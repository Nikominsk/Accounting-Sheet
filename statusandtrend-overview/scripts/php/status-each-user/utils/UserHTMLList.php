<?php
    require_once('../../../../utils/php/setup.php');

    $htmlText = "";

    $sql = "SELECT userId, username FROM user";

    $result = $db->query($sql);

    //if no results
    if ($result->num_rows == 0) {
        alertFailure($lang[$user->getLanguage()]["LoadError2"]);
    } else {

        $htmlText .= "<option value = 'ALL' >". $lang[$user->getLanguage()]["All"] ."</option>";
        $htmlText .= "<option value = 'ONLYACTIVES' selected>". $lang[$user->getLanguage()]["OnlyActiveUser"] ."</option>";
        $htmlText .= "<option value = 'ONLYINACTIVES'>". $lang[$user->getLanguage()]["OnlyInactiveUser"] ."</option>";

        //list all categories
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            echo "<option value='$row[0]'>" . $row[1] . "</option>";
        }
        
    }

    echo $htmlText;
?>