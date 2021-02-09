<?php
    require_once('../../../../utils/php/setup.php');

    include '../../../../utils/php/NumberFormat.php';

    $langMonth = array(
        "DE" => ["JAN", "FEB", "MÄR", "APR", "MAI", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DEZ"],
        "EN" => ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"]
    );

    $userId = $user->getUserId();
    $monthsBack = $_POST['monthsBack'];

    //first get the users state n (= $monthsBack) - 1 month ago
    $sql = "SELECT  IFNULL((SELECT SUM(amount) FROM cost WHERE cost.userId = user.userId AND date <  CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)), 0) AS pastCost,
                    IFNULL((SELECT SUM(advance) FROM advance WHERE advance.userId = user.userId AND date <  CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)), 0) AS pastAdvance
                    FROM user WHERE userId = '$userId'";
                    
    //execute sql code
    $result = $db->query($sql);

    $row = mysqli_fetch_assoc($result);

    $pastState = $row['pastAdvance'] - $row['pastCost'];

    $monthLabelArray = $langMonth[$user->getLanguage()];

    
    $costsEachMonth = [];
    //getting costs each month in interval
    //group and order by year is important
    $sql = "SELECT YEAR(c.date) AS year, (MONTH(c.date)-1) AS monthId, IFNULL((SELECT SUM(c2.amount) FROM cost c2 WHERE c2.userId = c.userId AND YEAR(c2.date) = YEAR(c.date) AND MONTH(c2.date) = MONTH(c.date)), 0) AS cost
            FROM cost c
            WHERE userId = '$userId'
            AND LAST_DAY(c.date - INTERVAL 1 MONTH) + INTERVAL 1 DAY >= CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)
            AND LAST_DAY(c.date) <= LAST_DAY(NOW())
            GROUP BY YEAR(c.date), monthId
            ORDER BY YEAR(c.date), monthId";


    //execute sql code
    $result = $db->query($sql);

    //run though data of result
    while($row = mysqli_fetch_assoc($result)) {
        //add each data to array
        
        $costsEachMonth[$row['year'] . $row['monthId']] = $row['cost'];
        //I have the monthIds and their costs, how to put them in the array so the graph can read them (look code of previous version)? 
    }

    $advanceEachMonth = [];

    $sql = "SELECT YEAR(a.date) AS year, (MONTH(a.date)-1) AS monthId, IFNULL((SELECT SUM(a2.advance) FROM advance a2 WHERE a2.userId = a.userId AND YEAR(a2.date) = YEAR(a.date) AND MONTH(a2.date) = MONTH(a.date)), 0) AS advance
            FROM advance a
            where userId = '$userId'
            AND LAST_DAY(a.date - INTERVAL 1 MONTH) + INTERVAL 1 DAY >= CAST(DATE_FORMAT(NOW()-INTERVAL '$monthsBack' MONTH ,'%Y-%m-01') as DATE)
            AND LAST_DAY(a.date) <= LAST_DAY(NOW())
            GROUP BY YEAR(a.date), monthId
            ORDER BY YEAR(a.date), monthId";

    //execute sql code
    $result = $db->query($sql);

    //run though data of result
    while($row = mysqli_fetch_assoc($result)) {
        //add each data to array
        
        $advanceEachMonth[$row['year'] . $row['monthId']] = $row['advance'];
        
    }

    $startMonth = date("n", strtotime("-".$monthsBack." months"))-1;
    $startYear = date("Y", strtotime("-".$monthsBack." months"));

    $monthIds = [];
    $monthLabels = [];
    $states = [];

    $tmpState = $pastState;

    //+1 for current month
    for($i = 0; $i < $monthsBack + 1; $i++) {
        
        $nextId = $startYear.$startMonth;

        $costValue;
        $advanceValue;

        if(isset($costsEachMonth[$nextId]) === TRUE) {
            $costValue = $costsEachMonth[$nextId];
        } else {
            $costValue = 0;
        }

        if(isset($advanceEachMonth[$nextId]) === TRUE) {
            $advanceValue = $advanceEachMonth[$nextId];
        } else {
            $advanceValue = 0;
        }

        $tmpState = $tmpState + $advanceValue - $costValue;

        
        array_push($monthIds, $startMonth);
        array_push($monthLabels, $monthLabelArray[$startMonth]);
        array_push($states, $tmpState);
        
        $startMonth++;
        
        $startMonth %= 12;

        if($startMonth == 0) {
            $startYear++;
        }

    }

    echo json_encode( array('monthIds' => $monthIds, 'monthLabels' => $monthLabels, 'states' => $states) ,JSON_UNESCAPED_UNICODE);

?>