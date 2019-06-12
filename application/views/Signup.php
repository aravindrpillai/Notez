<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notez</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" >
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>" >
</head>

<body>
<nav class="navbar navbar-inverse navbar-static-top role="navigation">
<div class="container" style="width:100%!important">
	<div class="navbar-header pull-left">
		<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-edit"></span> Notez</a>
	</div>
	<div class="collapse navbar-collapse pull-right" id="navbar">
		<form class="navbar-form navbar-right" role="search">
			<div class="form-group">
				<input type="text" placeholder="Note ID" class="form-control">
			</div>
			<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
		</form>
	</div>
</div>
</nav>

<div class="container-fluid" style="margin-top:2%; height: 100%; display: flex; justify-content: center; align-items: center;">
	  <div class="col-sm-4">
		<div class="row"><?php require_once("common/flash_message.php") ?></div>	
		<div class="panel panel-default" style="height:330px">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> User Registration</h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url("SignUp/Register") ?>" method="POST">
				<div style="margin-top:10px">
					<label>Full Name</label>
					<?php 
					$name = array('name'=>'name','value'=>set_value('name',@$name), 'class'=>'form-control','placeholder' => 'John Honai');
					echo form_input($name); 
					?>
				</div>
				<div style="margin-top:10px">
					<label>Email ID</label>
					<?php 
					$email = array('name'=>'email','value'=>set_value('email',@$email), 'class'=>'form-control','placeholder' => 'john@yahoo.com');
					echo form_input($email); 
					?>
				</div>
				<div style="margin-top:15px">
					<label>Password</label>
					<?php 
					$password = array('name'=>'password','value'=>set_value('password',@$password), 'class'=>'form-control','placeholder' => '* * * * * *');
					echo form_password($password); 
					?>
				</div>
				
				<div style="margin-top:15px">
					<button onClick="login()" type="button" class="btn btn-success pull-left"><span class="glyphicon glyphicon-log-in"></span> Return</button>
					<button name="submit_button" value="login" class="btn btn-info pull-right"><span class="glyphicon glyphicon-save"></span> Register</button>
					<button type="reset" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
				</div>
				</form>
			</div>
		</div>
	  </div>
	  
				
</div>

<footer style="position:fixed; 	bottom:0; width:100%">
	<div class="footer-blurb">
		<div style="padding-left:20px; padding-right:20px; ">
				<p class="pull-right">Development Credits : Aravind R Pillai</p>
				<p class="pull-left">Copyright &copy; Wokidz.com 2019 </p>
		</div>
	</div>
</footer>
</body>
</html>

	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/holder.min.js') ?>"></script>
	<script>
		function login(){
			window.location.replace("<?php echo base_url("Login") ?>");
		}
	</script>
	