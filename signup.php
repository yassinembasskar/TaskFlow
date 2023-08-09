<?php
    $error = "";
    include 'config.php';
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $select_1 = "SELECT * FROM users WHERE Email = '$email' OR Username = '$username'";
        $result_1 = mysqli_query($conn, $select_1);
        if (mysqli_num_rows($result_1) > 0) {
            $error = "Some of the information you've submitted already exists";
        } else {
            $insert = "INSERT INTO users(Username, Email, Password) VALUES('$username','$email','$hashedPassword')";
            mysqli_query($conn, $insert);
            $UserRow="SELECT * FROM users WHERE Username = '$username' and Email = '$email'";
            $resultId = mysqli_query($conn, $UserRow);
            $user = mysqli_fetch_assoc($resultId);
            $_SESSION['username'] = $username;
            $_SESSION['Email'] = $email;
            $_SESSION['UserId'] = $user['UserID'];
            header("Location: home.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TaskFlow Signup</title>
  <!-- Add your CSS files and other dependencies here -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/fontawesome.css" rel="stylesheet">
  <link href="assets/css/templatemo-tale-seo-agency.css" rel="stylesheet">
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
</style>

</head>

<body>
  <!-- Add your header or navigation if needed -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2>Sign Up</h2>
        <form action="" method="POST">
          <!-- Add your signup form fields here -->
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button name="signup" id="signup" type="submit" class="btn btn-primary">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
        <?php
          if ($error!="") {
              echo "<p style='color:red; margin-left:20px;'>" . $error . "</p>";
          } 
        ?>
      </div>
    </div>
  </div>
  <!-- Add your footer or any scripts if needed -->
  
</body>

</html>
