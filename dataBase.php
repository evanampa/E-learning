<?php

$servername = "webpagesdb.it.auth.gr:3306";
$dbUsername = "evanampa";
$dbPassword = "ea18069590";
$dbName = "evanampa_";



$con = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName,"3306");


if(!$con){
    die("Connection failed: ".mysqli_connector_error());
}
?>