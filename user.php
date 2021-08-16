<?php
include 'check.php';
include 'ad.php';
include_once 'pagination_header.php';
if($_POST['usearch'] || $_POST['ssearch']){
$usearch = $_POST['usearch'];
$ssearch = $_POST['ssearch'];
}
include 'pagi.php';

$Users_Details_Array=$madmin->Users_Details($usearch,$ssearch,$start,$per_page);
$Users_Count=$madmin->Users_Count();
$count = $Users_Count;
$no_of_paginations = ceil($count / $per_page);
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
                 <h3 class="box-title">Manage Users</h3><form action="user.php" method="post"><input type="text" id="usearch" name="usearch" class="form-control" placeholder="Enter User ID you want to search For">
					
		  <button class="btn-primary btn">Search</button></form>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#ID</th>
                                            <th>Full Name</th>
											<th>Email</th>
																						
											<th>Mobile</th>
											
											<th>Reg Date</th>
											<th>Actions</th>

                                        </tr>
										<?php
										foreach($Users_Details_Array as $data)
										{

										?>
                                        <tr id="users<?php echo $data['uid']; ?>">
										 <td style="width: 10px">#<?php echo $data['uid']; ?></td>
                                            <td><a href="userd.php?uid=<?php echo $data['uid']; ?>"><?php echo $data['name']; ?></a></td>
											<td>
											<?php echo $data['email']; ?>

											</td>
																	
											                                            
											<td>
											<?php echo $data['mobile']; ?>
											</td>
											
											<td>
											<?php $t = $data['last_login']; echo date('d M Y h:i:s A', $t); ?>
											</td>
											<td>
											<?php if ($userlevel == "1009") { 
									echo '<span  class="btn btn-danger btn-xs deo" id="'.$data['uid'].'">Delete</span>';
													
									}
									?>&nbsp;&nbsp;&nbsp;
											<?php if($data['status']=='10') { ?>
											<a href="#" class="btn btn-info btn-xs activate" id="ac<?php echo $data['uid']; ?>" rel="<?php echo $data['uid']; ?>">Activate</a>
											<a href="#" style="display: none;"  class="btn btn-warning btn-xs block" id="bl<?php echo $data['uid']; ?>" rel="<?php echo $data['uid']; ?>">Block</a>
											<?php }else if($data['status']=='11'){  ?>
											<a href="#" class="btn btn-warning btn-xs block" id="bl<?php echo $data['uid']; ?>" rel="<?php echo $data['uid']; ?>">Block</a>
											<a href="#" style="display: none;" class="btn btn-info btn-xs activate" id="ac<?php echo $data['uid']; ?>" rel="<?php echo $data['uid']; ?>">Activate</a>
											
											<?php } ?>
											</td>

                                        </tr>
										<?php } ?>



                                    </table>
                                </div><!-- /.box-body -->
								<?php include 'pagination_footer.php'; ?>
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
         <?php include 'bjs.php'; ?>

        

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
