<?php

    require_once('../../../../../../utils/php/setup.php');

    include('../../../../../../utils/php/NumberFormat.php');

    //save received data into variable
    $advanceId = $_POST["advanceId"];

    $userId = $user->getUserId();
    //check if valid advanceId => user has this advanceId
    $sql = "SELECT advanceId FROM advance WHERE userId = '$userId' AND advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput17"]]);
        return;
    }

    //get of received advanceId the travelId, categoryId. date, amount, description
    $sql = "SELECT date, advance FROM advance WHERE advanceId = '$advanceId'";

    //execute sql code
    $result = $db->query($sql);

    //get data of result
    $row = mysqli_fetch_assoc($result);

    $advance = $row['advance'];

    if($user->getNumberFormat() != "en_US") {
        $advance = str_replace('.', ',', $advance);
    }

    //save data in array
    $array = array($row['date'], $advance);

    //return array
    echo json_encode([true, $array,JSON_UNESCAPED_UNICODE]);

?>