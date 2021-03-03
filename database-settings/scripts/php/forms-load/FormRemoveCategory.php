<?php
    require_once('../../../../utils/php/setup.php');

    //get data from table category
    $sql = "SELECT categoryId, label FROM category";

    $result = $db->query($sql);

    //if no results
    if ($result->num_rows == 0) {
        alertFailure($lang[$user->getLanguage()]["LoadError1"]);
    } else {

        echo "<option value = '0'>". $hlang[$user->getLanguage()]["ccategory"] ."</option>";

        //option "other" is not deleteable, so dont even show it
        mysqli_fetch_array($result,MYSQLI_NUM);

        //list all ranks
        while($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
            echo "<option value='$row[0]'>" . $row[1] . "</option>";

        }
    }

?>