<?php

include_once 'create.php';
include_once 'update.php';

$challenge = $_REQUEST["hub_challenge"];
$verify_token = $_REQUEST["hub_verify_token"];

if($verify_token == "abc123"){
    echo $challenge;
} else {
    echo $verify_token;   
}

$JSON = json_decode(file_get_contents('php://input'), true);
$tmp = $JSON['entry'][0]['changes'][0]['field'] == "leadgen";
if($tmp){
    //echo json_decode(file_get_contents('php://input'), true);
    error_log(print_r(insertData($JSON),true));
    error_log(print_r(readTable(),true));
    //echo updateStatus('716921575418411');
}
?>