<?php
session_start();

if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}

require_once('tools.php');

if (
    isset($_POST['date']) && isset($_POST['time']) && isset($_POST['venue']) && isset($_POST['mapRef']) && 
    isset($_POST['link']) && isset($_POST['icon']) && isset($_POST['color']) && isset($_GET['index'])
) {
    updateDataInStore($_GET['index']);
}
    
header("Location: panel.manage.php");
