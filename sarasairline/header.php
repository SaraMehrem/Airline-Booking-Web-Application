<header>
    <nav class="nav">

        <img class="logo" src='resources/images/logo.png' alt="logo" />
        <h1 class="airlineName">Sara's Airline</h1>


        <ul class="listContainer">
            <li class="list"><a class="aNav" href="index.php">Home</a></li>
            <li class="list"><a class="aNav" href="reserve.php">Reserve</a></li>
            <li class="list"><a class="aNav" href="myFlight.php">My Flights</a></li>
            <li class="list"><a class="aNav" href="index.php#about">About</a></li>
            <?php
            session_start();
            if (isset($_SESSION["email"]) && isset($_SESSION["id"])) {
                echo "<li class='list'><button class='buttonNav'><a class='buttonA' href='logout.php'>Log out</a></button></li>";
            } else {
                echo "<li class='list'><button class='buttonNav'><a class='buttonA' href='login.php'>Login</a></button></li>";
            }
            ?>
        </ul>

    </nav>
</header>