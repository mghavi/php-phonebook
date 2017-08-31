<?php
session_start();
require __DIR__ . '/function.php';                              //project functions
require __DIR__ . '/db.php';  
error_reporting(E_ALL);
ini_set("display_errors", 1);
//db functions
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap-rtl.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css" />
        <link rel = "stylesheet" type = "text/css" href = "css/bootstrap-rtl.min.css" />
        <script src="js/bootstrap.min.js"></script>
    </head>

