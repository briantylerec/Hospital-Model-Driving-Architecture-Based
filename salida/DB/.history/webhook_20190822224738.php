<?php

include 'create.php';

$challenge = $_REQUEST["hub_challenge"];
$verify_token = $_REQUEST["hub_verify_token"];

if($verify_token == "abc123"){
    echo $challenge;
} else {
    echo $verify_token;   
}

$JSON = json_decode(file_get_contents('php://input'), true);
echo $JSON;

if($JSON['entry'][0]['changes'][0]['field'] == "leadgen"){
    //echo json_decode(file_get_contents('php://input'), true);
    echo insertData($JSON);
}
?>