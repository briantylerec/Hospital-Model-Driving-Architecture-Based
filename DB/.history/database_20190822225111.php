<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

function dbConnect(){
    $connection = pg_connect('host=ec2-75-101-131-79.compute-1.amazonaws.com dbname=d87459nbaub4ev user=zqtnqnmlumkmup password=b5676b7f7a4929720469df975dfe01ef5fab6a87bd735bff3d1baffec6c3178f');

    if ($connection) {
        echo "Correct database connection";
        return $connection;
    }
    return "Incorrect database connection";
}

function dbDisconnect($conn){
    pg_close($conn);
    return "Correct database disconnection";
}

echo dbConnect();