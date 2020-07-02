<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<?php $this->load->view('v_visitorheader');?>
		<div class="container">
			<div class="col-md-6">
				<div class="jumbotron">
					<h1><a href="<?php echo base_url('admin/C_AdminHome')?>">ke hal admin</a></h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" href="<?php echo base_url('admin/C_AdminHome')?>"" role="button">Learn more</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="jumbotron">
					<h1><a href="<?php echo base_url('user/c_user')?>">ke hal User</a></h1>
					<p>...</p>
					<p><a class="btn btn-primary btn-lg" href="<?php echo base_url('user/c_user')?>" role="button">Learn more</a></p>
				</div>
			</div>	
		</div>
		<?php $this->load->view('v_visitorfooter');?>
	</body>
</html>