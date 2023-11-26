<?php

// Replace these variables with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $regNumber = $_POST["regNumber"];
    $password = $_POST["password"];

    // Hash the password (for security, you should use more advanced hashing methods)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL to insert data into the 'portal' table
    $sql = "INSERT INTO portal (regNumber, password) VALUES ('$regNumber', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registration successful. Thank you!"); window.location.href="portal.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();

?>