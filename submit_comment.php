<!DOCTYPE html>
<html>
<head>
    <title>Comment Submitted - BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <form>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "review";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the database if it doesn't exist
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === TRUE) {
            // Use the newly created database
            $conn->select_db($dbname);

            // Create the "review" table if it doesn't exist
            $sql = "CREATE TABLE IF NOT EXISTS review (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                emoji VARCHAR(255) NOT NULL,
                comment TEXT
            )";

            if ($conn->query($sql) === TRUE) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
                    $userComment =$_POST['comment'];
                    $emoji = $_POST['emoji'];
                    $name = $_POST['name'];

                    // Insert the data into the database
                    $sql = "INSERT INTO review (name, emoji, comment) VALUES ('$name', '$emoji', '$userComment')";

                    if ($conn->query($sql) === TRUE) {
                        echo "<h1>Thank you $name for your Review 😃</h1>";
                    } else {
                        echo "<h1>Error to insert database 😢</h1>";
                    }
                } else {
                    echo "<h1>No comment submitted.</h1>";
                }
            } else {
                echo "Error creating table: " . $conn->error;
            }
        } else {
            echo "Error creating database: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
        ?>
    </form>
    <br><br>
    <a href="javascript:window.close();" class="button">Close</a>
</body>
</html>