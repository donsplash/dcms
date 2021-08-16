<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);

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
  <p><button id="addnew" class="btn btn-primary btn-sm">Add Link</button> <button id="addnewsl" class="btn btn-primary btn-sm">Add Sub Link</button></p>
				</div>
					<div id="addf">
					<p></p>
					<p><button id="addsub" class="btn btn-primary btn-sm">Add Sub Link</button> <a href="vlink.php" class="btn btn-danger btn-sm">View Links</a> <a href="sblink.php" class="btn btn-info btn-sm">View Sub Links</a></p>
                        <h3 class="page-header">Create New Link!</h3>
						<div id="form">
                                        <div class="form-group">
                                            <input type="hidden" name="addu" value="addu">
											
											<input type="text" size="50" maxlength="250"  name="link" id="link" placeholder="Link" class="form-control">
                                        </div><div class="form-group">
											<input type="text" size="50" maxlength="250"  name="cid" id="cid" placeholder="Content ID" class="form-control"></div><div class="form-group">
											<input type="text" size="50" maxlength="250"  name="altt" id="altt" placeholder="Alt" class="form-control">
																															
											</div>
											<div class="form-group">
                                            <label>SubLink ?</label>
                                            <select class="form-control" name="slink" id="slink">
                                               
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                                                                
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>External Link ?</label>
                                            <select class="form-control" name="ext" id="ext">
                                               
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                                                                
                                            </select>
                                        </div>
										<input type="text" size="50" maxlength="250"  name="extl" id="extl" placeholder="External Link"><br><br>
										<br>
										<div class="form-group">
											
											
                                        <button  class="btn btn-primary" id="addlink">Add LINK</button>
										</div>
											</div> 
						</div>
						
									<div id="addsl" style="display: none;">
									<p></p>
									<p><button id="addlinks" class="btn btn-primary btn-sm">Add Link</button> <a href="vlink.php" class="btn btn-danger btn-sm">View Links</a> <a href="sblink.php" class="btn btn-info btn-sm">View Sub Links</a></p>
                        <h4 class="page-header">Create New Sub Link!</h4>
						<div id="form">
                                        <div class="form-group">
                                            <input type="hidden" name="subl" value="subl" id="subl">
										
											<input type="text" size="50" maxlength="250"  name="sl" id="sl" placeholder="Sub Link" class="form-control"></div><div class="form-group">
											<input type="text" size="10" maxlength="10"  name="scid" id="scid" placeholder="Content ID" class="form-control"></div><div class="form-group">
											<input type="text" size="10" maxlength="10"  name="saltt" id="saltt" placeholder="Link ID" class="form-control"></div>
											<div class="form-group">
                                            <label>External Link ?</label>
                                            <select class="form-control" name="exts" id="exts">
                                               
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                                                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
										<input type="text" size="50" maxlength="250"  name="extls" id="extls" placeholder="External Link" class="form-control"><br><br>
										<br>
											</div>																				
											</div>
											<br>
										<div class="form-group">
											
											
                                        <button  class="btn btn-primary" id="subadd">Add Sub LINK</button>
										</div>
											</div> 
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
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
       
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
		
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
var dataString = 'l='+link+'&c='+cid+'&a='+altt+'&s='+sb+'&ext='+ext+'&extl='+extl;

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
$("#addnewsl").click(function(){
    $("#sl").val('');
    $("#scid").val('');
    $("#saltt").val('');
    $("#ssubl").val('');
    $("#sext").val('');
    $("#sextl").val('');
    
    $("#suc").hide();
    $("#addf").hide();
    $("#addsl").show();
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
//$("#suc").html(data);
$("#suc").show();
$("#addsl").hide();

		
	}	
	}
});	

});

			
		});
		
		
		</script>

        

    </body>
</html>
