<?php
    require_once('../../../../../utils/php/setup.php');

    include '../../../../../utils/php/NumberFormat.php';

    $langMonth = array(
        "DE" => ["JAN", "FEB", "MÄR", "APR", "MAI", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DEZ"],
        "EN" => ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"]
    );

    $monthsBack = $_POST['monthsBack'];
    $userIds = $_POST['userIds'];

    //first get the users state n (= $monthsBack) - 1 month ago
    $sql = "SELECT  username,
                    IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND date <  CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)), 0) AS pastCost,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND date <  CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)), 0) AS pastAdvance
                    FROM user WHERE username IS NOT NULL";

    $tmpSQL = "";
    if(count($userIds) >= 2) {

        if($userIds[1] === 'ONLYACTIVES') {
            $tmpSQL .= " AND user.active = 1";
        } else if ($userIds[1] === 'ONLYINACTIVES') {
            $tmpSQL .= " AND user.active = 0";
        } else {
            $tmpSQL .= " AND (user.userId = '$userIds[1]'";

            for ($i = 1; $i < count($userIds); $i++) {
                $tmpSQL .= " OR user.userId = '$userIds[$i]'";
            }

            $tmpSQL .= ")";
        }

        $sql .= $tmpSQL;
    }


    $sql .= " ORDER BY username";

    //execute sql code
    $result = $db->query($sql);


    $pastStatePerUser = [];

    while($row = mysqli_fetch_assoc($result)) {

        array_push($pastStatePerUser, array('username' => $row['username'], 'state' => $row['pastAdvance'] - $row['pastCost']));

    }


    $monthLabelArray = $langMonth[$user->getLanguage()];


    $costsEachMonthPerUser = [];
    //getting costs each month in interval
    //group and order by year is important
    $sql = "SELECT username, YEAR(c.date) AS year, (MONTH(c.date)-1) AS monthId, IFNULL((SELECT SUM(c2.amount) FROM cost c2 WHERE c2.userId = c.userId AND YEAR(c2.date) = YEAR(c.date) AND MONTH(c2.date) = MONTH(c.date)), 0) AS cost
            FROM user, cost c
            WHERE user.userId = c.userId";

    if(count($userIds) >= 2) {
        $sql .= $tmpSQL;
    }

    $sql .= " AND LAST_DAY(c.date - INTERVAL 1 MONTH) + INTERVAL 1 DAY >= CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)
            AND LAST_DAY(c.date) <= LAST_DAY(NOW())
            GROUP BY username, YEAR(c.date), monthId
            ORDER BY username, YEAR(c.date), monthId";

    //execute sql code
    $result = $db->query($sql);

    //run though data of result
    while($row = mysqli_fetch_assoc($result)) {
        //add each data to array
        $costsEachMonthPerUser[$row['username']][$row['year'] . $row['monthId']] = $row['cost'];
    }

    $advanceEachMonthPerUser = [];

    $sql = "SELECT username, YEAR(a.date) AS year, (MONTH(a.date)-1) AS monthId, IFNULL((SELECT SUM(a2.advance) FROM advance a2 WHERE a2.userId = a.userId AND YEAR(a2.date) = YEAR(a.date) AND MONTH(a2.date) = MONTH(a.date)), 0) AS advance
            FROM user, advance a
            WHERE user.userId = a.userId";

    if(count($userIds) >= 2) {
        $sql .= $tmpSQL;
    }

    $sql .= " AND LAST_DAY(a.date - INTERVAL 1 MONTH) + INTERVAL 1 DAY >= CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)
            AND LAST_DAY(a.date) <= LAST_DAY(NOW())
            GROUP BY username, YEAR(a.date), monthId
            ORDER BY username, YEAR(a.date), monthId";

    //execute sql code
    $result = $db->query($sql);

    //run though data of result
    while($row = mysqli_fetch_assoc($result)) {
        //add each data to array
        $advanceEachMonthPerUser[$row['username']][$row['year'] . $row['monthId']] = $row['advance'];
    }


    $startMonth = date("n", strtotime("-".$monthsBack." months"))-1;
    $startYear = date("Y", strtotime("-".$monthsBack." months"));

    $userData = [];

    foreach($pastStatePerUser as $userPastState) {

        $username = $userPastState['username'];
        $tmpState = $userPastState['state'];

        $monthIds = [];
        $monthLabels = [];
        $states = [];

        $tmpMonthId = $startMonth;
        $tmpYear = $startYear;

        //+1 for showing current month
        for($i = 0; $i < $monthsBack+1; $i++) {

            $nextId = $tmpYear.$tmpMonthId;

            $costValue;
            $advanceValue;

            if(isset($costsEachMonthPerUser[$username]) === TRUE && isset($costsEachMonthPerUser[$username][$nextId]) === TRUE) {
                $costValue = $costsEachMonthPerUser[$username][$nextId];
            } else {
                $costValue = 0;
            }

            if(isset($advanceEachMonthPerUser[$username]) === TRUE && isset($advanceEachMonthPerUser[$username][$nextId]) === TRUE) {
                $advanceValue = $advanceEachMonthPerUser[$username][$nextId];
            } else {
                $advanceValue = 0;
            }


            $tmpState = $tmpState + $advanceValue - $costValue;

            array_push($monthIds, $tmpMonthId);
            array_push($monthLabels, $monthLabelArray[$tmpMonthId]);
            array_push($states, $tmpState);

            $tmpMonthId++;

            $tmpMonthId %= 12;

            if($tmpMonthId == 0) {
                $tmpYear++;
            }

        }

        array_push($userData, array('username' => $username, 'monthIds' => $monthIds, 'monthLabels' => $monthLabels, 'states' => $states));

    }

    echo json_encode( $userData ,JSON_UNESCAPED_UNICODE);
    return;

?>