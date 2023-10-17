<!DOCTYPE html>
<html>
    <head>
        <title>BMI CALCUATOR - RESULT</title> <!--The title -->
        <link rel="stylesheet" type="text/css" href="styles.css"> <!--The link to Cascading Style Sheets file-->
        <link rel="icon" href="icon.png" type="image/png"> <!--The Icon -->
    </head>
    <body onload="window.print();" accesskey="p">
        <center>
            <form action="next.php" method="post">
            <h1>BMI Calculator Results</h1> <!--The header -->
            
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $height = $_POST["height"] / 100; // Convert height from cm to meters
                    $weight = $_POST["weight"]; // get weight from the form
                    $bmi = $weight / ($height * $height); // formula to calculate BMI

                    $interpretation = ""; // Initialize interpretation variable
                    if ($bmi < 16) {
                        $interpretation = "(Severe Thinness)";
                        $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                    } elseif ($bmi >= 16 && $bmi <= 17) {
                        $interpretation = "(Moderate Thinness)";
                        $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                    } elseif ($bmi > 17 && $bmi < 18.6) {
                        $interpretation = "(Mild Thinness)";
                        $normal_weight = ($height * $height) * 18.6; // Calculate the weight needed to achieve Normal BMI
                    } elseif ($bmi >= 18.6 && $bmi <= 25) {
                        $interpretation = "(Normal)";
                    } elseif ($bmi > 25.1 && $bmi < 30) {
                        $interpretation = "(Overweight)";
                        $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                    } elseif ($bmi >= 30 && $bmi <= 35) {
                        $interpretation = "(Obese Class I)";
                        $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                    } elseif ($bmi > 35 && $bmi <= 40) {
                        $interpretation = "(Obese Class II)";
                        $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                    } else {
                        $interpretation = "(Obese Class III)";
                        $normal_weight = ($height * $height) * 25; // Calculate the weight needed to achieve Normal BMI
                    }

                    if ($interpretation != "(Normal)") {
                        // JavaScript code to display the result in a pop-up
                        echo "
                            <script>
                                alert('Body Mass Index (BMI): " . number_format($bmi, 2) . " " . $interpretation . 
                                "\\nTo achieve a Normal BMI, you need to weigh approximately " . number_format($normal_weight, 2) ."');
                            </script>
                        ";

                        echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                        echo "<p>$interpretation</p>";
                        echo "<p>To achieve a Normal BMI, you need to weigh approximately " . number_format($normal_weight, 2) . " kg.</p>";
                    }
                    else{
                
                        // JavaScript code to display the result in a pop-up
                        echo "
                            <script>
                                alert('Body Mass Index (BMI): " . number_format($bmi, 2) . " " . $interpretation . "');
                            </script>
                        ";
    
                        echo "<p>Body Mass Index (BMI): " . number_format($bmi, 2) . "</p>"; // show the result
                        echo "<p>$interpretation</p>";
                        

                    }
                }
            ?>
            </form>
        </center>
    </body>
</html>