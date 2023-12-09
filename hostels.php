<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        
        }
        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.success-message {
            color: #4caf50;
            font-weight: bold;
            text-align: center;
        }

        p.error-message {
            color: #f44336;
            font-weight: bold;
            text-align: center;
        }
        .headers {
            background-color: #6d3535;
        }

        h1 {
            text-align: center;
            color: white;
            padding: 20px;
            margin: 0;
        }

        /* Navigation Bar Styles */
        nav {
            overflow: hidden;
            background-color: #14b0cc;
        }
        nav a:hover {
            background-color: red;
        }
        nav a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }
        .navbar a:hover{
            background-color:red;
        }
        
        .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Main Content Styling */
        .main-content {
            padding: 20px;
            text-align: center;
        }
        .main-content {
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            color: #333;
        }
        .main-content {
            text-align: center;
        }
        .carousel-container {
            max-width: 600px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
        }

        .carousel-images {
            display: flex;
            animation: rotateImages 10s linear infinite; /* Adjust the duration as needed */
        }

        .carousel-images img {
            max-width: 100%;
            height: auto;
        }

        @keyframes rotateImages {
            from {
                transform: translateX(0%);
            }
            to {
                transform: translateX(-100%);
            }
        }

    </style>
</head>
<body>
    <div class="headers">
        <h1>Elite College</h1>
    </div>
    <!-- Navigation Bar -->
    <nav>
        <a href="main.html">Home</a>
        <div>
    <a href="admission.html">Admissions</a>
            
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Academics
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
        <a href="courses.html">Courses</a>
                
            </div>
        </div>
        <a href="about us.html">About Us</a>
        <a href="contact.html">Contact</a>
        <a href="portal.html">Portals</a>

            </div>
        </div>
        <a href="hostels.php">Hostels</a>
    </nav>
    <div class="carousel-container">
            <div class="carousel-images">
                <!-- Sample images (customize the src attributes) -->
                <img src="images/hostels.jpg" alt="Hostel Image">
                <img src="images/hostel.jpg" alt="Image 2">
                <img src="images/host.jpg" alt="Hostel Image">
            </div>
        </div>

<!-- Sample paragraph (customize the content) -->
<p>
    Welcome to Elite College Hostel Booking! Complete the form below to secure your accommodation.
</p>
    <h2>Hostel Booking Form</h2>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Replace these database connection details with your own
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

        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $regno = $_POST['regno'];

        // SQL query to insert data into the 'hostel' table
        $sql = "INSERT INTO hostel (name, email, regno) VALUES ('$name', '$email', '$regno')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            // Display JavaScript alert for successful booking
            echo '<script>alert("Booking successful. Thank you!");</script>';
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <form method="POST" action="hostels.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="regno">Registration Number:</label>
        <input type="text" name="regno" required><br>

        <input type="submit" value="Book Now">
    </form>
</body>
</html>
