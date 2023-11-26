<?php
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
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $program = $_POST['program'];

    // Insert data into the database after the confirmation
    $sql = "INSERT INTO admission (fullName, email, course, program) VALUES ('$fullName', '$email', '$course', '$program')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        // Display JavaScript alert for successful admission and redirect
        echo '<script>alert("Admission successful. Thank you!"); window.location.href="admission.html";</script>';
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>