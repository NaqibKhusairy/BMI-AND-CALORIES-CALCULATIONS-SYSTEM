<!DOCTYPE html>
<html>
<head>
    <title>BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <h1>BMI And Calories Calculator</h1>
    <form action="result.php" method="post" target="_blank">
        Name: <input type="text" name="name" required><br><br>
        Age: <input type="number" name="age" min="1" required><br><br>
        Gender:
        <input type="radio" name="sex_type" value="male" required> Male
        <input type="radio" name="sex_type" value="female"> Female<br><br>
        Height (cm): <input type="text" name="height" required><br>
        Weight (kg): <input type="text" name="weight" required><br>
        Physical Activity:
        <select name="activity" required>
            <option value="1.2">Very Light (Sedentary)</option>
            <option value="1.375">Lightly Active</option>
            <option value="1.55">Moderately Active</option>
            <option value="1.725">Heavy (Very Active)</option>
        </select><br><br>
        <input type="submit" value="Calculate">
    </form>
    <br>
    <form action="view_reviews.php" target="_blank">
        <input type="submit" value="View Reviews">
    </form>
</body>
</html>