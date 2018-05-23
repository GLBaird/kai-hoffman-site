<?php
session_start();

if (!$_SESSION['validatedUser']) {
    header("Location: index.php");
}

if (!isset($_GET['index'])) {
    header("Location: panel.manage.php");
}

require_once('tools.php');
$gig = getRecord($_GET['index']);

$date = isset($gig['date']) ? $gig['date'] : '';
$time = isset($gig['time']) ? $gig['time'] : '';
$venue = isset($gig['venue']) ? $gig['venue'] : '';
$mapRef = isset($gig['mapRef']) ? $gig['mapRef'] : '';
$link = isset($gig['link']) ? $gig['link'] : '';
$icon = isset($gig['icon']) ? $gig['icon'] : '';
$color = isset($gig['color']) ? $gig['color'] : '';


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
            <h1>Kai's Events Organiser - Edit Event</h1>
            <form action="panel.manage.update.php?index=<?php echo $_GET['index']?>" method="POST">
                <p><label for="date">Date: </label><input type="text" name="date" id="date" placeholder="Sunday January 7th 2000" value="<?php echo $date ?>"></p>
                <p><label for="time">Time: </label><input type="text" name="time" id="time" placeholder="9pm to 12:30am" value="<?php echo $time ?>"></p>
                <p><label for="venue">Venue: </label><input type="text" name="venue" id="venue" placeholder="Three Horseshoes Faversham" value="<?php echo $venue ?>"></p>
                <p>
                    <label for="mapRef">Map reference: </label> <br>
                    <textarea name="mapRef" id="mapRef" cols="30" rows="7" placeholder='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d450.49083015588064!2d0.9536101872786109!3d51.302383475528394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47decd77937aece5%3A0x20c42887e63109a1!2sThree+Horseshoes!5e0!3m2!1sen!2suk!4v1515445602613" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'><?php echo $mapRef ?></textarea>
                </p>
                <p><label for="link">Link: </label><input type="text" name="link" id="link" placeholder="https://www.threehorseshoesfaversham.co.uk" value="<?php echo $link ?>"></p>
                <p>
                    <label for="icon">Icon: </label>
                    <select name="icon" id="icon">
                        <option value="art" <?php if ('art' == $icon) echo 'selected' ?>>Art</option>
                        <option value="dance" <?php if ('dance' == $icon) echo 'selected' ?>>Dance</option>
                        <option value="mic" <?php if ('mic' == $icon) echo 'selected' ?>>Mic</option>
                        <option value="music" <?php if ('music' == $icon) echo 'selected' ?>>Music</option>
                        <option value="society" <?php if ('society' == $icon) echo 'selected' ?>>Society</option>
                        <option value="trumpet" <?php if ('trumpet' == $icon) echo 'selected' ?>>Trumpet</option>
                    </select>
                    <label for="icon">Colour: </label>
                    <select name="color" id="color">
                        <option value="red accent-2" <?php if ('red accent-2' == $color) echo 'selected' ?>>red accent-2</option>
                        <option value="pink accent-2" <?php if ('pink accent-2' == $color) echo 'selected' ?>>pink accent-2</option>
                        <option value="purple accent-2" <?php if ('purple accent-2' == $color) echo 'selected' ?>>purple accent-2</option>
                        <option value="blue accent-2" <?php if ('blue accent-2' == $color) echo 'selected' ?>>blue accent-2</option>
                        <option value="indigo accent-2" <?php if ('indigo accent-2' == $color) echo 'selected' ?>>indigo accent-2</option>
                        <option value="teal accent-2" <?php if ('teal accent-2' == $color) echo 'selected' ?>>teal accent-2</option>
                        <option value="cyan accent-2" <?php if ('cyan accent-2' == $color) echo 'selected' ?>>cyan accent-2</option>
                        <option value="light-blue accent-2" <?php if ('light-blue accent-2' == $color) echo 'selected' ?>>light-blue accent-2</option>
                        <option value="lime accent-2" <?php if ('lime accent-2' == $color) echo 'selected' ?>>lime accent-2</option>
                        <option value="light-green accent-2" <?php if ('light-green accent-2' == $color) echo 'selected' ?>>light-green  accent-2</option>
                        <option value="green accent-2" <?php if ('green accent-2' == $color) echo 'selected' ?>>green accent-2</option>
                        <option value="orange accent-2" <?php if ('orange accent-2' == $color) echo 'selected' ?>>orange accent-2</option>
                        <option value="amber accent-2" <?php if ('amber accent-2' == $color) echo 'selected' ?>>amber accent-2</option>
                        <option value="yellow accent-2" <?php if ('yellow accent-2' == $color) echo 'selected' ?>>yellow accent-2</option>
                        <option value="deep-orange accent-2" <?php if ('deep-orange accent-2' == $color) echo 'selected' ?>>deep-orange accent-2</option>
                        <option value="brown accent-2" <?php if ('brown accent-2' == $color) echo 'selected' ?>>brown accent-2</option>
                    </select>
                </p>    
                <p class="formButtons">
                    <a href="panel.manage.php">Cancel</a> 
                    <span>
                        <input type="reset" value="Clear"> 
                        <input type="submit" value="Save">
                    </span>
                </p>
            </form>
        </div>
    </div>
</body>
</html>