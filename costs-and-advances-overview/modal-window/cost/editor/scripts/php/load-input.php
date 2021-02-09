<?php

    require_once('../../../../../../utils/php/setup.php');

    include('../../../../../../utils/php/NumberFormat.php');

    //save received data into variable
    $costId = $_POST["costId"];

    //get of received costId the travelId, categoryId. date, amount, description
    $sql = "SELECT cost.userId, travelId, categoryId, date, amount, description FROM cost, user WHERE cost.userId = user.userId AND costId = '$costId'";

    //execute sql code
    $result = $db->query($sql);

    //get data of result
    $row = mysqli_fetch_assoc($result);

    $amount = $row['amount'];
    if($user->getNumberFormat() != "en_US") {
        $amount = str_replace('.', ',', $amount);
    }

    //save data in array
    $array = array($row['userId'], $row['travelId'], $row['categoryId'], $row['date'], $amount, $row['description']);

    $_SESSION['travelIdBeforeLoad'] = $row['travelId'];

    //return array
    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>