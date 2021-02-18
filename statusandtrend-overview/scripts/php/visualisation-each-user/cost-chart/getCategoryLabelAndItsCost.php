<?php

    require_once('../../../../../utils/php/setup.php');

    include '../../../../../utils/php/NumberFormat.php';

    $filterYears = $_POST["filterYears"];
    $userIds = $_POST["userIds"];
    $orderBy = $_POST["orderBy"];

    //get current year
    $curDateYear = date("Y");

    //get category-label and its summed cost for the sended year
    //$sql = "SELECT category.label, IFNULL(SUM(amount),0) as cost FROM category LEFT JOIN cost ON category.categoryId = cost.categoryId  AND cost.userId = '$userId'";

    $sql = "SELECT username, category.label, (SELECT IFNULL(SUM(amount),0) as cost FROM cost WHERE cost.categoryId = category.categoryId AND cost.userId = user.userId";

    //filter year
    $sql .= " AND (year(cost.date) = '$filterYears[0]'";

    for ($i = 1; $i < count($filterYears); $i++) {
        $sql .= " OR year(cost.date) = '$filterYears[$i]'";
    }

    $sql .= ") ) as cost FROM user, category WHERE username IS NOT NULL";

    if(count($userIds) >= 2) {

        if($userIds[1] === 'ONLYACTIVES') {
            $sql .= " AND user.active = 1";
        } else if ($userIds[1] === 'ONLYINACTIVES') {
            $sql .= " AND user.active = 0";
        } else {
            $sql .= " AND (user.userId = '$userIds[1]'";

            for ($i = 1; $i < count($userIds); $i++) {
                $sql .= " OR user.userId = '$userIds[$i]'";
            }

            $sql .= ")";
        }

    }

    $sql .= " GROUP BY username, category.label ORDER BY ". $orderBy . ", category.categoryId";

    //execute sql code
    $result = $db->query($sql);

    $usersArray = [];

    $userLabelArray = [];
    $userCostArray = [];


    //we do the first run manually for less if cases in loop
    $row = mysqli_fetch_assoc($result);

    $tmpLastUsername = null;

    if($row != FALSE) { //there are results

        array_push($userLabelArray, $row['label']);
        array_push($userCostArray, $row['cost']);

        //run though data of result
        $tmpLastUsername = $row['username'];

    }

    while($row = mysqli_fetch_assoc($result)) {

        if($tmpLastUsername !== $row['username']) {   //username changed

            array_push($usersArray, array($tmpLastUsername, $userLabelArray, $userCostArray));

            //reset array for next user
            $userLabelArray = [];
            $userCostArray = [];

            $tmpLastUsername = $row['username'];

        }

        array_push($userLabelArray, $row['label']);
        array_push($userCostArray, $row['cost']);

    }

    //last user gets not added in loop
    //=> do it manually
    if($tmpLastUsername != null) {
        array_push($usersArray, array($tmpLastUsername, $userLabelArray, $userCostArray));
    }

    //send array back
    echo json_encode($usersArray,JSON_UNESCAPED_UNICODE);

?>