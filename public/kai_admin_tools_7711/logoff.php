<?php
session_start();
$_SESSION['validatedUser'] = false;
header("Location: index.php");