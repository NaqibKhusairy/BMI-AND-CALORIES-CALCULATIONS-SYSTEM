<!DOCTYPE html>
<html>
    <head>
        <title>BMI CALCUATOR</title> <!--The title -->
        <link rel="stylesheet" type="text/css" href="styles.css"> <!--The link Cascading Style Sheets file-->
        <link rel="icon" href="icon.png" type="image/png"> <!--The Icon -->
    </head>
    <body>
        <h1>BMI CALCUATOR</h1> <!--The header -->
        <form action="bmi_result.php" method="post" target="_blank"> <!--The form -->
            Height (cm): <input type="text" name="height"><br>
            Weight (kg): <input type="text" name="weight"><br>
            <input type="submit" value="Calculate"> <!--The Calculate button -->
        </form>
    </body>
</html>