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
            <div  style="cursor:pointer" class="navbar-header pull-left">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-edit"></span> Notez </a><a class="navbar-brand">|</a>
                <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span> <?php echo @$this->session->userdata('name');?></a><a class="navbar-brand">|</a>
                <a class="navbar-brand" href="<?php echo base_url('Login/Logout')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a> 
            </div>
            
            <div class="collapse navbar-collapse pull-right" id="navbar"  style="width:50%!important">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" value="Guidewire Sandbox Setup Instructions" placeholder="Note Name" class="form-control note_name_field">
                        <input type="text" value="N8735" placeholder="Note ID" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
                </form>
            </div>
        </div>
    </nav>

<div class="container-fluid">
       
  <div class="col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> My Notes </h3>
			<input type="text"> 
		</div>
		<div class="panel-body">
			<table class="table table-hover table-responsive">
				<tr><td>1.</td><td>App Dynamics Setup</td></tr>
				<tr><td>2.</td><td>Guidewire Integ Tutorial</td></tr>
				<tr><td>3.</td><td>Common Law</td></tr>
			</table>
		</div>
	</div>
  </div>
   
  <div class="col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> People Associated </h3></div>
		<div class="panel-body">
			<table class="table table-hover table-responsive">
				<tr><td>1.</td><td>Aravind R Pillai</td></tr>
				<tr><td>2.</td><td>Sukanya Vijayan</td></tr>
				<tr><td>3.</td><td>Chithra R</td></tr>
			</table>
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
    
    <script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/holder.min.js') ?>"></script>
</body>

</html>
