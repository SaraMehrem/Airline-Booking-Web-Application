<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php require("header.php"); ?>

    <main>

        <?php

        include("connection.php");

        $id = $_GET["id"];
        $sql = "SELECT * FROM flight WHERE flight_id = $id;";
        $result = mysqli_query($connection, $sql);
        $value = mysqli_fetch_assoc($result);

        $src_city = $value["src_city"];
        $dist_city = $value["dist_city"];

        if (isset($_POST['bookButton']) && isset($_SESSION["email"]) && isset($_SESSION["id"])) {

            $pass_id = $_SESSION["id"];
            $flight_id = $_GET["id"];
            $typef = $_POST["type"];
            $departuref = $_POST["departure"];
            $returnf = $_POST["return"];

            $sql = "INSERT INTO pass_fli (pass_id, flight_id, departuref, returnf, typef) VALUES ($pass_id, $flight_id, '$departuref', '$returnf', '$typef')";
            $result = mysqli_query($connection, $sql);

        }

        ?>


        <h2 class="reserve">Reserve Your Flight
            <hr>
        </h2>


        <form class="bookingForm" action="" method="post">

            <div class="srcDist">

                <label for="src">From</label>
                <input type="text" placeholder="" id="src" name="src" value="<?php echo $src_city ?>">

                <br>
                <label for="dist">To</label>
                <input type="text" placeholder="" name="dist" id="dist" value="<?php echo $dist_city ?>">


                <div class="type">
                    <label>Type</label>
                    <br>
                    <input type="radio" id="type1" name="type" value="Round Trip">
                    <label for="type1">Round Trip</label>
                    <input type="radio" id="type2" name="type" value="One Way">
                    <label for="type2">One Way</label>
                </div>
            </div>



            <div class="info">
                <label for="departure">Departure</label>
                <input type="text" name="departure" id="departure" placeholder="Departure Date" required>

                <label for="return">Return</label>
                <input type="text" name="return" id="return" placeholder="Return Date" required>

                <button class="bookButton" type="submit" name="bookButton" onclick="alertBooking()">Book Now</button>
            </div>




        </form>
    </main>

    <?php require("footer.php") ?>

    <script src="js/alert.js"></script>

</body>

</html>