<?php 
    // lets initialise the credentials to be used when linking with daraja API


    // MPESA API KEYS
    $consumerKey="jYONpAISHNWoaOYAKRSGQbediaLqLv99";
    $consumerSecret="s3nA9V9FN8thpn3l";

    // ACCESS TOKEN URL
    $access_token_url="https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    $headers=["Content-Type:application/json; charset=utf8"];
    // curls are used to send and receives files over http and ftp
    $curl=curl_init($access_token_url);
    curl_setopt($curl,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($curl,CURLOPT_HEADER,FALSE);
    curl_setopt($curl,CURLOPT_USERPWD,$consumerKey.":".$consumerSecret);

    $result=curl_exec($curl);
    $status=curl_getinfo($curl,CURLINFO_HTTP_CODE);

    // echo $result;

    

    $jsonObj=stripslashes($result);

    // echo gettype($jsonObj);

    $result =  json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonObj), true );

    

    echo $access_token=$result["access_token"];

    curl_close($curl);



?>