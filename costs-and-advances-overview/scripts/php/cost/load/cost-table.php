<?php

    require_once('../../../../../utils/php/setup.php');

    include('../../../../../utils/php/NumberFormat.php');

    //save received data into variables
    $descriptions = $_POST['descriptions'];
    $categoryIds = $_POST['categoryIds'];
    $userIds = $_POST['userIds'];
    $startPrice = $_POST['startPrice'];
    $endPrice = $_POST['endPrice'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $orderBy = $_POST['orderBy'];

    $numberFormat = $user->getNumberFormat();
    $dateFormat = getDateFormat($numberFormat);

    $sql = "SELECT costId, username, travelId, category.label, DATE_FORMAT(date, '$dateFormat') as date, amount,  description FROM cost, category, user WHERE cost.categoryId = category.categoryId AND cost.userId = user.userId AND user.deleted = 0";

    //filter user
    if(count($userIds) >= 2) {
        $sql .= " AND (user.userId = '$userIds[1]'";

        for ($i = 2; $i < count($userIds); $i++) {
            $sql .= " OR user.userId = '$userIds[$i]'";
        }

        $sql .= ")";
    }

    //filter category
    if(count($categoryIds) >= 2) {

        $sql .= " AND (category.categoryId = '$categoryIds[1]'";

        for ($i = 2; $i < count($categoryIds); $i++) {
            $sql .= " OR category.categoryId = '$categoryIds[$i]'";
        }

        $sql .= ")";
    }

    if(count($descriptions) >= 2) {
        $sql .= " AND (description LIKE '%$descriptions[1]%'";

        for ($i = 2; $i < count($descriptions); $i++) {
            $sql .= " OR description LIKE '%$descriptions[$i]%'";
        }

        $sql .= ")";
    }

    //filter price
    if($startPrice != "" && $endPrice != "")
        $sql .= " AND amount BETWEEN '$startPrice' AND '$endPrice'";

    //filter date
    if($startDate != "" && $endDate != "")
        $sql .= " AND date BETWEEN '$startDate' AND '$endDate'";

    $sql .= " ORDER BY $orderBy";

    //execute sql code
    $result = $db->query($sql);

    $_SESSION['total-costs'] = 0;

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr ondblclick = 'openEditorWindowAllCosts(". $row['costId'] .")'>";

            echo "<td>".$row['costId']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['travelId']."</td>";
            if($row['label'] == "other") echo "<td>".$hlang[$user->getLanguage()]["other"]."</td>";
            else echo "<td>".$row['label']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".getFormattedNumber($row['amount'], $numberFormat)."</td>";
            echo "<td>".$row['description']."</td>";

        echo "</tr>";

        $_SESSION['total-costs'] += $row['amount'];

    }

?>
