<?php
include_once 'database.php';
include 'read.php';

//$postdata = file_get_contents("php://input");

function sendService($valores){
    $valores = getDataJSON($JSON);
    //$con = dbConnect();
    //echo dbDisconnect($con);

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            
            echo 'Correct insert to database!';
            return 'Correct insert to database!';
        }

        //showData();
    } else {
        echo 'No db connection!';
        return 'No db connection!';
    }
}