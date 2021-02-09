<?php
    
    require_once('../../../../utils/php/setup.php');

    echo json_encode($user->getLanguage(), JSON_UNESCAPED_UNICODE);   
    
?>