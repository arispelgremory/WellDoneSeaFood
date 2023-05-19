<?php
	session_start();
	include("validation.php");
	include('conn_db.php');
	$database='wdsf';
	$mysqli=new mysqli($host,$user,$password,$database);

	if(!$mysqli)
	{
		echo mysqli_connect_error();
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Well Done Seafood | Order View</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
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
		<div class="divider"></div>
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
				<li class="active">View</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Order View</h1>
			</div>
		</div><!--/.row-->	

		<div class="row">
			<div class="col-lg-12">
				<h2>Order Detail</h2>
				<div class="input-group">
					<form action="orderView.php" method="post">
						<span class="input-group-btn">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Search Order Id" name="searchOrder" />
							<input type="submit" class="btn btn-primary btn-md" id="btn-todo" value="Find">
						</span>
					</form>
					
				</div>
				<br>
			</div>
			<?php
				$query = "SELECT * FROM orders JOIN customer ON orders.Customer_Id = customer.Customer_id";
				if($_POST){
					if($_POST['searchOrder']){
						$query = 'select * from orders JOIN customer ON orders.Customer_Id = customer.Customer_id where Order_id like "%'.$_POST['searchOrder'].'"';
					}
				}
				$result = $mysqli -> query($query);
				if(($result = $mysqli->query($query))==false)
				{
					echo 'Invalid query: '.$mysqli->error;
					exit();
				}
				while($row=$result->fetch_assoc())
				{
					echo '<div class="col-md-4">
							<div class="panel panel-primary">
								<div class="panel-heading">'.$row['Order_Id'].'
									<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
									<p>Customer Name: <span>'. $row['FName'] . ' ' . $row['LName'] .'</span></p>
									<p>Cart ID:'. $row['Cart_id'] .'</p>
									<p>Order Date: '. $row['Order_date'] .'</p>
									<p>Total: '. $row['Total'] .'</p>
									<div class="pull-right action-buttons"><a href="deleteOrder.php?Order_ID='. $row['Order_Id'] .'" class="trash"><em class="fa fa-trash"></em></a></div>
								</div>
							</div>
						</div>';
				}
			?>
		</div><!-- /.row -->
		<br><br>
		
	
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
