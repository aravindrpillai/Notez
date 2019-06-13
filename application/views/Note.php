<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notez</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" >
	<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>" >
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-static-top role="navigation">
        <div class="container" style="width:100%!important">
            <div  style="cursor:pointer" class="navbar-header pull-left">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-edit"></span> Notez </a><a class="navbar-brand">|</a>
                <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span> Aravind R Pillai</a><a class="navbar-brand">|</a>
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a><a class="navbar-brand">|</a>
                <a class="navbar-brand" href="<?php echo base_url('Note/NewNote')?>"><span class="glyphicon glyphicon-plus"></span> New Note</a> 
            </div>
            
            <div class="collapse navbar-collapse pull-right" id="navbar">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <label style="color:white">Note No : <a style="color:white" href="<?php echo base_url("Notes/".$data["note_id"]) ?>"><?php echo $data["note_id"] ?></a> - </label>
                        <input type="text" id="note_name" value="<?php echo $data["note_name"] ?>" onChange="updateNoteName('<?php echo $data["note_id"] ?>')" placeholder="Note Name" class="form-control note_name_field">
                        <input type="text" value="N8735" placeholder="Note ID" style="width:80px" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
        </div>
    </nav>

<div class="container-fluid">
	
	<div class="row"><center><div style="width:97%"><?php require_once("common/flash_message.php") ?></div></center></div>
    
    <div class="col-sm-10">
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Synergize:</strong> Seamlessly visualize quality intellectual capital!
		</div>      
	
		<div class="row">
			<article class="col-xs-12" id="text_content">
				<div style="width:80%!important" id="summernote"></div>
			</article>
		</div>
	</div>


      <div class="col-sm-2">
            <div class="panel panel-default" style="height:400px">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-envelope"></span> 
                        Discussions
                    </h3>
                </div>
                <div class="panel-body">
                <table>
                    <tr>
                    <td><input type="text" class="form-control" id="message_bo" placeholder="Enter your message"></td>
                    <td><button class="btn btn-info"><span class="glyphicon glyphicon-send"></span></button></td>
                    </tr>
                </table>
                
                        
                    
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Members</h3></div>
                <div class="panel-body">
                    <table>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Aravind R Pillai</td></tr>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Jithesh Mavila</td></tr>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Shine Kannkath</td></tr>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Kumaran Kanniyappan</td></tr>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Irine Varadaraj</td></tr>
                        <tr><td><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;</td><td>Darshan</td></tr>
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#summernote').summernote({
            height: 570,
            minHeight: 400,
            maxHeight: 600,
            focus: true,
            callbacks: {
              onChange: function (contents, $editable) {
               var code = $(this).summernote("code");
                    //alert(code);
              }
            }
          })
        });
		
		function updateNoteName(noteid){
			var noteName = $("#note_name").val();
			alert(noteid+" - "+noteName);
			
		}
    </script>
    
    <style>
        .note_name_field{
            background-color: transparent;
            color:white;
        }
    </style>
</body>

</html>
