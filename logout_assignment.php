<?php
    // start session
    session_start();
    // end session
    session_destroy();
    // once done, go to login page
    header("Location: login_assignment.php");
?>