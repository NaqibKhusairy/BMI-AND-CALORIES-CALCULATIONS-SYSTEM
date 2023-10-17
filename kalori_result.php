<!DOCTYPE html>
<html>
    <head>
        <title>CALORIES CALCULATOR - RESULT</title> <!--The title -->
        <link rel="stylesheet" type="text/css" href="styles.css"> <!--The link Cascading Style Sheets file-->
        <link rel="icon" href="icon.png" type="image/png"> <!--The Icon -->
    </head>
    <body onload="window.print();" accesskey="p">
        <center>
            <form action="next.php" method="post">
                <h1>Calorie Calculator Results</h1> <!--The header -->
                
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $age = $_POST["age"]; // get age from the form
                        $gender = $_POST["sex_type"]; // get sex_type from the form
                        $height = $_POST["height"]; // get height from the form
                        $weight = $_POST["weight"]; // get weight from the form
                        $activity = $_POST["activity"]; // get activity from the form

                        // Calculate daily calorie needs
                        if ($gender == "male") {
                            $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
                        } elseif ($gender == "female") {
                            $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
                        }

                        $total_calories = $bmr * $activity; // formula to calculate total_calories

                        // Food suggestions based on calorie needs
                        $food_suggestions = "";
                        if ($total_calories < 1200) {
                            $food_suggestions = "You may want to consume foods high in healthy fats, lean proteins, and complex carbohydrates such as avocados, lean chicken breast, and whole grains.";
                        } elseif ($total_calories >= 1200 && $total_calories < 1800) {
                            $food_suggestions = "Consider a balanced diet with a mix of proteins, vegetables, fruits, and whole grains to meet your calorie needs.";
                        } else {
                            $food_suggestions = "To meet your high calorie needs, include a variety of foods, including lean proteins, dairy products, and plenty of fruits and vegetables.";
                        }

                        // JavaScript code to display the result in a pop-up
                        echo "
                            <script>
                                alert('Your Daily Calorie Needs: " . number_format($total_calories, 2) . " calories per day' + '\\nFood Suggestions: " . $food_suggestions . "');
                            </script>
                        ";

                        echo "<p>Your Daily Calorie Needs: " . number_format($total_calories, 2) . " calories per day</p>"; // show the result
                        echo "<p>Food Suggestions: " . $food_suggestions . "</p>";
                    }
                ?>
            </form>
        </center>
    </body>
</html>