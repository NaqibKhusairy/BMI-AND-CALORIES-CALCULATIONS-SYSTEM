<!DOCTYPE html>
<html>
    <head>
        <title>BMI CALCUATOR - RESULT</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="icon" href="icon.png" type="image/png">
    </head>
    <body>
        <h1>BMI Calculator Results</h1>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $height = $_POST["height"] / 100; // Convert height from cm to meters
                $weight = $_POST["weight"];
                $bmi = $weight / ($height * $height);

                echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>";

                // Interpretation of BMI
                if ($bmi < 16) {
                    echo "<p>(Severe Thinness)</p>";
                } elseif ($bmi >= 16 && $bmi <= 17) {
                    echo "<p>(Moderate Thinness)</p>";
                } elseif ($bmi > 17 && $bmi < 18.6) {
                    echo "<p>(Mild Thinness)</p>";
                } elseif ($bmi >= 18.6 && $bmi <= 25) {
                    echo "<p>(Normal)</p>";
                } elseif ($bmi > 25.1 && $bmi < 30) {
                    echo "<p>(Overweight)</p>";
                } elseif ($bmi >= 30 && $bmi <= 35) {
                    echo "<p>(Obese Class I)</p>";
                } elseif ($bmi > 35 && $bmi <= 40) {
                    echo "<p>(Obese Class II)</p>";
                } else {
                    echo "<p>(Obese Class III)</p>";
                }
            }
        ?>
    </body>
</html>