<?php

    require_once('../../../../../../utils/php/setup.php');

    include('../../../../../../utils/php/NumberFormat.php');

    //save received data into variable
    $costId = $_POST["costId"];

    $userId = $user->getUserId();
    //check if valid costId => user has this costId
    $sql = "SELECT costId FROM cost WHERE userId = '$userId' AND costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    if ($result->num_rows == 0) {
        echo json_encode([false, $lang[$user->getLanguage()]["InvInput18"]]);
        return;
    }

    //get of received costId the travelId, categoryId. date, amount, description
    $sql = "SELECT travelId, categoryId, date, amount, description FROM cost WHERE costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    //get data of result
    $row = mysqli_fetch_assoc($result);

    $amount = $row['amount'];
    if($user->getNumberFormat() != "en_US") {
        $amount = str_replace('.', ',', $amount);
    }

    //save data in array
    $array = array($row['travelId'], $row['categoryId'], $row['date'], $amount, $row['description']);

    $_SESSION['travelIdBeforeLoad'] = $row['travelId'];

    //return array
    echo json_encode([true, $array,JSON_UNESCAPED_UNICODE]);

?>