<?php 
    // START SESSION AND UNSETTING, DESTROYING THE SESSION VARIABLES FOR IT TO LOGOUT
    session_start();
    session_unset();
    session_destroy();
    // THEN HEADER TO REDIRECT THE PAGE TO LOGIN PAGE
    header('Location: ../index.php');
    // E TERMINATE AG SCRIPT
    exit;
?>