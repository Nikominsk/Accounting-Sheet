<?php
    
    require_once('../../../../utils/php/setup.php');

    echo json_encode($user->getNumberFormat(), JSON_UNESCAPED_UNICODE);   
    
?>