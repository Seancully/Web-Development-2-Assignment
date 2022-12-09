<?php
    // starts session
    session_start();
 ?>
 
 <html>
    <?php
        // If logged in 
        if (isset($_SESSION["username"])) {
            echo "<p style = 'color: #6F4E37'>Welcome, you are logged in as " . $_SESSION["username"];
        } // else if not logged in go to login page
        else{
            header('Location: login_assignment.php');
        }
    ?>
    <title>Home Assignments</title>
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
            <h2>Home Page</h2>
        </div>

        <div class = "pic2"></div>

        <div class = "pic3"></div>

    </body>
    <footer>Site by Sean Culleton &copy; 2022</footer>
</html>