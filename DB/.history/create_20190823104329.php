<?php
include_once 'database.php';
include 'read.php';
include 'service.php';

//$postdata = file_get_contents("php://input");

function insertData($JSON){
    $valores = getDataJSON($JSON);
    $con = dbConnect();

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            echo dbDisconnect($con);
            echo 'Correct insert to database!';
            sendService($valores);
            return 'Correct insert to database!';
        }

        //showData();
    } else {
        echo 'No db connection!';
        return 'No db connection!';
    }
}