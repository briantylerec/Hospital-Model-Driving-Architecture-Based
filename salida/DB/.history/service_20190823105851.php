<?php
include_once 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function sendService($valores){
    $valores = getDataJSON($JSON);
    //$con = dbConnect();
    //echo dbDisconnect($con);
    $client = new \GuzzleHttp\Client(["base_uri" => "http://httpbin.org"]);
    $response = $client->post("/post", $valores);
    if($response->getBody()){
        
    };
    //$json = file_get_contents(‘http://vs2010dev:3613/api/contacts/’);
    //json_encode($valores);

    //http_response_code(400)
}