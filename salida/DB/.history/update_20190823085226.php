<?php
require 'database.php';

function updateStatus($LEADGEN_ID){
    $con = dbConnect();
    if($con){
        $result = pg_query($con, "UPDATE WEBHOOKLEADS SET LEAD_STATE='1' WHERE LEADGEN_ID=$LEADGEN_ID;");
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
