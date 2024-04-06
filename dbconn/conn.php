<?php 
    $user = 'root';
    $pass = '';
    $host = 'localhost'; // Change this to the correct hostname
    $dbname = 'furnituremanagesystem';

    $conn = mysqli_connect($host, $user, $pass, $dbname) or die('DATABASE CONNECTION FAILED');
?>