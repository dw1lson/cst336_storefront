<?php
function getDatabaseConnection($dbname){
    $host = "localhost";
    //$dbname = "MidtermPractice";
    $username = "web_user";
    $password = "s3cr3t";
    
    //connecting to the database
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //Setting Errorhandling to Exception
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    return $dbConn; 
}  
?>