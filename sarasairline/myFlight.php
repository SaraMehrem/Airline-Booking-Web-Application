<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Flights</title>
    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/myFlights.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php require("header.php") ?>

    <main>


        <h2 class="myFlights">My Flights
            <hr>
        </h2>

        <div class="flights">

            <?php

            include("connection.php");

            if (isset($_SESSION["email"]) && isset($_SESSION["email"])) {

                $id = $_SESSION["id"];

                $sql = "SELECT pass_fli.*, flight.src_city, flight.dist_city FROM pass_fli JOIN flight ON pass_fli.flight_id = flight.flight_id WHERE pass_fli.pass_id = $id;";
                $result = mysqli_query($connection, $sql);


                while ($row = mysqli_fetch_assoc($result)) {

                    $pass_id = $row["pass_id"];
                    $flight_id = $row["flight_id"];
                    $src_city = $row["src_city"];
                    $dist_city = $row["dist_city"];
                    $typef = $row["typef"];
                    $departuref = $row["departuref"];
                    $returnf = $row["returnf"];

                    echo "
            
                            <div class='flight'>
                                 <p class='info sd'>From $src_city To $dist_city</p>
                                 <p class='info t'>$typef</p>
                                 <p class='info d'>$departuref</p>
                                 <p class='info r'>$returnf</p>

                                  <button class='button update' type='submit' name='updateButton'><a class='updateA' href='updateFlight.php?pass_id=$pass_id&flight_id=$flight_id'>Update</a></button>
                                  <button class='button delete' type='submit' name='deleteButton'><a class='deleteA' href='delete.php?pass_id=$pass_id&flight_id=$flight_id'>Delete</a></button>
                            </div>

            
                     ";

                }
            } else {

                echo  "<script>
                alert('You are not logged in, so no flights')
                </script>";
    
            }

            ?>

        </div>

    </main>

    <?php require("footer.php") ?>

</body>

</html>