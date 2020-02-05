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
    $valores['lead_state'] = 'new';
    echo 'Data returned correctly!';
    print_r($valores, true);

    return $valores;
}

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