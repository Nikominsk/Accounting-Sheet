<?php

    require_once('../../../../utils/php/setup.php');

    include '../../../../utils/php/NumberFormat.php';


    $userId = $user->getUserId();
    $filterYears = $_POST["filterYears"];

    //get current year
    $curDateYear = date("Y");

    //get category-label and its summed cost for the sended year
    //$sql = "SELECT category.label, IFNULL(SUM(amount),0) as cost FROM category LEFT JOIN cost ON category.categoryId = cost.categoryId  AND cost.userId = '$userId'";
 
    $sql ="SELECT category.label, (SELECT IFNULL(SUM(amount),0) as cost FROM cost WHERE cost.categoryId = category.categoryId AND cost.userId = '$userId'";

    //filter year
    if(count($filterYears) >= 2) {
        $sql .= " AND (year(cost.date) = '$filterYears[1]'";
        for ($i = 2; $i < count($filterYears); $i++) {
            $sql .= " OR year(cost.date) = '$filterYears[$i]'";
        }
        $sql .= ")";
    }

    $sql .= ") as cost FROM category GROUP BY category.label ORDER BY category.categoryId";


    //execute sql code
    $result = $db->query($sql);

    $array = [];

    //run though data of result
    while($row = mysqli_fetch_assoc($result)) {
        //add each data to array
        array_push($array, (object) [
                                        'label' => $row['label'],
                                        'amount' => $row['cost']
                                    ]);

    }

    //send array back
    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>