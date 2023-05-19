<?php
	session_start();
	include("validation.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Register</title>
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
				<div class="panel-heading">Register Admin</div>
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
							$cPassword = $_POST['confirmPassword'];

							$query = "select * from admin where adName='".$name."'";
							$result = $mysqli->query($query);
							$check = false;
							$error = "";

							if($result -> num_rows > 0)
							{
								echo '<script>alert("The admin name was taken by others.")</script>';
							}
							else
							{
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

								if(!$check)
								{
									$sql="Insert into admin(adName,adPassword) values('$name','$password')";
									if($mysqli -> query($sql) === TRUE)
									{
										echo '<script>alert("Register successful!")</script>';
									} 
								}
							}							
						}
					?>

					<form role="form" action="registerAdmin.php" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm Password" name="confirmPassword" type="password">
							</div>
							<div class="form-group">
								<label>Authority</label>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Standard Admin
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Power Admin
									</label>
								</div>
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Register">
							<a href="index.php" class="btn btn-primary">Back</a>
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
