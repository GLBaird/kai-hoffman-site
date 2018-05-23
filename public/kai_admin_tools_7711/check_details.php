<?php

session_start();

function validateSession() {
    $_SESSION['validatedUser'] = true;
}

function destroySession() {
    $_SESSION['validatedUser'] = false;
}

function checkUserCredentials() {
    $username = "Kai Hoffman";
    $password = "77f5d8351d6e9b4be9420d19ee29b3c0acd70f95";

    if ($_POST['username'] != $username) {
        header("Location: index.php?error=Unkown user&username={$_POST['username']}");
        destroySession();
        return;
    }

    $hashedPassword = hash('ripemd160', $_POST['password']);

    if ($hashedPassword != $password) {
        header("Location: index.php?error=Bad password&username={$_POST['username']}");
        destroySession();
        return;
    }

    validateSession();
    header("Location: panel.php");
}

if (isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != '') {
   checkUserCredentials();
} else {
    header("Location: index.php?error=Missing Details&username={$_POST['username']}");
    destroySession();
}