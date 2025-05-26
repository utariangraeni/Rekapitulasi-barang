<?php

function dbcon()
{


    $serverName = "localhost\SQLEXPRESS"; //serverName\instanceName

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
    $connectionInfo = array("Database" => "KASIR_SCANNER");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn) {
        // echo "Sampun connect lur.<br />";
    } else {
        echo "Connection could not be established.<br />";
    }
    return $conn;
}
