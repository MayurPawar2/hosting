<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dbName = $_POST['dbName'];
    $tableName=$_POST['tableName'];

    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the specified table
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data as an HTML table
        echo "<table border='1'><tr><th>Bike</th><th>Name</th><th>Description</th><th>Price</th></tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr><td><img src='. $row["image"] .' alt='img'></td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td><h3>Rs ".$row['price']."/-</h3></td></tr>";
            // Add more columns as needed
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();

} else {
    // Handle other request methods or provide an error message
    echo 'Invalid request method';
}
?>
