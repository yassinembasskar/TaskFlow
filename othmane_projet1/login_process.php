<?php


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs (you can add more validation as needed)
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // Check if any required fields are empty
    if (empty($username) || empty($password)) {
        // Handle empty fields error (e.g., display an error message or redirect back to the login page)
        echo "Please fill in all required fields.";
        exit;
    }

    // Database connection setup (Replace 'your_db_host', 'your_db_username', 'your_db_password', and 'your_db_name' with your actual database credentials)
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'TaskFlow';

    // Create a database connection
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Check if the connection was successful
    if ($conn->connect_error) {
        // Handle database connection error (e.g., display an error message or redirect to an error page)
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to fetch the user data from the Users table
    $stmt = $conn->prepare("SELECT Password FROM Users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with the given username exists in the database
    if ($stmt->num_rows > 0) {
        // Bind the result and fetch the hashed password from the database
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password entered by the user with the hashed password from the database
        if (password_verify($password, $hashedPassword)) {
            // Successful login
            // Redirect to the index page and display a success message
            header("Location: index.php?login=success");
            exit;
        } else {
            // Invalid password
            // You can display an error message or redirect back to the login page with an error
            echo "Invalid password.";
        }
    } else {
        // User not found
        // You can display an error message or redirect back to the login page with an error
        echo "User not found.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the login page if the form was not submitted
    header("Location: login.php");
    exit;
}


// Check if the login credentials are correct (Replace this with your actual login validation logic)
$username = 'JohnDoe'; // Replace 'JohnDoe' with the actual username entered during login
$password = 'password'; // Replace 'password' with the actual password entered during login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    if ($inputUsername === $username && $inputPassword === $password) {
        // Login successful, set session variable for the username
        session_start();
        $_SESSION['username'] = $inputUsername;
        header("Location: index.php");
        exit;
    } else {
        // Login failed, handle the error (e.g., display an error message or redirect back to the login page)
        echo "Invalid username or password.";
    }
}



?>
