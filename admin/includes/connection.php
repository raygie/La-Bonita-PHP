<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "la_bonita_cosmetics";
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}