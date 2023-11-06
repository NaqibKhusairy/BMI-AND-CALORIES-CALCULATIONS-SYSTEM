<!DOCTYPE html>
<html>
<head>
    <title>Review - BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <?php
    if (isset($_GET['emoji'])) {
        $selectedEmoji = $_GET['emoji'];
        $name = $_GET['name'];
        echo "<h1>You selected the emoji: $selectedEmoji</h1>";
    } else {
        echo "<h1>No emoji selected.</h1>";
    }
    ?>

    <form method="post" action="submit_comment.php">
        <label for="comment">Please provide your comment:</label>
        <textarea id="comment" name="comment" rows="6" cols="47"></textarea>
        <input type="hidden" value="<?php echo $name;?>" name="name">
        <input type="hidden" value="<?php echo $selectedEmoji;?>" name="emoji">
        <br><br>
        <input type="submit" value="Submit Comment">
    </form>
</body>
</html>
