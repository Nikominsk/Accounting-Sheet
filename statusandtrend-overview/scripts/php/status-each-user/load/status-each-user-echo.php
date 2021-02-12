<?php
    require_once('../../../../../utils/php/setup.php');

    include '../../../../../utils/php/NumberFormat.php';

    
    $userIds = $_POST['userIds'];
    $orderBy = $_POST['orderBy'];

    //save sended data
    $numberFormat = $user->getNumberFormat();

    //get current year
    $curDateYear = date("Y");

    $sql = "SELECT  username, 
                    IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) = '$curDateYear'), 0) AS curCosts,
                    IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND year(date) < '$curDateYear'), 0) AS prevCosts,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND year(date) = '$curDateYear'), 0) AS curAdvance,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND year(date) < '$curDateYear'), 0) AS prevAdvance
                    FROM user";

    if(count($userIds) >= 2) {
        if($userIds[1] !== 'ALL') {

            if($userIds[1] === 'ONLYACTIVES') {
                $sql .= " WHERE active = 1";
            } else if ($userIds[1] === 'ONLYINACTIVES') {
                $sql .= " WHERE active = 0";
            } else {
                $sql .= " WHERE (userId = '$userIds[1]'";

                for ($i = 1; $i < count($userIds); $i++) {
                    $sql .= " OR userId = '$userIds[$i]'";
                }

                $sql .= ")";
            }

        }
    }
                    
    $sql .= " GROUP BY username ORDER BY ". $orderBy;

    //execute sql code
    $result = $db->query($sql);

    while($row = mysqli_fetch_assoc($result)) {

        $surplusPreviousYearsValue = $row['prevAdvance'] - $row['prevCosts'];
        $advanceValue = $row['curAdvance'] + $surplusPreviousYearsValue;
        $currentStateValue = $advanceValue - $row['curCosts'];

        echo "<tr>";
        
            echo "<td>".$row['username']."</td>";                                                           //username
            echo "<td>".getFormattedNumber(round($currentStateValue, 2), $numberFormat)."</td>";            //current state
            echo "<td>".getFormattedNumber(round($row['curCosts'], 2), $numberFormat)."</td>";              //current cost 
            echo "<td>".getFormattedNumber(round($advanceValue, 2), $numberFormat)."</td>";                 //advance
            echo "<td>".getFormattedNumber(round($surplusPreviousYearsValue, 2), $numberFormat)."</td>";    //surplus previous years

        echo "</tr>";

    }


?>