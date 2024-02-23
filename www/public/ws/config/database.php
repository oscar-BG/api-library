<?php
$server = 'contenedor-slim-db-1';
$db = 'library';
$user = 'root';
$pass = 'libr4ryroot';
$con = pg_connect("host=$server dbname=$db user=$user password=$pass") or die('Could not connect to DB: ' . pg_last_error());

if(!$con){
    die('Could not connect to DB: ' . pg_last_error());
}

$status = pg_connection_status($con);
if ($status === PGSQL_CONNECTION_OK) {
    echo 'Connected to the database successfully.';
} else {
    die('Connection failed. Status: ' . $status);
}