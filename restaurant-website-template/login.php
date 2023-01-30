<?php
include_once 'DB-Connection-Model.inc';
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Überprüfen Sie hier, ob der Benutzername und das Passwort korrekt sind
  // Dies kann z.B. durch Abfrage einer Datenbank erfolgen
  $user = $conn->query("SELECT * FROM users WHERE username='$username'")->fetch();
  //var_dump($user);

  //$result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");


  if ($user && password_verify($password, $user['password'])) {
    // Legen Sie hier eine Session-Variable fest, um den Benutzer einzuloggen
    $_SESSION['logged_in'] = true;
    header('Location: index.html');
    exit;
  } else {
    //header('Location: login.html');
    echo 'Falscher Benutzername oder Passwort';
  }
}
?>

<html>

<head>
  <title>Login</title>
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
    <input type="submit" value="Login">
    <br>You dont have an account? <a href="signup.html">Sign up here</a>
  </form>


</body>

</html>