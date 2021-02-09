<?php

    function isAllowedToModify($userIdToModify, $yourRankId, $db) {

        //check if user of given userId can be modified with your rank
        //get rank of given user
        $sql = "SELECT rankId FROM user WHERE userId = '$userIdToModify'";
        //execute sql code
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if($row["rankId"] >= $yourRankId) {
                return FALSE;
            }
        }

        return TRUE;

    }

?>