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
                <a class="navbar-brand" href="<?php echo base_url('Login/Logout')?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a> <a class="navbar-brand">|</a>
                <a class="navbar-brand" href="<?php echo base_url('Note/NewNote')?>"><span class="glyphicon glyphicon-plus"></span> New Note</a> 
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
       
  <div class="row"><center><div style="width:97%"><?php require_once("common/flash_message.php") ?></div></center></div>	
  
  <div class="col-sm-6">
	<div class="panel panel-default">
		<div style="height:40px; padding-top:0px;" class="panel-heading">
			<div style="width:40%; padding-top:10px;" class="pull-left"><h3 class="panel-title" ><span class="glyphicon glyphicon-user"></span> My Notes </h3></div>
				<form class="navbar-form navbar-right" style="margin-top:2px;" role="search">
                    <div class="form-group"><input id="serach_field" type="text" class="form-control"></div>
                    <button type="button" onClick="doSearch()" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-responsive" style="height:300px">
				<thead><td><b>#</b></td><td><b>ID</b></td><td><b>Name</b></td><td><b>Created On</b></td><td><b>Expire</b></td><td width="20%"><b>Expiry On</b></td></thead>
				<tbody id="notes_tbody"></tbody>
				<thead><td></td><td></td><td></td><td><b id="disp_page_id"></b></td><td></td>
				<td>
					<button onClick="doPagination('first')" id="nav_btn_first" type="submit" class="btn btn-default"> 1 </button>
                    <button onClick="doPagination('minus')" id="nav_btn_minus" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span></button>
                    <button onClick="doPagination('plus')"  id="nav_btn_plus"  type="submit" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right"></span></button>
                    <button onClick="doPagination('last')"  id="nav_btn_last"  type="submit" class="btn btn-default"> 6  </button>
				</td>
				</thead>
			</table>
		</div>
	</div>
  </div>
   
  <div class="col-sm-6">
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> People Associated </h3></div>
		<div class="panel-body">
			<table class="table table-hover table-responsive">
				<tr><td>1.</td><td>Aravind R Pillai</td><td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td><td><button class="btn btn-success">Read & Write</button></td></tr>
				<tr><td>2.</td><td>Sukanya Vijayan</td><td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td><td><button class="btn btn-warning">Read Only</button></td></tr>
				<tr><td>3.</td><td>Chithra R</td><td><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td><td><button class="btn btn-success">Read & Write</button></td></tr>
				<tr><td>#</td><td><input type="text" class="form-control"></td><td><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td><td></td></tr>
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

<script>
	
	var page = 1;
	var totalPages = 1;
	$("#nav_btn_last").html(totalPages);
	loadNotes();
	enableDisablePaginationButtons();
	
	function loadNotes(){
		$.ajax({
			url:"<?php echo base_url("Home/LoadMyNotes") ?>",
			type:"POST",
			data:{ 
				"page":page,
				"search_kw":$("#serach_field").val()
			},
			success:function(data){
				var parsedData = $.parseJSON(data);
				var content = "";                                                                                                      
				totalPages = parsedData["total_records"];
				$("#nav_btn_last").html(totalPages);
				$.each(parsedData["data"], function(index, element) {
					content += '<tr><td>'+(index+1)+'</td>';
					content += '<td style="cursor:pointer"><a onClick="loadAssociatedPeople(\''+element["id"] +'\')">' + element["note_id"]   + '</a></td>';
					content += '<td style="cursor:pointer"><a onClick="loadAssociatedPeople(\''+element["id"] +'\')">' + element["note_name"] + '</a></td>';
					content += '<td>' + element["created_on"] +'</td><td>';
					if(element["expire"] == 1){
						content += '<span style="color:red" class="glyphicon glyphicon-ok"></span>';
						content += '</td><td><input type="date" ondblclick="enableEdit(\''+element["id"]+'\')" value="' + element["expiry_on"] +'" readonly class="expiry_date_class"></td></tr>';
					}else{
						content += '<span style="color:orange" class="glyphicon glyphicon-remove"></span>';
						content += '</td><td></td></tr>';
					}
				});
				$("#notes_tbody").html(content);
				enableDisablePaginationButtons();
				$("#disp_page_id").html("Page "+page+"/"+totalPages);
			},error:function(data){
				alert("Error : "+data.responseText);
			}
		});
	}
	
	function doPagination(action){
		if(action == "first"){
			page = 1;
			loadNotes();
		}else if(action == "last"){
			page = totalPages;
			loadNotes();
		}else if(action == "plus"){
			if(page < totalPages){
				page += 1;
				loadNotes();
			}
		}else if(action == "minus"){
			if(page > 1){
				page -= 1;
				loadNotes();
			}
		}
		enableDisablePaginationButtons();
	}
	
	function enableDisablePaginationButtons(){
		if(totalPages == 1){
			$("#nav_btn_last").prop('disabled', true);
			$("#nav_btn_plus").prop('disabled', true);
			$("#nav_btn_minus").prop('disabled', true);
			$("#nav_btn_first").prop('disabled', true);
		}else if(page < totalPages && totalPages > 1 && page != 1){
			$("#nav_btn_last").prop('disabled', false);
			$("#nav_btn_plus").prop('disabled', false);
			$("#nav_btn_minus").prop('disabled', false);
			$("#nav_btn_first").prop('disabled', false);
		}else if(page >= totalPages && totalPages > 1){
			$("#nav_btn_last").prop('disabled', true);
			$("#nav_btn_plus").prop('disabled', true);
			$("#nav_btn_minus").prop('disabled', false);
			$("#nav_btn_first").prop('disabled', false);
		}else if(page == 1 && totalPages > 1){
			$("#nav_btn_minus").prop('disabled', true);
			$("#nav_btn_first").prop('disabled', true);
			$("#nav_btn_last").prop('disabled', false);
			$("#nav_btn_plus").prop('disabled', false);
		}
	}
	
	function doSearch(){
		page = 1;
		loadNotes();
	}
	
	function loadAssociatedPeople(id){
		$.ajax({
			url:"<?php echo base_url("Home/GetAssociatedPeopleOnNote") ?>",
			type:"POST",
			data:{ "id":id },
			success:function(data){
				alert(data);
			},error:function(data){
				alert("Error : "+data.responseText);
			}
		});
	}
	
	
	function enableEdit(id){
		alert(id);
	}
</script>

<style>
.expiry_date_class[readonly] {
	background-color: transparent;
	border:0px;
}
</style>


</html>
