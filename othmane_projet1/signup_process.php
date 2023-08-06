<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user inputs (you can add more validation as needed)
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    // Check if any required fields are empty
    if (empty($username) || empty($email) || empty($password)) {
        // Handle empty fields error (e.g., display an error message or redirect back to the signup page)
        echo "Please fill in all required fields.";
        exit;
    }

    // Hash the password before storing it in the database for security reasons
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

    // Prepare the SQL statement to insert the user data into the Users table
    $stmt = $conn->prepare("INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)");

    // Bind the parameters and execute the statement
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Successful signup
        // Redirect to the login page and display a success message
        header("Location: login.php?signup=success");
        exit;
    } else {
        // Signup failed
        // You can display an error message or redirect back to the signup page with an error
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the signup page if the form was not submitted
    header("Location: signup.php");
    exit;
}
session_start();
$_SESSION['username'] = $username;
header('Location: index.php?signup=success');
exit();
?>
