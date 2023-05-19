<?php
    if($_SESSION['auth'] == 0){
		echo '<script>alert("Please Login if you are admin!")</script>';
		echo '<script>window.location.href = "login.php";</script>';
	}
?>