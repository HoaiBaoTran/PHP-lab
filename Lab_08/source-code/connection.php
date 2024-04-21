<?php
//header('Access-Control-Allow-Origin: *');

$host = 'db';
$dbName = 'lab08';
$username = 'root';
$password = 'my-secret-pw';

try {
    $dbCon = new PDO("mysql:host=$host;dbname=$dbName", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
