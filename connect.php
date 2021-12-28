<?php 
    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASS = '';
    $DB_NAME = 'financo';

    $db = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    if (mysqli_connect_errno()) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
?>