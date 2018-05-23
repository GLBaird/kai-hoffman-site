<?php
session_start();
if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}

require_once('tools.php');

if (isset($_GET['index'])) {
    deleteRecord($_GET['index']);
}

header("Location: panel.manage.php");