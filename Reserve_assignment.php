<?php
    // start session
    session_start();
    // connect database
    require_once "database_assignment.php";
    if (isset($_POST['reserveB']) && isset($_POST['ISBN']))
    {
        $ISBN = $conn -> real_escape_string($_POST['ISBN']);
        $dateReserved = date('Y-m-d');
        $nameUser = $_SESSION["username"];

        // SQL statement's
        $sql = "UPDATE books SET Reserved = 'Y' WHERE ISBN = '$_GET[ISBN]' ";
        $sql2 = "INSERT INTO reservations(ISBN, Username, ReservedDate) VALUES ('$_GET[ISBN]','$nameUser','$dateReserved') ";

        echo "<pre>\n$sql\n</pre>\n";
        echo "<pre>\n$sql2\n</pre>\n";

        $conn->query($sql);
        $conn->query($sql2);

        // Then go to home page
        echo 'Success - <a href="home_assignment.php">Continue...</a>';

        return;

    }

    $ISBN = $conn -> real_escape_string($_GET['ISBN']);
    // SQL statement
    $sql = "SELECT BookTitle, ISBN FROM books WHERE ISBN = '$ISBN'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
 
    // For confirm page and reserve button etc
    echo "<p>Confirm: Reservation ". $row["BookTitle"] ."</p>\n";
    echo ('<form method="post"><input type="hidden" ');
    echo ('name="ISBN" value="'.htmlentities ($row["ISBN"]). '">' . "\n");
    echo ('<input type="submit" value="Reserve" name="reserveB">');
    echo ('<a href="home_assignment.php">Cancel</a>');
    echo ("\n</form>\n");
   
   
   

?>