<?php
// db live serve
// $serverName="localhost";
// $dbUsername="id18367690_petssentials";
// $dbPassword = "jXg8VRR9jWLTw-CO";
// $dbName = "id18367690_petssentials_petstation_db";

// db local
$serverName="localhost";
$dbUsername="root";
$dbPassword = "";
$dbName = "la_bonita_cosmetics";
$conn = new mysqli($serverName,$dbUsername,$dbPassword,$dbName);

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>