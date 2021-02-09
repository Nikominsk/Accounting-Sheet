<?php

    require_once('../../../../../utils/php/setup.php');

    include('../../../../../utils/php/NumberFormat.php');

    //save received data into variables
    $descriptions = $_POST['descriptions'];
    $startPrice = $_POST['startPrice'];
    $endPrice = $_POST['endPrice'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $categoryIds = $_POST['categoryIds'];
    $orderBy = $_POST['orderBy'];

    $userId = $user->getUserId();
    $numberFormat = $user->getNumberFormat();
    $dateFormat = getDateFormat($numberFormat);

    $sql = "SELECT costId, travelId, category.label, DATE_FORMAT(date, '$dateFormat') as date, amount,  description FROM cost, category, user WHERE cost.categoryId = category.categoryId AND cost.userId = user.userId AND user.userId = '$userId'";

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
        echo "<tr ondblclick = 'openEditorWindowCost(". $row['costId'] .")'>";

            echo "<td>".$row['costId']."</td>";
            echo "<td>".$row['travelId']."</td>";
            echo "<td>".$row['label']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".getFormattedNumber($row['amount'], $numberFormat)."</td>";
            echo "<td>".$row['description']."</td>";

        echo "</tr>";

        $_SESSION['total-costs'] += $row['amount'];

    }

?>
