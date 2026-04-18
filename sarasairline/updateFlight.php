<?php

include("connection.php");

if (isset($_GET["pass_id"]) && isset($_GET["flight_id"])) {

   $pass_id = $_GET["pass_id"];
    $flight_id = $_GET["flight_id"];

    $sql = "SELECT * FROM pass_fli WHERE pass_id = $pass_id AND flight_id = $flight_id;";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    $departuref = $row["departuref"];
    $returnf = $row["returnf"];

}

if (isset($_POST["updateInfoButton"])) {

    $departue = $_POST["departure"];
    $return = $_POST["return"];

    $sql = "UPDATE pass_fli set departuref = '$departue', returnf = '$return' WHERE pass_id = $pass_id AND flight_id = $flight_id;";
    $result = mysqli_query($connection, $sql);

    if ($result) {

         header("Location:myFlight.php");

    } else {

         echo "<script>
         alert('Something Wrong')
         </script>";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Flight</title>
  <link rel="stylesheet" href="css/reset.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/updateFlight.css">
</head>
</head>

<body>

  <h2 class="update">Update Your Flight
    <hr>
  </h2>

  <form class="updateForm" method="post">

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Departure</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="departure"
        value="<?php echo $departuref ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Ruturn</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="return"
        value="<?php echo "$returnf"; ?>">
    </div>
    <button type="submit" class="btn btn-primary button" name="updateInfoButton">Update</button>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>


</body>

</html>