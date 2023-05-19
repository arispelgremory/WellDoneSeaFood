<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/adminAddOn.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php
						include('conn_db.php');
						$database='wdsf';
						$mysqli=new mysqli($host,$user,$password,$database);
						
						if(!$mysqli)
						{
							echo "database connect error: ". mysqli_connect_errno();
							exit();
						}

						if(isset($_POST['submit']))
						{
							$name = $_POST['name'];
							$password = $_POST['password'];
							
							$query = "select * from admin where adName='".$name."' and adPassword='".$password."'";
							$result = $mysqli->query($query);
							$row = $result -> fetch_assoc();
							$check = false;
							$error = "";
							if($name == "")
							{
								$error.= "name/";
								$check = true;
							}
							if($password == "")
							{
								$error.= "password";
								$check = true;
							}
							if($error)
							{
								echo '<script>alert("Please enter your '.$error.'.")</script>';
							}

							if($result -> num_rows > 0)
							{
								session_start();
								$_SESSION['username'] = $name;
								if ($row['authorid'] == "standard admin"){
									$_SESSION['auth'] = 1;
								} else {
									$_SESSION['auth'] = 2;
								}
								echo '<script>window.location.href = "index.php";</script>';
							}
							else
							{
								echo '<script>alert("Invalid name or password");</script>';
							}
						}
					?>

					<form role="form" action="login.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
