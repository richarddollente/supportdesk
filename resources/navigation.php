<?php
    ob_start();
    session_start();
    error_reporting();

    date_default_timezone_set("Asia/Bangkok");

    try{
        $connection = new PDO("mysql:dbname=supportdesk;host=localhost", "root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
?>