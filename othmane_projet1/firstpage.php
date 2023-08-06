<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Sign Up Page</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.background {
  background-image: url('to do.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 100vh;
}

.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
  background-color: green lime; /* Semi-transparent white background */

}

h1 {
  color: brown; /* White text color */
  margin: 40px;
}

.buttons {
  margin-top: 20px;
}

button {
  padding: 12px 24px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-btn {
  background-color: white; /* Blue button color */
  color: black;
  font-family:"Roboto",sans-serif;
  font-weight: bold;
  Width: 80px;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  text-transform:uppercase;
}

.signup-btn {
  background-color: #00ffcc; /* White button color */
  color: black; /* Blue text color */
  margin-left: 10px;
  font-family:"Roboto",sans-serif;
  font-weight: bold;
  Width: 80px;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  text-transform:uppercase;
  
}

.login-btn:hover{
    background-color: #00ffcc; 
}
.signup-btn:hover {
  background-color: white; /* Darker blue on hover */
}

  </style>
</head>

<body>
  <div class="background">
    <div class="container">
      <h1>Welcome to our website!</h1>
      <br><br>
      <div class="buttons">
        <a href="login.php" class="login-btn">Login</a>
        <a href="signup.php"  class="signup-btn">Sign Up</a>
      </div>
    </div>
  </div>
</body>

</html>
