<?php

    require_once('setup.php');

    if(isset($_POST['functionname'])) {
        switch($_POST['functionname']) {
            case 'lang':
                if( is_array($_POST['arguments']) && count($_POST['arguments']) == 1) {
                    echo $lang[$user->getLanguage()][$_POST['arguments'][0]];
                } else {
                    echo 'Intern language error';
                }
                break;
        }
    }

?>