<?php
    // start session
    session_start();
    unset($_SESSION['username']);

    // connect database
    include "database_assignment.php";

    if(isset($_POST['username']) && ($_POST['password'])){

        // set variables
        $user = $_POST['username'];
        $pass = $_POST['password'];

        // SQL statement
        $sql = "select * from user where Username = '$user'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // logging in.....
        if($count == 1) {

            $_SESSION["username"] = $_POST["username"];
            $_SESSION["success"] = "Logged in";
            header('Location: home_assignment.php');
            return;

        }

    }
    
    // var for if input fields are blank
    $success = "";
    
    // validation of input for login function
    function validate_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    if(isset($_POST['submit'])) {
        // assigning variables
        $name = $_POST['username'];
        $password = $_POST['password'];
    
        // if user name is empty validation
        if (empty($_POST["username"])) {
            // error message 
            echo"\n<div class = 'errorLogin'> <p>Cannot leave username field blank - please try again.</p></div> <br/>";
        } else {
            // call input validation function
            $name = validate_input($_POST["username"]);
        }
        
        // if password is empty validation
        if (empty($_POST["password"])) {
            // error message
            echo"\n<div class = 'errorRegister'> <p>Cannot leave password input field blank - please try again.</p></div> <br/>";
        } else {
            // call input validation function
            $password = validate_input($_POST["password"]);
        }
    
        // if both fields are empty validation
        if(empty($success))
            echo '<script>
            window.location.href = "login_assignment.php";
            alert("Login Failed")
            </script>';
        return;
    }

?>
<html>
    <title>Login Assignment</title>
    <head>
        <meta charset="UTF-8" />
        <link rel = "stylesheet" href = "./css_assignment.css">
    </head>

    <body class = "loginBody">

        <div class = "container2">

            <form method = "post">

            <input class = "inputCSS" type = "username" name = "username" placeholder = "username">
            <input class = "inputCSS" type = "password" name = "password" placeholder = "password">
            <input class = "Login" type = "submit" name = "submit" value = "Login" href = "home_assignment.php">
            <p>Don't have an account?</p>
            <a href = "register_assignment.php">Register </a>

            </form>

        </div>



    </body>

    <footer>Site by Sean Culleton &copy; 2022</footer>

</html>