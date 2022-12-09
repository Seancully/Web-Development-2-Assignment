<html>
    <title>Register Assignments</title>
    <head>
        <meta charset="UTF-8" />
        <link rel = "stylesheet" href = "./css_assignment.css">
    </head>

    <body class = "loginBody">

        <div class = "container2">

            <form method = "post">

            <input class = "inputCSS" type = "text" name = "username" placeholder = "username">
            <input class = "inputCSS" type = "text" name = "password" placeholder = "password">
            <input class = "inputCSS" type = "text" name = "confirm_password" placeholder = "confirm password">
            <input class = "inputCSS" type = "text" name = "first_name" placeholder = "firstname">
            <input class = "inputCSS" type = "text" name = "sur_name" placeholder = "surname">
            <input class = "inputCSS" type = "text" name = "address1" placeholder = "Address Line 1">
            <input class = "inputCSS" type = "text" name = "address2" placeholder = "Address Line 2">
            <input class = "inputCSS" type = "text" name = "city" placeholder = "City">
            <input class = "inputCSS" type = "number" name = "phone" placeholder = "phone">
            <input class = "inputCSS" type = "number" name = "mobile_phone" placeholder = "mobile">
            <input class = "register" type = "submit" name = "submit" value = "Register" href = "login_assignment.php">
            <a class = "login" href = "login_assignment.php">Login</a>

            </form>

        </div>
    
<?php
        // connect database
        require_once "database_assignment.php";
        if ( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['first_name']) && isset($_POST['sur_name']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['city']) && isset($_POST['phone']) && isset($_POST['mobile_phone']))
        {
            // set variables
            $u = $_POST['username'];
            $pw = $_POST['password'];
            $cpw = $_POST['confirm_password'];
            $f = $_POST['first_name'];
            $s = $_POST['sur_name'];
            $a1 = $_POST['address1'];
            $a2 = $_POST['address2'];
            $c = $_POST['city'];
            $p = $_POST['phone'];
            $m = $_POST['mobile_phone'];

        // Input Validation for register
        // Ensures no input field is left blank and stops blank inputs being added to database
        if ($u == NULL || $pw == NULL || $cpw == NULL || $f == NULL || $s == NULL || $a1 == NULL || $a2 == NULL || $c == NULL || $p == NULL || $m == NULL) {
            echo"\n<div class = 'errorRegister'> <p>Cannot leave any input field blank - please try again.</p></div> <br/>";
        }

        // for phone number - ensures it is numeric
        if (!is_numeric($p)) {
            echo"\n<div class = 'errorRegister'> <p>Input for phone is invalid, phone number can only contain numbers - please try again.</p></div> <br/>";
        }
        
        // for phone number - ensures it is 10 numbers in length
        if (strlen($p) != 10) {
            echo"\n<div class = 'errorRegister'> <p>Input for phone is invalid, phone number can only be 10 numbers long - please try again.</p></div> <br/>";
        }

        // for mobile phone number - ensures it is numeric
        if (!is_numeric($m)) {
            echo"\n<div class = 'errorRegister'> <p>Input for mobile phone is invalid, mobile phone number can only contain characters - please try again.</p></div> <br/>";
        }

        // for mobile phone number - ensures it is 10 numbers in length
        if (strlen($m) != 10) {
            echo"\n<div class = 'errorRegister'> <p>Input for mobile phone is invalid, mobile phone can only be 10 characters long - please try again.</p></div> <br/>";
        }

        // for password - ensures password is 6 characters in length
        if (strlen($pw) != 6) {
            echo"\n<div class = 'errorRegister'> <p>Input for password is invalid, password can only be 6 characters long - please try again.</p></div> <br/>";
        }

        // for confirm password - ensures confirm password is 6 characters in length
        if (strlen($cpw) != 6) {
            echo"\n<div class = 'errorRegister'> <p>Input for confirm password is invalid, password can only be 6 characters long - please try again.</p></div> <br/>";
        }

        // for password and also confirm password - ensures both values match
        if ($pw != $cpw) {
            echo"\n<div class = 'errorRegister'> <p>Password's do not match, please try again.</p></div> <br/>";
        }

        // SQL statement
        $sql = "INSERT INTO user (Username, Password, Firstname, Surname, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ('$u', '$pw', '$f', '$s', '$a1', '$a2', '$c', '$p', '$m')";

        // If conected and works for all input validations
        if ($conn->query($sql) === TRUE && ($pw == $cpw) && strlen($cpw) == 6 && strlen($pw) == 6 && strlen($m) == 10 && is_numeric($m) && strlen($p) == 10 && is_numeric($p)) {

            echo "New record created successfully";

        }
        else { // IF doesn't work show error

            echo "Error: " . $sql . "<br>" . $conn->error;

        }

        $conn->close();
        }
        ?>

</body>

    <footer>Site by Sean Culleton &copy; 2022</footer>

</html>