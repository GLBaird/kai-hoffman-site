<?php
    $username = isset($_GET['username']) ? "value=\"{$_GET['username']}\"" : "";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Kai-hoffman Admin</title>
</head>
<body>
    <div class="container">
        <div class="panel">
            <h1>Kai hoffman admin</h1>
            <p>Please sign in:</p>
            <form action="check_details.php" method="POST">
                <p><input type="text" name="username" placeholder="Username" <?php echo $username ?>></p>
                <p><input type="password" name="password" placeholder="password"></p>
                <?php if (isset($_GET['error'])) echo "<p class=\"error\">{$_GET['error']}</p>" ?>
                <p class="buttons"><input type="reset" value="Clear"> <input type="submit" value="Sign in"></p>
            </form>
        </div>
    </div>
</body>
</html>