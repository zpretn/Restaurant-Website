<?php
include_once 'DB-Connection-Model.inc';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // DB connection code here

  $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
  $result = $conn->query($query)->fetch();

  echo "Sign up successful!";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
  <link rel="icon" href="assets/images/Icon.png">
</head>

<body>
  <form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Sign Up">
  </form>
</body>

</html>