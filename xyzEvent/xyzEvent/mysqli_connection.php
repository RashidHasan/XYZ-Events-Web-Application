<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'xyzevents';

// Create connection
$connection = new mysqli($host, $user, $pass, $db);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}