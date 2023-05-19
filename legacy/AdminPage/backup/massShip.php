<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Well Done Seafood | Mass Ship</title>
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
					<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
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
			<li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Mass Ship</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mass Ship</h1>
			</div>
		</div><!--/.row-->	
		
		<div class="row">
			<div class="col-lg-12">
				<h2>Shipping Company</h2>
			</div>
		
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-pills">
							<li class="active"><a href="#pilltab1" data-toggle="tab">DHL eCommerce</a></li>
							<li><a href="#pilltab2" data-toggle="tab">J&T Express</a></li>
							<li><a href="#pilltab3" data-toggle="tab">Poslaju</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="pilltab1">
								<h4>DHL eCommerce</h4>
								<p>Order ID</p>
							</div>
							<div class="tab-pane fade" id="pilltab2">
								<h4>J&T Express</h4>
								<p>Order ID</p>
							</div>
							<div class="tab-pane fade" id="pilltab3">
								<h4>Poslaju</h4>
								<p>Order ID</p>
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!-- /.col-->
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
