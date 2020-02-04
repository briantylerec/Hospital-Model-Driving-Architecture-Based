<?php
include 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function insertData($JSON){
    $valores = getDataJSON($JSON);
    $con = dbConnect();

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            echo dbDisconnect($con);
            return 'Correct insert to database!';
        }

        //showData();
    } else {
        return 'No db connection!';
    }
}