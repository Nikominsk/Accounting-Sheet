<?php
    require_once('../../../../../utils/php/setup.php');

    include '../../../../../utils/php/NumberFormat.php';

    $filterUserIds = $_POST['filterUserIds'];

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

    if($filterUserIds[0] !== 'ALL') {

        if($filterUserIds[0] === 'ONLYACTIVES') {
            $sql .= " WHERE active = 1";
        } else if ($filterUserIds[0] === 'ONLYINACTIVES') {
            $sql .= " WHERE active = 0";
        } else {
            $sql .= " WHERE (userId = '$filterUserIds[0]'";

            for ($i = 1; $i < count($filterUserIds); $i++) {
                $sql .= " OR userId = '$filterUserIds[$i]'";
            }

            $sql .= ")";
        }

    }
                    
                    
    $sql .= " GROUP BY username ORDER BY userId ASC";

    //execute sql code
    $result = $db->query($sql);

    $statusEachUserArray = [];

    $index = 0;
    while($row = mysqli_fetch_assoc($result)) {

        $index++;

        $surplusPreviousYearsValue = $row['prevAdvance'] - $row['prevCosts'];
        $advanceValue = $row['curAdvance'] + $surplusPreviousYearsValue;
        $currentStateValue = $advanceValue - $row['curCosts'];

        array_push($statusEachUserArray,    array($row['username'],
                                            getFormattedNumber(round($currentStateValue, 2), $numberFormat),
                                            getFormattedNumber(round($row['curCosts'], 2), $numberFormat),
                                            getFormattedNumber(round($advanceValue, 2), $numberFormat),
                                            getFormattedNumber(round($surplusPreviousYearsValue, 2), $numberFormat)
        ));

    }

    //return array
    echo json_encode($array,JSON_UNESCAPED_UNICODE);

?>