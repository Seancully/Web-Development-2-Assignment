<?php

    unset($_SESSION['search2']);
    // connect database
    include "database_assignment.php";

    if(isset($_POST['search1'])){
        $title1 = $_POST['search1'];
        
        // SQL statement
        $sql = "SELECT * FROM books WHERE CategoryID = '$title1' ";

        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        
        if ($result->num_rows>0)
    {
        // output data of each row in a table
        echo "<table border='1'>";
        echo "<tr><th>ISBN</th><th>BookTitle</th><th>Author</th><th>Edition</th><th>Year</th><th>CategoryID</th><th>Reserved</th></tr>";
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
            if (htmlentities ($row["Reserved"]) == 'N') { // reserve link for table
                echo '<a class = "reserveBook" name = "reserveBook" href = "reserve_assignment.php">Reserve</a>';
            }
            echo ("</td><td>\n");
            echo ("</td></tr>\n");
        }
    }else 
    {
        
    }
    $conn->close();
}
?>