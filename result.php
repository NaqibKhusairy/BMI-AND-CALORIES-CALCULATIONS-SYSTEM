<?php
    $name = strtoupper($_POST["name"]);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Result - BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <h1><?php echo $name; ?> BMI & CALORIES RESULTS</h1><br>

    <h2>BMI Reference Table</h2>
    <table>
        <tr>
            <th>BMI Range</th>
            <th>Interpretation</th>
        </tr>
        <tr>
            <td>Less than 16</td>
            <td>Severe Thinness</td>
        </tr>
        <tr>
            <td>16 - 17</td>
            <td>Moderate Thinness</td>
        </tr>
        <tr>
            <td>17 - 18.6</td>
            <td>Mild Thinness</td>
        </tr>
        <tr>
            <td>18.6 - 25</td>
            <td>Normal</td>
        </tr>
        <tr>
            <td>25.1 - 30</td>
            <td>Overweight</td>
        </tr>
        <tr>
            <td>30 - 35</td>
            <td>Obese Class I</td>
        </tr>
        <tr>
            <td>35 - 40</td>
            <td>Obese Class II</td>
        </tr>
        <tr>
            <td>Over 40</td>
            <td>Obese Class III</td>
        </tr>
    </table><br>

    <form>
        <?php
        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve user input from the form
            $age = $_POST["age"];
            $sex_type = $_POST["sex_type"];
            $height = $_POST["height"];
            $weight = $_POST["weight"];
            $activity = $_POST["activity"];

            // Check if the input values are valid
            if (is_numeric($age) && is_numeric($height) && is_numeric($weight)) {
                $height = $height / 100; // Convert height from cm to meters
                $bmi = $weight / ($height * $height); // formula to calculate BMI

                $interpretation = ""; // Initialize interpretation variable
                if ($bmi < 16) {
                    $interpretation = "Severe Thinness";
                    $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 16 && $bmi <= 17) {
                    $interpretation = "Moderate Thinness";
                    $normal_weight = ($height * height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi > 17 && $bmi < 18.6) {
                    $interpretation = "Mild Thinness";
                    $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 18.6 && $bmi <= 25) {
                    $interpretation = "Normal";
                } elseif ($bmi > 25.1 && $bmi < 30) {
                    $interpretation = "Overweight";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi >= 30 && $bmi <= 35) {
                    $interpretation = "Obese Class I";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } elseif ($bmi > 35 && $bmi <= 40) {
                    $interpretation = "Obese Class II";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                } else {
                    $interpretation = "Obese Class III";
                    $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                }

                if ($interpretation != "Normal") {

                    echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                    echo "<p>($interpretation)</p>";
                    echo "<p>To achieve a Normal BMI, you need to weigh approximately " . number_format($normal_weight, 2) . " kg.</p>";
                } else {

                    echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                    echo "<p>($interpretation)</p>";
                }
                echo "</form>
                    <br><br>
                    <form>";
                $height = $height * 100; // Convert height from cm to meters
                // Calculate daily calorie needs
                if ($sex_type == "male") {
                    $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
                } elseif ($sex_type == "female") {
                    $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
                }

                $total_calories = $bmr * $activity; // formula to calculate total_calories

                // Food suggestions based on calorie needs
                $food_suggestions = "";

                // Calculate the calorie distribution for each meal
                $calories_per_meal = $total_calories / 3;

                // Define calorie ranges for each meal
                $breakfast_calories = $calories_per_meal * 0.25; // 25% of daily calories for breakfast
                $lunch_calories = $calories_per_meal * 0.35; // 35% of daily calories for lunch
                $dinner_calories = $calories_per_meal * 0.40; // 40% of daily calories for dinner

                // Food suggestions based on calorie distribution for breakfast
                if ($interpretation == "Overweight" || $interpretation == "Obese Class I" || $interpretation == "Obese Class II" || $interpretation == "Obese Class III") {
                    // Suggestion for an overweight or obese individual
                    $breakfast_fat = "Include healthy fats like avocados or nuts.";
                    $breakfast_protien = "Opt for lean protein sources such as eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Incorporate vegetables and fruits into your breakfast for added nutrients.";
                    $breakfast_karbohodrat = "Choose whole grains for complex carbohydrates.";
                
                    $lunch_fat = "Consider a salad with olive oil dressing for healthy fats.";
                    $lunch_protien = "Select lean meats like grilled chicken or tofu for protein.";
                    $lunch_buah_sayur = "Have a side of vegetables or a fruit salad.";
                    $lunch_karbohodrat = "Include quinoa or brown rice for complex carbs.";
                
                    $dinner_fat = "Opt for baked or steamed fish for essential fats.";
                    $dinner_protien = "Choose protein sources like fish or lean beef.";
                    $dinner_buah_sayur = "Include a variety of vegetables in your dinner.";
                    $dinner_karbohodrat = "Select sweet potatoes or whole wheat pasta for carbohydrates.";
                } elseif ($interpretation == "Normal") {
                    // Suggestion for a person with a normal BMI
                    $breakfast_fat = "Balance your meal with healthy fats like nuts or seeds.";
                    $breakfast_protien = "Include a good source of protein such as eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Add vegetables or fruits for extra nutrients.";
                    $breakfast_karbohodrat = "Choose whole-grain options for carbohydrates.";
                
                    $lunch_fat = "Incorporate healthy fats like avocados or olive oil into your meal.";
                    $lunch_protien = "Opt for lean protein sources like chicken or tofu.";
                    $lunch_buah_sayur = "Include a variety of colorful vegetables and fruits.";
                    $lunch_karbohodrat = "Select whole grains for your carbohydrate source.";
                
                    $dinner_fat = "Balance your meal with sources of healthy fats like fish or nuts.";
                    $dinner_protien = "Choose protein sources like fish or lean beef for dinner.";
                    $dinner_buah_sayur = "Add a generous serving of vegetables to your dinner.";
                    $dinner_karbohodrat = "Opt for complex carbs like quinoa or brown rice.";
                } else {
                    // Suggestion for other interpretations (Severe Thinness, Moderate Thinness, Mild Thinness)
                    $breakfast_fat = "Include healthy fats for energy, such as nuts or seeds.";
                    $breakfast_protien = "Opt for protein-rich sources like eggs or Greek yogurt.";
                    $breakfast_buah_sayur = "Incorporate fruits and vegetables for added nutrients.";
                    $breakfast_karbohodrat = "Choose complex carbohydrates like oats or whole-grain bread.";
                
                    $lunch_fat = "Include sources of healthy fats like avocados or olive oil.";
                    $lunch_protien = "Select lean protein sources such as chicken or tofu.";
                    $lunch_buah_sayur = "Add a variety of colorful vegetables and fruits to your lunch.";
                    $lunch_karbohodrat = "Opt for whole grains like brown rice or quinoa.";
                
                    $dinner_fat = "Balance your meal with healthy fats from fish or nuts.";
                    $dinner_protien = "Choose protein sources like fish or lean beef for dinner.";
                    $dinner_buah_sayur = "Include a generous serving of vegetables for dinner.";
                    $dinner_karbohodrat = "Select complex carbohydrates like sweet potatoes or whole wheat pasta.";
                }                

                echo "<p>Your Daily Calorie Needs: " . number_format($total_calories, 2) . " calories per day</p>"; // show the result
                echo "<p>Calories for Breakfast: " . number_format($breakfast_calories, 2) . " calories</p>";
                echo "<p>Calories for Lunch: " . number_format($lunch_calories, 2) . " calories</p>";
                echo "<p>Calories for Dinner: " . number_format($dinner_calories, 2) . " calories</p>";
            } else {
                echo "<p>Invalid input. Please enter numeric values for age, height, and weight.</p>";
            }
        } else {
            echo "<p>Form data not submitted.</p>";
        }
        ?>
    </form>
    <br>
    <script>
        // JavaScript code to highlight the user's BMI range
        document.addEventListener("DOMContentLoaded", function () {
            var interpretation = "<?php echo $interpretation; ?>";
            var table = document.querySelector("table");
            var rows = table.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) { // Start from 1 to skip the table header row
                var cells = rows[i].getElementsByTagName("td");
                if (cells.length >= 2) {
                    if (cells[1].textContent.trim().toLowerCase() === interpretation.toLowerCase()) {
                        rows[i].classList.add("highlight"); // Add a CSS class to highlight the row
                        // If you have specific styles for the cells, you can highlight them individually too.
                        // cells[0].classList.add("highlight");
                        // cells[1].classList.add("highlight");
                        break; // Stop after finding the match
                    }
                }
            }
        });

        // Add an access key for the Print button (Alt + Shift + P)
        printButton.accessKey = "p";
    </script>
    <a href="foodsuggest.php?breakfast_fat=<?php echo urlencode($breakfast_fat); ?>&breakfast_protien=<?php echo urlencode($breakfast_protien); ?>&breakfast_buah_sayur=<?php echo urlencode($breakfast_buah_sayur); ?>&breakfast_karbohodrat=<?php echo urlencode($breakfast_karbohodrat); ?>
    &lunch_fat=<?php echo urlencode($lunch_fat); ?>&lunch_protien=<?php echo urlencode($lunch_protien); ?>&lunch_buah_sayur=<?php echo urlencode($lunch_buah_sayur); ?>&lunch_karbohodrat=<?php echo urlencode($lunch_karbohodrat); ?>
    &dinner_fat=<?php echo urlencode($dinner_fat); ?>&dinner_protien=<?php echo urlencode($dinner_protien); ?>&dinner_buah_sayur=<?php echo urlencode($dinner_buah_sayur); ?>&dinner_karbohodrat=<?php echo urlencode($dinner_karbohodrat); ?>
    &interpretation=<?php echo urlencode($interpretation); ?>&name=<?php echo urlencode($name); ?>" class="button" target="_blank" name="submit">Show Food Suggestions</a>
    <!-- Add Print button -->
    <center>
        <br><br>
        <button id="printButton" class="button" style="display: none;">Save PDF</button>
    </center>
    <script>
        var showFoodSuggestionsButton = document.getElementById("showFoodSuggestions");
        var printButton = document.getElementById("printButton");

        // Show the Print button and trigger the print dialog
        printButton.style.display = "block";
        printButton.addEventListener("click", function () {
            window.print();
        });
    </script>
</body>
</html>
