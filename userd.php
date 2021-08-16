<?php
include 'check.php';
include 'ad.php';
include_once 'pagination_header.php';
if($_GET['uid']){
$id = $_GET['uid'];
}
include 'pagi.php';

$Userd=$madmin->Suser($id);
//$user=1;
//$ud = $madmin->Admin_Details(1);
$userlevel = $ud['sec_level'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'hcss.php'; ?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
           <?php  include 'lg.php';   ?>
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
                 <h3 class="box-title">User Detail</h3><a href="javascript:history.back()" class="btn btn-primary">Go BACK</a>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Title</th>
											<th>Detail</th>
											
                                        </tr>
										<tr><td>Name:</td><td><?php  echo $Userd['name'];    ?></td></tr>
										<tr><td>Reg No:</td><td><?php  echo $Userd['regn'];    ?></td></tr>
										<tr><td>Gender:</td><td><?php  echo $Userd['gender'];    ?></td></tr>
										<tr><td>Company:</td><td><?php  echo $Userd['desg'];    ?></td></tr>
										<tr><td>About:</td><td><?php  echo $Userd['about'];    ?></td></tr>
										
										<tr><td>Email:</td><td><?php  echo $Userd['email'];    ?></td></tr>
										<tr><td>Mobile:</td><td><?php  echo $Userd['mobile'];    ?></td></tr>
										
																		



                                    </table>
									<a href="javascript:history.back()" class="btn btn-primary">Go BACK</a>
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
       
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
  <script>
		$(document).ready(function (){
			
			$(".block").click(function()
		{
		var ID = $(this).attr("rel");
			
		var dataString = 'bid='+ ID;
		console.log(dataString);
		var r = confirm("Want to Block User ??");
		if(r==true)
		{
		$.ajax({
		type: "POST",
		url: "delc.php",
		data: dataString,
		cache: false,
		beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
		success: function(html){
			console.log(html);
		if(html =="ok"){
		alert("User Sucessfully Blocked");
		$("#bl"+ID).hide("slow");
		$("#ac"+ID).show("slow");
		}else{
			alert("Could not Block User");
		}
		
		}
		});
		} 
		return false;
		});
		
		$(".activate").click(function()
		{
		var ID = $(this).attr("rel");
			
		var dataString = 'aid='+ ID;
		console.log(dataString);
		var r = confirm("Want to Activate User ??");
		if(r==true)
		{
		$.ajax({
		type: "POST",
		url: "delc.php",
		data: dataString,
		cache: false,
		beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
		success: function(html){
			console.log(html);
		if(html =="ok"){
		alert("User Sucessfully Activated");
		$("#ac"+ID).hide("slow");
		$("#bl"+ID).show("slow");
		}else{
			alert("Could not Activate User");
		}
		
		}
		});
		} 
		return false;
		});
		
		$(".very").click(function()
		{
		var ID = $(this).attr("rel");
			
		var dataString = 'vid='+ ID;
		console.log(dataString);
		var r = confirm("Want to Verify User ??");
		if(r==true)
		{
		$.ajax({
		type: "POST",
		url: "delc.php",
		data: dataString,
		cache: false,
		beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
		success: function(html){
			console.log(html);
		if(html =="ok"){
		alert("User Sucessfully Verified");
		$("#d"+ID).hide("slow");
		$("#vu"+ID).show("slow");
		}else{
			alert("Could not Verify User");
		}
		
		}
		});
		} 
		return false;
		});
			
			
$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Delete?");
var ID=$(this).attr("id");
var dataString = 'uid='+ ID ;
if(choice == true) { 
 $.ajax({
type: "POST",
url: 'delc.php',
data: dataString,
cache: false,
beforeSend: function(){$("#users"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html)
{
	console.log(ID);
$("#users"+ID).fadeOut("slow");
}
});
}
});

			
		});
		
		
		</script>
        

    </body>
</html>
