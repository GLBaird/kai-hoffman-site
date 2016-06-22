<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$dataFileURL    = "page_data/{$page}.json";
$pageContentURL = "pages/_{$page}.php";
$error = false;

if (!file_exists($dataFileURL) || !file_exists($pageContentURL)) {
    $dataFileURL    = "page_data/home.json";
    $pageContentURL = "pages/_home.php";
}

try {
    $pageData = json_decode(file_get_contents($dataFileURL), true);
} catch (Exception $e) {
    $error = true;
    $pageData = ["title" => "Server error", "keywords" => "error", "description" => "error loading page"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php echo $pageData["title"]; ?></title>

    <meta name="keywords" content="<?php echo $pageData["keywords"]; ?>">
    <meta name="description" content="<?php echo $pageData["description"]; ?>">
    <meta name="viewport" content="initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1">

    <?php require "partials/_head.php";?>

</head>

<body>
<?php require "partials/_header.php";?>

<?php
if ($error) {
    echo '<main style="height: 20em"><h1>Server Error</h1><p>There has been an error rending this page. Please try a different page.</p></main>';
} else {
    /** @noinspection PhpIncludeInspection */
    require $pageContentURL;
}
?>

<?php require "partials/_footer.php";?>

<?php require "partials/_construction_warning.php";?>
</body>
</html>

