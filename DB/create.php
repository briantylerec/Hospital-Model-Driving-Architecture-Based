<?php
include_once 'database.php';
include_once 'read.php';
include_once 'service.php';

//$postdata = file_get_contents("php://input");

function insertData($JSON){
    $valores = getDataJSON($JSON);
    $con = dbConnect();

    if($con){
        $result = pg_insert($con, 'webhookleads', $valores);
        
        if ($result) {
            echo dbDisconnect($con);
            echo 'Correct insert to database!';
            echo sendService($valores);
        }

        //return showData();
        return 'Datos insertados';
    } else {
        echo 'No db connection!';
        return 'No db connection!';
    }
}

function readTable(){
    $con = dbConnect();

    $result = pg_query($con, "SELECT AD_ID, FORM_ID, LEADGEN_ID, CREATED_TIME, PAGE_ID, ADGROUP_ID, LEAD_STATE FROM WEBHOOKLEADS WHERE LEAD_STATE='0'");
    while ($row = pg_fetch_row($result)) {
        $valores = [];
        $valores['AD_ID'] = $row[0];
        $valores['FORM_ID'] = $row[1];
        $valores['LEADGEN_ID'] = $row[2];
        $valores['CREATED_TIME'] = $row[3];
        $valores['PAGE_ID'] = $row[4];
        $valores['ADGROUP_ID'] = $row[5];

        echo sendService($valores);

        return ('Datos anteriores leidos.');
    }

    echo dbDisconnect($con);
}