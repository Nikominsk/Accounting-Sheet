<?php
    require_once('../../../../utils/php/setup.php');

    $htmlText = "";

    //get data from table category
    $sql = "SELECT userId, username FROM user";

    $result = $db->query($sql);

    //if no results
    if ($result->num_rows == 0) {
        alertFailure($lang[$user->getLanguage()]["LoadError2"]);
    } else {
        //list all categories
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            $htmlText .= "<option value='$row[0]'>" . $row[1] . "</option>";

        }
    }

    echo $htmlText;
?>