<?php

$username = 'root';
$password = 'Histry';
$database = 'app';
$host = 'localhost';


$db = new mysqli($host, $username, $password, $database);

if ($db != TRUE)
    die($db->error);


