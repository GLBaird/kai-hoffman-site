<?php
session_start();
if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}

require_once('tools.php');
cleanOldRecords();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Kai Event Manager</title>
</head>
<body>
    <div class="container">
        <div class="panel">
            <h1>Kai's Events Organiser - Remove old events</h1>
            <p>Out of date events have been removed.</p>
            <p><a href="panel.php">Back</a></p>
        </div>
    </div>
</body>
</html>