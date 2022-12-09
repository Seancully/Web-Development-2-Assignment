<html>
<?php
    // starts session
    session_start();
?>
    <?php
        // If logged in 
        if (isset($_SESSION["username"])) {
            echo "<p style = 'color: #6F4E37'>Welcome, you are logged in as " . $_SESSION["username"];
        } // else if not logged in go to login page
        else{
            header('Location: login_assignment.php');
        }
    ?>
    <title>Search Assignments</title>
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
            <h2>Search Page</h2>
        </div>

        <div class = "searchH3">
            <h3>Search by Book Title And/Or Author</h3>
        </div>

        <div class = "searchBody1">
            <form class = "searchTitleAuthor" method = "post">
                <input class = "inputCSS" type = "text" name = "search1" placeholder = "Book Title And/Or Author">
                <input class = "search" type = "submit" name = "search" value = "Search">
            </form>
        </div>

        <div class = "searchH3">
            <h3>Search by Book Category Description</h3>
        </div>

        <div class = "searchBody2">
            <form class = "SearchCategory" method = "post">
                <select class = "inputCSS" name = search1>
                    <option class = "inputCSS" name = "search2">Select a Category</option>
                        <option disables selected> -- Category -- </option>
                        <?php 
                        // connect database
                        include "database_assignment.php";
                        $result = mysqli_query($conn, "SELECT * FROM category");

                        while ($row = mysqli_fetch_array($result))
                        {
                            echo "<option value ='".$row['CategoryID']."'> ".$row['CategoryDescription']."</option>";
                        }

                        ?>
                </select>
                <input class = "search" type = "submit" name = "search" value = "Search">      
            </form>
        </div>

        <div class = "php">
            <?php include "view_assignment.php"; ?>
        </div>

        <div class = "php">
            <?php include "view2_assignment.php"; ?>
        </div>
    
    </body>

    <footer>Site by Sean Culleton &copy; 2022</footer>
</html>