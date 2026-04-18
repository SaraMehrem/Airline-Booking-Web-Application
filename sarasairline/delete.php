<?php

include("connection.php");

if(isset($_GET["pass_id"]) && isset($_GET["flight_id"])) {

    $pass_id = $_GET["pass_id"];
    $flight_id = $_GET["flight_id"];
        
    $sql = "DELETE FROM pass_fli WHERE pass_id = $pass_id AND flight_id = $flight_id;";
    $result = mysqli_query($connection, $sql);

    if($result) {

        header("Location:myFlight.php");

    } else {

        echo  "<script>
        alert('Something Wrong')
        </script>";

    }
}

?>