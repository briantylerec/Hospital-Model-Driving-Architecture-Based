<?php
require 'database.php';

function updateStatus(){
    $con = dbConnect();
    if($con){
        $result = pg_query($con, "SELECT * FROM WEBHOOKLEADS");
        if ($result) {
            echo dbDisconnect($con);
            echo 'Correct insert to database!';
            return 'Correct insert to database!';
        }

        dbDisconnect($con);
    } else {
        echo 'No db connection!';
    }
}
