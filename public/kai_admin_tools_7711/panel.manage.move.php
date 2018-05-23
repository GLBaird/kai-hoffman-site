<?php
session_start();
if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}
require_once('tools.php');

if (isset($_GET['index']) && isset($_GET['direction'])) {
    $data = loadData();
    $gigs = $data['list'];

    $itemA = $gigs[$_GET['index']];
    $indexB = intval($_GET['index']) + intval($_GET['direction']);
    $itemB = $gigs[$indexB];
    $gigs[$indexB] = $itemA;
    $gigs[$_GET['index']] = $itemB;

    $data['list'] = $gigs;
    saveData($data);
}

header("Location: panel.manage.php");