<?php
session_start();
include("connection.php");

if (isset($_POST['passLogin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM passenger WHERE email='$email' AND pass='$password'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        header('Location:index.php');
        
    } else {

        echo "<script>
         alert('invalid email or password')
        </script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/img/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <main class="loginContainer">
        <img class="logo" src="resources/images/logo.png" alt="logo">
        <h2 class="login">Login</h2>


        <form class="loginForm" method="post">
            <label for="pass_email">Email</label>
            <input type="email" id="pass_email" name="email" placeholder="Insert Your Email">

            <label for="passenger_pass">Password</label>
            <input type="password" id="passenger_pass" name="password" placeholder="Insert Your password">

            <button class="loginButton" type="submit" name="passLogin">Login</button>
            <a class="signup" href="signup.php">Create New Account</a>
        </form>

    </main>

</body>

</html>