<html>
    <body>
        <?php

            unset($_SESSION['search1']);
            // connect database
            include "database_assignment.php";

            if(isset($_POST['search1'])){
                $title = $_POST['search1'];
                
                // Define how many results per page
                $results_per_page = 5;

                // SQL statement
                $sql = "SELECT * FROM books WHERE BookTitle LIKE '%$title%' OR Author LIKE '%$title%' ";

                $result = $conn->query($sql);
                // how many total results
                $count = mysqli_num_rows($result);
                
            // find total no. of pages needed , ceil rounds up if needs be for pages
            $count_pages = ceil($count/$results_per_page);

            // check what page user is currently on
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            // SQL Limit for starting no. of each page
            $page_first_result = ($page - 1)*$results_per_page;

            // SQL statement with new LIMIT and display to page
            $sql = "SELECT * FROM books WHERE BookTitle LIKE '%$title%' OR Author LIKE '%$title%' LIMIT " . $page_first_result . ',' . $results_per_page;
            $result = $conn->query($sql);
            
            if ($result->num_rows>0)
            {
                // output data of each row in table
                echo "<table border='1'>";
                echo "<tr><th>ISBN</th><th>BookTitle</th><th>Author</th><th>Edition</th><th>Year</th><th>CategoryID</th><th>Reserved</th><th>Reserve</th></tr>";
                while($row = $result->fetch_assoc())
                {
                
                    echo "<tr><td>";
                    echo (htmlentities ($row["ISBN"]));
                    echo ("</td><td>");
                    echo (htmlentities ($row["BookTitle"]));
                    echo ("</td><td>");
                    echo (htmlentities ($row["Author"]));
                    echo ("</td><td>\n");
                    echo (htmlentities ($row["Edition"]));
                    echo ("</td><td>\n");
                    echo (htmlentities ($row["Year"]));
                    echo ("</td><td>\n");
                    echo (htmlentities ($row["CategoryID"]));
                    echo ("</td><td>\n");
                    echo (htmlentities ($row["Reserved"]));
                    echo ("</td><td>\n");
                    if (htmlentities ($row["Reserved"]) == 'N') { // Reserve link in table
                        echo '<a class = "reserveBook" href = "reserve_assignment.php?ISBN='.htmlentities ($row["ISBN"]).'">Reserve</a>';
                    }
                    echo ("</td><td>\n");
                    echo ("</td></tr>\n");

                }
            }

            // display links to other pages
            for ($page = 1;$page<=$count_pages;$page++) { 
                echo '<a href = search_assignment.php?page=' . $page . ' ">' .$page .'</a> ';
            }

            $conn->close();
        }

        ?>
    </body>
</html>