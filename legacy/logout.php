<?php
    include("session.php");

    $_SESSION = array(); //unset all session variables at once
    session_destroy();
    //print_r($_SESSION);
    echo '<script>alert("Logout success!"); window.location = "index.php"</script>';
    
?>