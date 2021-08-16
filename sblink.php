<?php
include 'check.php';
$ud = $madmin->adminuser($uid);

if($_GET['page'])
{
$page=$_GET['page'];
}
else
{
$page=1;
}

$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;


$contents1=$madmin->sblink($start,$per_page);
$count = $madmin->slcount();
//$count = $Users_Count;
$no_of_paginations = ceil($count / $per_page);


if (isset($_POST['delc'])){
$delc = $_POST['delc'];

$condel=$madmin->delc($delc);
$message = "Content Deleted";
}

$userlevel = $ud['sec_level'];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'hcss.php';  ?>
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
                 <h3 class="box-title">Manage Sublinks</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								<div id="link"  style="display: block;">
                                    <div class="table-responsive">
						          <p><a href="addlink.php" class="btn btn-warning btn-sm">Add Links</a> <a href="vlink.php" class="btn btn-danger btn-sm">View Links</a> <a href="sblink.php" class="btn btn-info btn-sm">View Sub Links</a></p>                     
							   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SubLink id</th>
                                            <th>Link</th>
                                            <th>Link ID</th>
                                            <th>External Link</th>
                                            <th>Content ID</th>
											<th>Status</th>
                                            <th>Action</th>
                                            
                                            </tr>
									
                                    </thead>
                                    <tbody>
									<?php
										foreach($contents1 as $datas)
										{
										?>	
									<tr id="cont<?php echo $datas['sublink_id']; ?>"><td><?php echo $datas['sublink_id']; ?></td>
									<td><?php echo $datas['link']; ?></td>
									<td><?php echo $datas['link_idkf']; ?></td>
									
									<td><?php $ex = $datas['ext'];
										if($ex ==  1){ 
									echo '<span class="label label-primary">Yes</span>';
									}else { echo '<span class="label label-danger">No</span>';}
									?></td>
									<td><?php echo $datas['content_id']; ?></td>
									<td><?php $st = $datas['status'];
									if($st ==  1){ 
									echo '<span class="label label-primary">Active</span>';
									}else { echo '<span class="label label-danger">Disabled</span>';}
										?></td>
									<td><?php echo '<a href="edslink.php?id='.$datas['sublink_id'].'" class="btn btn-success btn-xs">Edit</a>';?><?php if ($userlevel == "1009") { 
									echo '<span  class="btn btn-danger btn-xs deo" id="'.$datas['sublink_id'].'">Delete</span>'; }
									?>
									</td>
									<?php } ?>
									</tbody>
									</table>
							  
									
									</div>
									</div>
					<?php include 'pagination_footer.php'; ?>
					<div id="sblink"  style="display: none;">
					
					
					<div class="table-responsive">
						     
									
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
			
	$("#sbl").click(function(){
		
		$("#sblink").show();
		$("#link").hide();
		console.log("done");
	});	
	$("#sbls").click(function() {
		$("#link").show();
		
	});
			
$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Delete?");
var ID=$(this).attr("id");
var dataString = 'slid='+ ID ;
if(choice == true) { 
 $.ajax({
type: "POST",
url: 'delc.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
	console.log(ID);
$("#cont"+ID).fadeOut("slow");
}
});
}
});

			
		});
		
		
		</script>

        

    </body>
</html>
