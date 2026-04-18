<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reserve.css">
</head>

<body>

    <?php require("header.php") ?>

    <main>

        <h2 class="pageTitle"> See The World
            <hr>
        </h2>

        <div class='Flights'>

        <?php

        include("connection.php");

        $sql = "SELECT * FROM flight;";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                $flight_id = $row["flight_id"];
                $to = $row["dist"];
                $src_city = $row["src_city"];
                $dist_city = $row["dist_city"];
                $price = $row["price"];
                $path = $row["path"];
                $description = $row["description"];

                echo "
                

                    <div class='flight'>

                          <div class='flightImg'><img src='$path' alt='$description'></div>

                                <div class='info'>

                                       <h2 class='i country'>$to</h2>
                                       <h3 class='i city'>$dist_city</h2>
                        
                                        <div class='infoContainer'>
                                            <h4 class='i price'>From $price JOD</h4>
                                            <a href='booking.php?id=$flight_id' class='i book'>Book</a>
                                        </div>
                                </div>
                    </div>
           
                ";
             }
        } else {
            
        echo  "<script>
        alert('Something Wrong')
        </script>";
      
        }

        ?>

</div>  


    </main>

    <?php require("footer.php") ?>


</body>

</html>