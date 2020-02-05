<?php
include_once 'database.php';

function updateStatus($LEADGEN_ID){
    $con = dbConnect();
    if($con){
        $newStatus = 1;
        $status_edited_time = new DateTime().format('Y-m-d H:i:s');
        $result = pg_query($con, "UPDATE WEBHOOKLEADS SET LEAD_STATE='1' WHERE LEADGEN_ID='$LEADGEN_ID';");
        $result = pg_query($con, "UPDATE WEBHOOKLEADS SET STATUS_EDITED_TIME='$status_edited_time' WHERE LEADGEN_ID='$LEADGEN_ID';");
        
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
