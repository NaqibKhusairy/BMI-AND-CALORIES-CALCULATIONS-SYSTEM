<!DOCTYPE html>
<html>
    <head>
        <title>CALORIES CALCULATOR</title> <!--The title -->
        <link rel="stylesheet" type="text/css" href="styles.css"> <!--The link Cascading Style Sheets file-->
        <link rel="icon" href="icon.png" type="image/png"> <!--The Icon -->
    </head>
    <body>
        <h1>Calorie Calculator</h1> <!--The header -->
        <form action="kalori_result.php" method="post" target="_blank"> <!--The form -->
            Age: <input type="text" name="age"><br><br>
            Gender:
            <input type="radio" name="sex_type" value="male"> Male
            <input type="radio" name="sex_type" value="female"> Female<br><br>
            Height (cm): <input type="text" name="height"><br>
            Weight (kg): <input type="text" name="weight"><br>
            Physical Activity:
            <select name="activity">
                <option value="1.2">Very Light (Sedentary)</option>
                <option value="1.375">Lightly Active</option>
                <option value="1.55">Moderately Active</option>
                <option value="1.725">Heavy (Very Active)</option>
            </select><br><br>
            <input type="submit" value="Calculate"> <!--The Calculate button -->
        </form>
    </body>
</html>
