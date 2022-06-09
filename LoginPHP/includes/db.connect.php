<?php 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "cvsuportal";

$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

// checking for any error during connection 

if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

