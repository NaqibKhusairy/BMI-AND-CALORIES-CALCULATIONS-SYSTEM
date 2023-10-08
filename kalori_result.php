<!DOCTYPE html>
<html>
    <head>
        <title>CALORIES CALCULATOR - RESULT</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="icon" href="icon.png" type="image/png">
    </head>
    <body>
        <h1>Calorie Calculator Results</h1>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $age = $_POST["age"];
                $gender = $_POST["sex_type"];
                $height = $_POST["height"];
                $weight = $_POST["weight"];
                $activity = $_POST["activity"];

                // Calculate daily calorie needs
                if ($gender == "male") {
                    $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
                } elseif ($gender == "female") {
                    $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
                }

                $total_calories = $bmr * $activity;

                echo "<p>Your Daily Calorie Needs: " . number_format($total_calories, 2) . " calories per day</p>";
            }
        ?>
    </body>
</html>