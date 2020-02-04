<?php
include_once 'database.php';

function updateStatus($LEADGEN_ID){
    $con = dbConnect();
    if($con){
        $result = pg_query($con, "UPDATE WEBHOOKLEADS SET LEAD_STATE='1' WHERE LEADGEN_ID=$LEADGEN_ID;");
        if ($result) {
            echo dbDisconnect($con);
            echo 'Correct update to database!';
            return 'Correct update to database!';
        }

        return dbDisconnect($con);
    } else {
        echo 'No db connection!';
    }
}
