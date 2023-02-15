<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystemtut";


//connection to database
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);


//check if connection works and shows error message if doesn't work
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}