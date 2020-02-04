<?php
/**
 * Returns the list of policies.
 */
include_once 'database.php';

function getDataJSON($JSON){
    $datos = $JSON['entry'][0]['changes'][0];
    $valores = [];

    foreach ($datos['value'] as $key => $value) {
        $valores[$key] = $value;
    }

    date_default_timezone_set("America/Guayaquil");
    $valores['created_time'] = date("Y-m-d h:i:s",$valores['created_time']);

    echo 'Data returned correctly!';

    return $valores;
}
/*
function showData(){
    $con = dbConnect();
    if($con){
        $result = pg_query($con, "SELECT * FROM WEBHOOKLEADS");
        while ($row = pg_fetch_row($result)) { 
            print("- $row[0]\n");
        }

        echo  dbDisconnect($con);
        return 'Datos mostrados!';
    } else {
        return 'No db connection!';
    }
}*/