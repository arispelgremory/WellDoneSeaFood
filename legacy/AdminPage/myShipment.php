<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Well Done Seafood | My Shipment</title>
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
			<a class="navbar-brand" href="#"><span>Welldone</span>Seafood</a>	
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<a href="adminUser.php">
					<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
				</a>
			</div>
			<div class="profile-usertitle">
				<a href="adminUser.php">
					<div class="profile-usertitle-name">Admin</div>
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Power Admin</div>
				</a>
			</div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Shipment <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="myShipment.php">
						<span class="fa fa-arrow-right">&nbsp;</span> My Shipment
					</a></li>
				</ul>
			</li>
			<li><a href="products.php"><em class="fa fa-toggle-off">&nbsp;</em> Products</a></li>
			<li><a href="registerAdmin.php"><em class="fa fa-toggle-off">&nbsp;</em> Register</a></li>
			<li><a href="rating.php"><em class="fa fa-calendar">&nbsp;</em> Rating</a></li>
			<li><a href="signOut.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">My Shipment</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">My Shipment</h1>
			</div>
		</div><!--/.row-->	

		<div class="row">
			<div class="col-lg-12">
				<h2>To Ship</h2>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Order 1
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Order 2
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">Order 3
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
			
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">Order 4
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">Order 5
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-danger">
					<div class="panel-heading">Order 6
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<p>Status:</p>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	
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
