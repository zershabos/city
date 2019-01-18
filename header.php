<?php 
ob_start();
if(!isset($_SESSION)){session_start();} 
header('Content-Type: text/html; charset=utf-8');
require_once 'database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Get Country & City</title>   
        <link href="https://fonts.googleapis.com/css?family=Markazi+Text" rel="stylesheet">
        <link defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/media.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
<body>
    <div class="se-pre-con"></div>