<?php
require 'database.php';

function showData(){
    $con = dbConnect();
    if($con){
        $result = pg_query($con, "SELECT * FROM WEBHOOKLEADS");
        while ($row = pg_fetch_row($result)) { 
            print("- $row[0]\n");
        }

        dbDisconnect($con);
    } else {
        echo 'No db connection!';
    }
}
