<?php
session_start();
if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}

require_once('tools.php');

$data = loadData();
$gigs = $data['list'];

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
            <h1>Kai's Events Organiser - Manager</h1>
            <p>Here are your current events:</p>
            <table style="margin-bottom: 0;">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th/>
                    </tr>
                </thead>
            </table>
            <div class="tableScroll">
                <table style="margin-top: 0;">
                    <tbody>
                        <?php
                        foreach($gigs as $index => $gig) {
                            echo '<tr>';
                            echo "<td>{$gig['date']}</td>";
                            echo "<td>{$gig['time']}</td>";
                            echo "<td>{$gig['venue']}</td>";
                        ?>
                        <td>
                            <div class="editTools">
                                <a href="panel.manage.edit.php?index=<?php echo $index ?>">
                                    <img src="icons/icons8-edit-64.png" alt="Edit" height="25px" title="Edit">
                                </a>
                                <a href="panel.manage.delete.php?index=<?php echo $index ?>" data-tref="delete">
                                    <img src="icons/icons8-empty-trash-64.png" alt="Edit" height="25px" title="delete">
                                </a>
                                <div class="arrows">
                                    <?php if ($index > 0) { ?>
                                    <a href="panel.manage.move.php?index=<?php echo $index ?>&direction=-1" title="up">
                                        <img src="icons/icons8-sort-up-filled-50.png" alt="move up">
                                    </a>
                                    <?php } ?>
                                    <?php if ($index < count($gigs) - 1) { ?>
                                    <a href="panel.manage.move.php?index=<?php echo $index ?>&direction=1"  title="down">
                                        <img src="icons/icons8-sort-down-filled-50.png" alt="move up">
                                    </a>
                                    <?php } ?> 
                                </div>
                            </div>
                        </td>
                        <?php
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <p><a href="panel.php">Back</a></p>
        </div>
    </div>
    <script src="panel.manage.js"></script>
</body>
</html>