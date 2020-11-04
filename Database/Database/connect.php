<?php

require_once __DIR__ . '/../config/database.php';

$host =  dbconfig['server'];
$type =  dbconfig['type'];
$database =  dbconfig['dbname'];

try {
$con = new PDO("$type:host=$host; dbname=$database", dbconfig['username'],  dbconfig['password']);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



}catch (Exception $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

