<?php
require "vendor/autoload.php";
include_once 'database.php';
include_once 'read.php';

//$postdata = file_get_contents("php://input");

function sendService($options){  
    try {
        $client = new \GuzzleHttp\Client(["base_uri" => "https://autohyun.curbe.com.ec/api/"]);
        $response = $client->request('GET', 'webhook/grabarLead');

        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK

        if($code == 200){
            echo updateStatus($options['leadgen_id']);
            return ("ingresado al servicio");
        }
        return ($code + "no ingresado al servicio");
        
    } catch (RequestException $e) {
        error_log(print_r("Error enviar al servicio " + $e, true));
    }
        
}