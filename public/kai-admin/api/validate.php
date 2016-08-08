<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    require_once ('../config.php');
    if(USERNAME === $_POST['username'] && PASSWORD === $_POST['password']) {
        $_SESSION['authenticated'] = true;
    } else {
        $_SESSION['authenticated'] = false;
    }
}

if ($_SESSION['authenticated'] === false) {
    header("HTTP/1.1 403 Unauthorized");
    die("unauthorised");
} else {
    die('authorised');
}
