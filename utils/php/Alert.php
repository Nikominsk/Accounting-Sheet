<?php

    function alertFailure($msg) {
        echo "<script type='text/javascript'>alertFailure('$msg');</script>";
    }

    function alertSuccess($msg) {
        echo "<script type='text/javascript'>alertSuccess('$msg');</script>";
    }

?>