<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);
if($_GET['id']){
$id = $_GET['id'];	
	
}
$ln = $madmin->sbinlink($id);

if($_POST){
	
	$ids = $_POST['ids'];
	$link = $_POST['link'];
	$cid = $_POST['cid'];
	$ext = $_POST['ext'];
    $exts = $_POST['exts'];
	$ul= $madmin->uslink($ids, $link, $cid, $ext, $exts);
	
	if($ul){
		echo '<script>window.location ="sblink.php";</script>';
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
       <?php include 'hcss.php';  ?>
		<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/jquery.js"></script>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <?php  include 'lg.php'; ?>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <?php  include 'um.php' ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php  echo $ud['fname'];   ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less Menu-->
                <?php     include 'menu.php';  ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									      <div class="row">
                                <div class="col-lg-6">
								<div class="col-lg-12">
					 
					<div class="alert alert-success" style="display: none; margin-top: 20px;" id="suc">
  <strong>Success!</strong> Link Added Succesfully.
  <p><button id="addnew" class="btn btn-primary">Add Another Link</button></p>
				</div>
					<div id="addf">
					<p></p>
					
                        <h3 class="page-header">EDIT SUB Link!</h3>
						<form action="edslink.php" method="POST">
						<div id="form">
                                        <div class="form-group">
                                            <input type="hidden" name="addu" value="addu">
                                            <input type="hidden" name="ids" value="<?php echo $ln['sublink_id']; ?>">
											<label>Link</label>
											<input type="text" size="50" maxlength="250"  name="link" id="link" placeholder="Link" value="<?php echo $ln['link']; ?>"><br><br>
											<label>Content ID</label>
											<input type="text" size="50" maxlength="250"  name="cid" id="cid" placeholder="Content ID" value="<?php echo $ln['content_id']; ?>"><br><br>
																																										
											</div>
											<label>Enternal Link</label>
										<input type="text" size="50" maxlength="250"  name="ext" id="ext" placeholder="External Link" value="<?php echo $ln['extlink']; ?>"><br><br>
										<br>
                                        
										<div class="form-group">
										<label>External Link ?</label>
                                            <select class="form-control" name="exts" id="exts">
                                               <option value="<?php echo $ln['ext']; ?>"><?php
													if($ln['ext'] == 1){
														echo "YES";
												}else{
														echo "No";
													}
											   ?></option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                                                                
                                            </select>	
											
											
                                        <button  class="btn btn-primary" >Edit Sub LINK</button>
										</div>
											</div> 
						</div>
						</form>
									<div id="addsl" style="display: none;">
									<p></p>
									<p><button id="addlinks" class="btn btn-primary">Add Link</button></p>
                        <h4 class="page-header">Create New Sub Link!</h4>
						
						</div>
                    </div>
								
								
								
								
										</div>
										</div>
                                </div><!-- /.box-body -->
								
      </div><!-- /.box -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div>
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                      
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <?php include 'bjs.php';  ?>
		
        <script>
		$(document).ready(function (){
			
		$("#addlink").click(function(){
		
		//alert("done");
	var link = $("#link").val();
	var cid =  $("#cid").val();
	var  altt = $("#altt").val();
	var  sb = $("#slink").val();
	var  ext = $("#ext").val();
	var  extl = $("#extl").val();
	//var lb = $("#addu").val();
var dataString = 'l='+link+'&c='+cid+'&a='+altt+'&ext='+ext;

if(link =="" || cid =="" ){
	
	return false;
}
	$.ajax({
type: "POST",
url : 'addl.php',
data: dataString,
cache: false,
success: function(data){
if(data)
{
$("#addf").hide();
//$("#suc").html(html);
$("#suc").show();
}
}
});
//alert(dataString);
		
		
});
	
$("#addnew").click(function(){
	$("#link").val('');
	$("#cid").val('');
	$("#altt").val('');
	$("#slink").val('');
	$("#ext").val('');
	$("#extl").val('');
	
	$("#suc").hide();
	$("#addf").show();
});

$("#addsub").click(function(){
		
	$("#suc").hide();
	$("#addf").hide();
	$("#addsl").show();
	
	
});
$("#addlinks").click(function(){
	$("#suc").hide();
	$("#addsl").hide();
	$("#addf").show();
		
});
$("#subadd").click(function(){
	
	var sl = $("#sl").val();
	var scid =  $("#scid").val();
	var  saltt = $("#saltt").val();
	var sb  = $("#subl").val();
	var  exts = $("#exts").val();
	var  extls = $("#extls").val();
	var dataString = 'ci='+scid+'&sl='+sl+'&sa='+saltt+'&subl='+sb+'&ext='+exts+'&extl='+extls;
	if(scid =="" || sb == "" ){
		
		return false;
	}
$.ajax({
	type: 'POST',
	url:  'addl.php',
	data: dataString,
	cache: false,
	success: function(data){
	if(data){
$("#suc").html(data);
$("#addsl").hide();
$("#suc").show();	
		
	}	
	}
});	

});

			
		});
		
		
		</script>

        

    </body>
</html>
