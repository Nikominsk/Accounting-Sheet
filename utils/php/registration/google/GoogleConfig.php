<?php

    require_once 'google-api-php-client-2.4.0/vendor/autoload.php';

    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('366280318173-ddpb1h6ipv50thvummafk0uisa6nvjv2.apps.googleusercontent.com');

    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('5_qBBSyobGgbacgZroanPTCC');

    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('http://localhost/accounting/entry/entry.php');

    //
    $google_client->addScope('email');

    $google_client->addScope('profile');

?>