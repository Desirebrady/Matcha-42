<?php
#!/usr/bin/php
include 'database.php';
// CREATE DATABASE
try {
    $conn = new PDO("mysql:host=$DB_DSN_LIGHT", $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE matcha";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database created successfully<br>";
    }
catch(PDOException $e)
    {
    echo "ERROR CREATING DATABASE: ".$e->getMessage()."Aborting process<br>";
	}
	
try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `token` varchar(255) DEFAULT NULL,
            `password` varchar(255) NOT NULL,
            `firstname` VARCHAR(100) NOT NULL DEFAULT 'eg Alex',
            `lastname` VARCHAR(100)  NULL NULL DEFAULT 'eg Hook',
            `age` int(11) NOT NULL DEFAULT '0',
            `gender` VARCHAR(100) NOT NULL DEFAULT 'Unknown',
            `bio` VARCHAR(100)  NOT NULL DEFAULT 'eg Hi i love romcom and Horror',
            `profile_pic` VARCHAR(100) NOT NULL DEFAULT 'defualt.jpeg',
            `location` VARCHAR(100) NOT NULL DEFAULT 'Earth',
            `lat` float  NOT NULL DEFAULT '0',
            `lon` float  NOT NULL DEFAULT '0',
            `fame` int(11)  NOT NULL DEFAULT '0',
            `lastseen`datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `tag1` VARCHAR(100) NOT NULL DEFAULT 'Unknown',
            `tag2` VARCHAR(100) NOT NULL DEFAULT 'Unknown',
            `tag3` VARCHAR(100) NOT NULL DEFAULT 'Unknown',
            `verified` tinyint(1) NOT NULL DEFAULT '0',
            `online` int(11) DEFAULT '0',
            PRIMARY KEY (`id`)
        )";
        $dbh->exec($sql);
        echo "Table USERS created successfully<br>";
	}
catch (PDOException $e) {
    echo "ERROR CREATING USERS TABLE: ".$e->getMessage()."Aborting process<br>";
    }

try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `password_reset` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `email` varchar(100) NOT NULL,
            `token` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
        )";
        $dbh->exec($sql);
        // echo "Table Password_RESET created successfully<br>";
	}
catch (PDOException $e) {
    echo "ERROR CREATING Password_RESET TABLE: ".$e->getMessage()."Aborting process<br>";
    }
    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `massages` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(100) NOT NULL,
            `sender` varchar(100) NOT NULL,
            `massage` varchar(1000) NOT NULL,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $dbh->exec($sql);
        //echo "Table massages created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR MESSAGES COMMENTS TABLE: ".$e->getMessage()."Aborting process<br>";
    }
    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `matched` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `user1` VARCHAR(100) NOT NULL,
            `user2` VARCHAR(100) NOT NULL
        )";
        $dbh->exec($sql);
        //echo "Table matched created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR CREATING MATCHED TABLE: ".$e->getMessage()."Aborting process<br>";
    }
    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `likes` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(100) NOT NULL,
            `reciever` VARCHAR(100) NOT NULL
        )";
        $dbh->exec($sql);
        //echo "Table likes created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR CREATING LIKES TABLE: ".$e->getMessage()."Aborting process<br>";
    }

    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `blocked` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `blocker` varchar(100) NOT NULL,
            `blocked` varchar(100) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $dbh->exec($sql);
        //echo "Table blocked created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR CREATING BLOCKED TABLE: ".$e->getMessage()."Aborting process<br>";
    }
    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `views` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(100) NOT NULL,
            `visitor` varchar(100) DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $dbh->exec($sql);
        //echo "Table views created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR CREATING VIEWS TABLE: ".$e->getMessage()."Aborting process<br>";
    }
    try {
        
        $dbh = new PDO("mysql:host=$DB_DSN_LIGHT;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `notifications` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `fromWho` varchar(100) NOT NULL,
            `toWho` varchar(100) DEFAULT NULL,
            `Text` varchar(100) DEFAULT NULL,
            `seen` int(11) DEFAULT '0'
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
          ";
        $dbh->exec($sql);
        //echo "Table Notifications created successfully<br>";
    } catch (PDOException $e) {
        //echo "ERROR CREATING NOTIFICATIONS TABLE: ".$e->getMessage()."Aborting process<br>";
    }
?>