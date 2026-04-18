<?php

// $connection = mysqli_connect('localhost', 'root', '', 'airline');
$connection = mysqli_connect('sql309.infinityfree.com', 'if0_37205820', 'zECqXW7lvaV1s9', 'if0_37205820_airline');

if ($connection) {

    //success

} else {

    echo "<script>
    alert('Connection Faild')
    </script>";

    die(mysqli_error($connection));
}

?>