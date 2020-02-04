<?php
include_once 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function sendService($valores){
    $valores = getDataJSON($JSON);
    //$con = dbConnect();
    //echo dbDisconnect($con);
    json_encode($valores);

    http_response_code(400)
}