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
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('Home') ?>">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url('Home/profile') ?>">Profile</a></li>
        <li><a href="<?php echo base_url('Home/transaksi') ?>">Transaksi</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<div class="container">
		<div class="col-md-12">
			<form class="form-horizontal" action="<?php echo base_url('Transaksi/insertTransaksi') ?>" method="post">
  <div class="form-group">
    <label for="tanggal_berangkat" class="col-sm-2 control-label">Tanggal Berangkat</label>
    <div class="col-sm-10">
      <input type="date" name="tanggal_berangkat" class="form-control" id="" placeholder="tanggal_berangkat" value="<?php echo date('Y-m-d') ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="tanggal_kembali" class="col-sm-2 control-label">Tanggal Kembali</label>
    <div class="col-sm-10">
      <input type="date" name="tanggal_kembali" class="form-control" id="" placeholder="tanggal_kembali" value="<?php echo date('Y-m-d') ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="kota_awal" class="col-sm-2 control-label">Kota Awal</label>
    <div class="col-sm-10">
      <input type="text" name="kota_awal" class="form-control" id="" placeholder="kota_awal">
    </div>
  </div>
  <div class="form-group">
    <label for="kota_tujuan" class="col-sm-2 control-label">Kota Tujuan</label>
    <div class="col-sm-10">
      <input type="text" name="kota_tujuan" class="form-control" id="" placeholder="kota_tujuan">
    </div>
  </div>
  <div class="form-group">
    <label for="jumlah_hari" class="col-sm-2 control-label">Jumlah Hari</label>
    <div class="col-sm-10">
      <input type="text" name="jumlah_hari" class="form-control" id="" placeholder="jumlah_hari">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
  		<input type="submit" name="" value="Transaksi" class="btn btn-primary">
    </div>
  </div>
</form>
			<a href="<?php echo base_url('admin')?>">ke hal admin</a>
		</div>
		
	</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>