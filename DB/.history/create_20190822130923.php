<?php
require 'database.php';
require 'read.php';

//$postdata = file_get_contents("php://input");

function insertData($JSON){
    $valores = getDataJSON($JSON);
    $con = dbConnect();

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            echo 'Correct insert to database!';
            dbDisconnect($con);
        }

        showData();
    } else {
        echo 'No db connection!';
    }
}