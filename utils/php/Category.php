<?php
    require_once('setup.php');

    $htmlText = "";

    //get data from table category
    $sql = "SELECT * FROM category";

    $result = $db->query($sql);
    //if no results
    if ($result->num_rows == 0) {
        alertFailure($lang[$user->getLanguage()]["LoadError1"]);
    } else {

        $firstRow = mysqli_fetch_array($result,MYSQLI_NUM);

        //list all categories
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            $htmlText .= "<option value='$row[0]'>" . $row[1] . "</option>";

        }

        $htmlText .= "<option value='$firstRow[0]'>" . $lang[$user->getLanguage()][$firstRow[1]] . "</option>";

    }

    echo $htmlText;
?>