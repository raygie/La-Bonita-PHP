# Database Configuration

## Database

- The database .sql file, located on /database folder.
- Database Name: la_bonita_cosmetics.sql


## Connection

- The connection for webhosting, connection.php file located on /includes folder.

- Connection File Name: connection.php  
    1. Connection on Main Page located on /includes/connection.php 
    2. Connection on Admin Main Page located on /admin/includes/connection.php 

## Configure Webhosting

- Edit the connection.php on /includes/connection.php
- Edit serverName, dbUsername, dbPassword, dbName of your configuration on Webhosting

    $serverName = "localhost";         // change webhost server name
    $dbUsername = "root";              // change webhost database username 
    $dbPassword = "";                  // change webhost database password 
    $dbName = "la_bonita_cosmetics";   // change webhost database
    $conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);


# Configure PHPMailer 

## Turn off "Allow less secure apps" to integrate PHPMailer on Google Account

- In myaccount.google.com click the avatar and select "Manage your google account" button.
- Select "Security" tab,
- Allow less secure apps to "ON"


## Configure GMail IMAP access

- In GMail select "Settings" button then click the "See all settings"
- Go to "Forwarding and POP/IMAP" tab, then Enable IMAP access.
- Click save Changes.

## Change Email Account on PHPMailer

- Edit username and password of SMTP on /contacts.php, change your default gmail account

    $mail->Username   = 'labonitacosmeticsofficial@gmail.com';  //change SMTP username
    $mail->Password   = '!@labonita';                           //change SMTP password

- Also change the  addAddress function, 
- Add your Gmail Account

    $mail->addAddress('labonitacosmeticsofficial@gmail.com');    //change the address

