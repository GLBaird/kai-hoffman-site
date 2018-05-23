<?php
session_start();
if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}
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
            <h1>Kai's Events Organiser</h1>
            <p>Please choose an option:</p>
            <div class="options">
                <p><a href="panel.add.php">Add Event</a></p>
                <p><a href="panel.remove.php">Remove out of date events</a></p>
                <p><a href="panel.manage.php">Manage events</a></p>
            </div>
            <p style="text-align:right"><a href="logoff.php">Sign out</a></p>
        </div>
    </div>
</body>
</html>