<?php

include("connection.php");

if (isset($_POST['signupbutton'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM passenger WHERE email = '$email';";
    $res = mysqli_query($connection, $check);
    $row = mysqli_fetch_assoc($res);

    if ($row["email"] == $email) {

        echo  "<script>
         alert('This Email Already Exist')
        </script>";
       

    } else {

        $sql = "INSERT INTO passenger (fname, lname, username, email, pass) VALUES ('$fname', '$lname', '$username', '$email', '$password')";
        $result = mysqli_query($connection, $sql);

        if ($result) {

            header("location:login.php");

        } else {

            header("location:signup.php");

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

    <main class="signupContainer">
        <img class="logo" src="resources/images/logo.png" alt="logo">
        <h2 class="signup">Sign Up</h2>

        <form class="signupForm" action="" method="post">

            <label for="pass_fname">First Name</label>
            <input type="text" id="pass_fname" name="fname" placeholder="Insert Your First Name" required>

            <label for="pass_lname">Last Name</label>
            <input type="text" id="pass_lname" name="lname" placeholder="Insert Your Last Name" required>

            <label for="username">username</label>
            <input type="text" id="username" name="username" placeholder="Insert Your username" required>

            <label for="pass_email">Email</label>
            <input type="email" id="pass_email" name="email" placeholder="Insert Your Email" required>

            <label for="passenger_pass">Password</label>
            <input type="password" id="passenger_pass" name="password" placeholder="Insert Your password" required>

            <button class="signupButton" type="submit" name="signupbutton">sign up</button>
        </form>

    </main>
</body>

</html>