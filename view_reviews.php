<!DOCTYPE html>
<html>
<head>
    <title>View Reviews - BMI & CALORIES CALCULATIONS SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="icon" href="icon.png" type="image/png">
</head>
<body>
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
    $conn->query($sql);

    // Use the newly created or existing database
    $conn->select_db($dbname);

    // Create the "review" table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS review (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        emoji VARCHAR(255),
        comment TEXT
    )";

    $conn->query($sql);

    $sql = "SELECT name, emoji, comment FROM review";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo"<h1>Reviews</h1>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Emoji</th>";
        echo "<th>Comment</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["emoji"] . "</td>";
            echo "<td>" . $row["comment"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<form>
                <h1>No reviews found.</h1>
            </form>";
    }

    $conn->close();
    ?>
    <br>
    <a href="javascript:window.close();" class="button">Close</a>
</body>
</html>