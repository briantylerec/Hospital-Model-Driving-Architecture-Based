<?php
include_once 'database.php';

function updateStatus($LEADGEN_ID){
    $con = dbConnect();
    if($con){
        date_default_timezone_set("America/Guayaquil");
        $status_edited_time = date("Y-m-d h:i:sa");
        $result = pg_query($con, "UPDATE WEBHOOKLEADS SET LEAD_STATE='1', STATUS_EDITED_TIME='$status_edited_time' WHERE LEADGEN_ID='$LEADGEN_ID' AND LEAD_STATE='0';");
        
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
