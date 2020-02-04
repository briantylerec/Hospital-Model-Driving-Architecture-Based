<?php
include_once 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function sendService($valores){  
    $client = new \GuzzleHttp\Client(["base_uri" => "http://httpbin.org"]);
    $response = $client->post("/post", json_encode($valores));
    if($response->getBody() == '1'){
        updateStatus($valores['leadgen_id']);
    }
    //$json = file_get_contents(‘http://vs2010dev:3613/api/contacts/’);

    //http_response_code(400)
}