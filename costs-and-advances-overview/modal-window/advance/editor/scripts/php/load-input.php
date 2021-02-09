<?php

    require_once('../../../../../../utils/php/setup.php');

    include('../../../../../../utils/php/NumberFormat.php');

    //save received data into variable
    $advanceId = $_POST["advanceId"];

    //get of received advanceId the travelId, categoryId. date, amount, description
    $sql = "SELECT advance.userId, date, advance FROM advance, user WHERE advance.userId = user.userId AND advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    //get data of result
    $row = mysqli_fetch_assoc($result);

    $advance = $row['advance'];
    if($user->getNumberFormat() != "en_US") {
        $advance = str_replace('.', ',', $advance);
    }

    //save data in array
    $array = array($row['userId'], $row['date'], $advance);

    //return array
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
    
?>