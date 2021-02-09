<?php

    require_once('../../../../../utils/php/setup.php');

    include('../../../../../utils/php/NumberFormat.php');

    //change or with IN (string given from overview.php)

    //save received data into variables
    $userIds = $_POST['userIds'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startAdvance = $_POST['startAdvance'];
    $endAdvance = $_POST['endAdvance'];
    $orderBy = $_POST['orderBy'];

    $numberFormat = $user->getNumberFormat();
    $dateFormat = getDateFormat($numberFormat);


    $sql = "SELECT advanceId, username, DATE_FORMAT(date, '$dateFormat') as date, advance  FROM advance, user WHERE advance.userId = user.userId AND user.deleted = 0";

    //filter user
    if(count($userIds) >= 2) {
        $sql .= " AND (user.userId = '$userIds[1]'";

        for ($i = 2; $i < count($userIds); $i++) {
            $sql .= " OR user.userId = '$userIds[$i]'";
        }

        $sql .= ")";
    }

    //filter advance amount
    if($startAdvance != "" && $endAdvance != "")
        $sql .= " AND advance BETWEEN '$startAdvance' AND '$endAdvance'";

    //filter date
    if($startDate != "" && $endDate != "")
        $sql .= " AND date BETWEEN '$startDate' AND '$endDate'";

    $sql .= " ORDER BY $orderBy";

    //execute sql code
    $result = $db->query($sql);

    $_SESSION['total-advance'] = 0;

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr ondblclick = 'openEditorWindowAllAdvances(". $row['advanceId'] .")'>";

            echo "<td>".$row['advanceId']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".getFormattedNumber($row['advance'], $numberFormat)."</td>";

        echo "</tr>";

        $_SESSION['total-advance'] += $row['advance'];

    }

?>
