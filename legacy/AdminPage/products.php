<?php
	session_start();
	include("validation.php");
	include('conn_db.php');
	$database='wdsf';
	$mysqli=new mysqli($host,$user,$password,$database);

	if(!$mysqli)
	{
		echo "database connect error: ". mysqli_connect_errno();
		exit();
	}

	if (isset($_POST['name']) && isset($_POST['des']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['unit'])){
		$queryu = 'UPDATE product SET Product_Name="'. $_POST['name'] . '", Product_price="'. $_POST['price'] . '", unit="'. $_POST['unit']. '", Category_id="'. $_POST['type']. '", Details="'. $_POST['des'] . '" where Product_id="'. $_POST['ID'] .'"';
		$resultu = $mysqli -> query($queryu);
		$destination = "../assets/seafoodimg/".$_POST['ID'].".jpg";
		if (file_exists($destination)){
			unlink("../assets/seafoodimg/".$_POST['ID'].".jpg");
		}
		move_uploaded_file($_FILES['img']['tmp_name'], $destination);

		if ($resultu){
			echo "<script>alert('Seafood Updated')</script>";
		} else {
			echo "<script>alert('Seafood Update Failed')</script>";
		}

	} else {
		echo "<script>alert('Please don't let the data blank!')</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Well Done Seafood | Products</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Welldone</span>Seafood</a>	
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['username']?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span><?php echo $_SESSION['auth']==1 ? "standard admin" : "Power admin" ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Order <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="orderView.php">
						<span class="fa fa-arrow-right">&nbsp;</span> View
					</a></li>
				</ul>
			</li>
			<li><a href="products.php"><em class="fa fa-toggle-off">&nbsp;</em> Products</a></li>
			<?php echo $_SESSION['auth'] == 2 ? '<li><a href="registerAdmin.php"><em class="fa fa-toggle-off">&nbsp;</em> Register</a></li>' : ""; ?>
			<li><a href="signOut.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Products</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Products List</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div style="display:flex; flex-direction:row; align-items:center;">
						<div class="panel-heading">Seafood Type</div>
						<div>
						<?php
							echo'<a href="products.php?add=t"><input type="submit" name="submit" value="Add" class="btn btn-lg btn-link"></a>';
						?>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form action="products.php" method="post">
								<h4>Fish</h4>
								<?php
									$query = "select * from product where Category_id=3";
									$result = $mysqli->query($query);
									while($row=$result->fetch_assoc())
									{
										echo '<a href="products.php?id='. $row['Product_id'] .'"><input type="button" class="btn btn-lg btn-primary" value="'.$row['Product_Name'].'"></a>&nbsp;&nbsp;';
									}
								?>
								<br />
								<br />
								<h4>Crab</h4>
								<?php
									$query = "select * from product where Category_id=2";
									$result = $mysqli->query($query);
									while($row=$result->fetch_assoc())
									{
										echo '<a href="products.php?id='. $row['Product_id'] .'"><input type="button" class="btn btn-lg btn-warning" value="'.$row['Product_Name'].'" ></a>&nbsp;&nbsp;';
									}
								?>
								<br />
								<br />
								<h4>Prawn</h4>
								<?php
									$query = "select * from product where Category_id=1";
									$result = $mysqli->query($query);
									while($row=$result->fetch_assoc())
									{
										echo '<a href="products.php?id='. $row['Product_id'] .'"><input type="button" class="btn btn-lg btn-danger" value="'.$row['Product_Name'].'" ></a>&nbsp;&nbsp;';
									}
								?>
								<br />
								<br />
								<h4>Clam</h4>
								<?php
									$query = "select * from product where Category_id=4";
									$result = $mysqli->query($query);
									while($row=$result->fetch_assoc())
									{
										echo '<a href="products.php?id='. $row['Product_id'] .'"><input type="button" class="btn btn-lg btn-default" value="'.$row['Product_Name'].'" ></a>&nbsp;&nbsp;';
									}
								?>
								<br />
								<br />
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
				
				
				<div class="panel panel-default" style="display:<?php if(isset($_GET['add']) == 't' || isset($_GET['id'])){ echo "block"; } else { echo "none"; } ?>">
					<div class="panel-heading"><?php if(isset($_GET['add']) == 't'){echo "Add"; } else if (isset($_GET['id'])){ echo "Edit";}?> Profile</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php
								if (isset($_GET['id'])){
									$query = "select * from product where Product_id='".$_GET['id']."'";
									$result = $mysqli->query($query);
									$row = $result->fetch_assoc();
									$name = $row['Product_Name'];
									$des = $row['Details'];
									$price = $row['Product_price'];
									$unit = $row['unit'];
									$cate = $row['Category_id'];
								} else {
									$name = "";
									$des = "";
									$price = "";
									$unit = "";
									$cate = "";
								}

							?>
							<form method="POST" enctype="multipart/form-data" action="<?php if(isset($_GET['add'])){ echo "insertid_commit.php"; } else if (isset($_GET['id'])) { echo "products.php"; } else { echo ""; } ?>">
								<?php
									if (isset($_GET['id'])){
										echo '<div class="form-group">
											<label>Seafood ID</label>
											<input value="'. $_GET['id'] .'" class="form-control" name="ID" readonly>
										</div>';
									}
								?>
								<div class="form-group">
									<label>Seafood Name</label>
									<input value="<?php echo $name; ?>" class="form-control" name="name">
								</div>
								<div class="form-group">
									<label>Label Image</label>
									<input type="file" name="img">
									<p class="help-block">Upload the picture you want to change.</p>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea class="form-control" rows="3" name="des"><?php echo $des; ?></textarea>
								</div>
								<label>Price</label>
								<div class="form-group has-success">
									<input value="<?php echo $price?>" name="price" class="form-control" placeholder="0.00">
								</div>
								<label>Unit</label>
								<div class="form-group has-success">
									<input value="<?php echo $unit?>" name="unit" class="form-control">
								</div>
								<div class="form-group">
									<label>Type</label>
									<div class="select">
										<select name="type" id="">
											<option value="3" <?php echo $cate == 3 ? "selected" : "" ?>>Fish</option>
											<option value="1" <?php echo $cate == 1 ? "selected" : "" ?>>Prawn</option>
											<option value="2" <?php echo $cate == 2 ? "selected" : "" ?>>Crab</option>
											<option value="4" <?php echo $cate == 4 ? "selected" : "" ?>>Clam</option>
										</select>
									</div>
								</div>

								<?php 
									if(isset($_GET['add']) == 't'){
										echo '<input type="submit" name="submit" class="btn btn-primary" value="Add">';
									} else {
										echo '<input type="submit" class="btn btn-primary edit" value="Save Changes">';
										echo '<a href = "deleteproduct.php?id='. $_GET['id'] .'">Delete</a>';
									}
								?>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
