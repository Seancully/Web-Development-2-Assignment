<?php
    // starts session
    session_start();
?>
<html>
    <title>View Reserved Assignment</title>
    <?php
        // If logged in 
        if (isset($_SESSION["username"])) {
            echo "<p style = 'color: #6F4E37'>Welcome, you are logged in as " . $_SESSION["username"];
        } // else if not logged in go to login page
        else{
            header('Location: login_assignment.php');
        }
    ?>
    <head>
        <meta charset="UTF-8" />
        <link rel = "stylesheet" href = "./css_assignment.css">
    </head>
    
    <body>
        <header>
            <div class = "container">
                <h3>Sean's Library</h3>
                <ul>
                    <li><a href = "home_assignment.php">Home </a></li>
                    <li><a href = "search_assignment.php">Search </a></li>
                    <li><a href = "ViewReserved_assignment.php">View Reserved </a></li>
                    <li><a href = "logout_assignment.php">Logout </a></li>
                </ul>
            </div>

            <div class = "pic1"></div>

        </header>

        <div class = "mainStart" >
            <h2>View Reserved Page</h2>
        </div>

        <div class = "php">
        <?php
            // connect database
            include "database_assignment.php";

            $userName = $_SESSION["username"];
            // SQL statement
            $sql = "SELECT books.ISBN, books.BookTitle, reservations.Username, reservations.ReservedDate FROM books INNER JOIN reservations ON books.ISBN = reservations.ISBN WHERE reservations.Username = '$userName' ";

            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);

            // Creates table from database
            echo "<table border='1'>";
            echo "<tr><th>ISBN</th><th>BookTitle</th><th>Username</th><th>ReservedDate</th><th>Unreserve</th></tr>";
            if ($queryResults > 0){
                while($row = $result->fetch_assoc())
                {
                    echo "<tr><td>";
                    echo (htmlentities ($row["ISBN"]));
                    echo ("</td><td>");
                    echo (htmlentities ($row["BookTitle"]));
                    echo ("</td><td>");
                    echo (htmlentities ($row["Username"]));
                    echo ("</td><td>\n");
                    echo (htmlentities ($row["ReservedDate"]));
                    echo ("</td><td>\n");
                    echo '<a class = "reserveBook" href = "unreserve_assignment.php?ISBN='.htmlentities ($row["ISBN"]).'">Unreserve</a>';
                    echo ("</td><td>\n");
                    echo ("</td></tr>\n");
                }
            }
            else // If none in database
            {
                echo("0 results");
            }
            $conn->close();
            ?>
        </div>

        
    </body>

    <footer>Site by Sean Culleton &copy; 2022</footer>
</html>