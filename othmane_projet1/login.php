<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TaskFlow Login</title>
  <!-- Add your CSS files and other dependencies here -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/fontawesome.css" rel="stylesheet">
  <link href="assets/css/templatemo-tale-seo-agency.css" rel="stylesheet">

  <!-- Custom Animated Style -->
  <style>
  body {
    background-color: #f9f1f1;
  }

  .container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    animation: fadeIn 1s ease;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  h2 {
    color: #33ccc5;
    text-align: center;
    margin-bottom: 30px;
  }

  label {
    color: #33ccc5;
    font-size: 14px;
    transition: transform 0.3s ease;
  }

  .animated-placeholder input {
    border: none;
    border-bottom: 2px solid #ccc;
    width: 100%;
    padding: 5px 0;
    font-size: 16px;
    margin-bottom: 10px;
    transition: border-bottom-color 0.3s ease;
  }

  .animated-placeholder input:focus {
    border-bottom-color: #33ccc5;
  }

  .animated-placeholder input:focus+label {
    transform: translateY(-25px) scale(0.8);
  }

  .btn-primary {
    background-color: #33ccc5;
    border: none;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #1b928b;
  }

  p {
    color: #33ccc5;
    text-align: center;
    margin-top: 20px;
  }

  .animated.fadeIn {
    opacity: 1;
  }

  .animated.zoomIn {
    transform: scale(1);
  }

  .modal-content {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
</style>


</head>

<body>
  <!-- Add your header or navigation if needed -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="animated fadeIn">Login</h2>
        <form action="login_process.php" method="POST">
          <!-- Add your login form fields here -->
          <div class="form-group animated-placeholder">
            <input type="text" class="form-control" id="username" name="username" required>
            <label for="username">Username</label>
          </div>
          <div class="form-group animated-placeholder">
            <input type="password" class="form-control" id="password" name="password" required>
            <label for="password">Password</label>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="animated fadeIn">Don't have an account? <a href="signup.php">Sign up here</a></p>
      </div>
    </div>
  </div>
  <?php
  // Check if the signup was successful and display a message if needed
if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
    echo "Signup successful!";
}
  ?>
</body>

</html>

<?php
// Establish a connection to the database (Replace 'db_host', 'db_user', 'db_password', and 'db_name' with your actual database credentials)
$connection = mysqli_connect('localhost', 'root', '', 'TaskFlow');

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform server-side validation if needed

    // Hash the password (consider using password_hash() function)
    $hashedPassword = md5($password);

    // Check if the user exists in the Users table
    $query = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$hashedPassword'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Login successful, redirect to a dashboard or user-specific page
        header('Location: dashboard.html');
        exit();
    } else {
        // Handle login failure
        echo 'Invalid username or password. Please try again.';
    }
}



// Close the database connection
mysqli_close($connection);
?>
