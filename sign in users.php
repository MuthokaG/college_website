<?php
// Database connection parameters
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
    // Retrieve user input
    $email = $_POST["email"];
    $password = $_POST["password"];
    $status = $_POST["status"]; // New line to retrieve user status

    // Validate user credentials (this is a simple example, in real-world scenarios, you'd use secure methods like password hashing)
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND status = '$status'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect based on user status
        if ($status == 'student') {
            header("Location: student_dashboard.php");
        } elseif ($status == 'staff') {
            header("Location: staff_dashboard.php");
        } else {
            echo "Invalid user status.";
        }
        exit(); // Ensure script stops execution after redirection
    } else {
        echo "Login failed. Invalid email, password, or user status.";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign In</title>
    <style>
        body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h2 {
    text-align: center;
    color: #333;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 15px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%; /* Make the button full width */
}

input[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>User Sign In</h2>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <div class="radio-group">
            <label for="status">Status:</label>
            <input type="radio" name="status" value="staff" id="staff"> <label for="staff">Staff</label>
            <input type="radio" name="status" value="student" id="student"> <label for="student">Student</label>
        </div>
<br>
        <input type="submit" value="Sign In">
    </form>
</body>
</html>