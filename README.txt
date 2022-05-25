# Database Configuration

## Database

- The database .sql file, located on /database folder.
- Database Name: la_bonita_cosmetics.sql


## Connection

- The connection for webhosting, connection.php file located on /includes folder.

- Connection File Name: connection.php  
    1. Connection on Main Page located on /includes/connection.php 
    2. Connection on Admin Main Page located on /admin/includes/connection.php 

## Configuring on Webhosting

- Edit the connection.php on /includes/connection.php
- Edit serverName, dbUsername, dbPassword, dbName of your configuration on Webhosting

    $serverName = "localhost";         // change webhost server name
    $dbUsername = "root";              // change webhost database username 
    $dbPassword = "";                  // change webhost database password 
    $dbName = "la_bonita_cosmetics";   // change webhost database
    $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);
