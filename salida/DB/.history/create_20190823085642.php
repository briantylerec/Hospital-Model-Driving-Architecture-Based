<?php
include_once 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function insertData($JSON){
    $valores = getDataJSON($JSON);
    $con = dbConnect();

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            dbDisconnect($con);
            echo 'Correct insert to database!';
            return 'Correct insert to database!';
        }

        //showData();
    } else {
        echo 'No db connection!';
        return 'No db connection!';
    }
}