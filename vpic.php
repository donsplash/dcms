<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);

$search = '';
if($_POST['search']){
$search = $_POST['search'];
}


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

$contents=$madmin->hmpic();
$count = $madmin->content_count($search);
//$count = $Users_Count;
$no_of_paginations = ceil($count / $per_page);
$user=1;

if (isset($_POST['delc'])){
$delc = $_POST['delc'];

$condel=$madmin->delc($delc);
$message = "Content Deleted";
}
$user = $_SESSION['md_id'];
$us = $madmin->adminuser($user);

$userlevel = $us['sec_level'];
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
                 <h3 class="box-title">Manage Home Page Pic</h3> <a href="hpic.php" class="btn btn-sm btn-success">Add Home Pic</a>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
						                             
							   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>pic id</th>
                                            <th>Title</th>
                                            <th>Title 2</th>
                                            <th>Title 3</th>
                                            <th>Preview</th>
                                            <th>Link</th>
                                            <th>Action</th>
                                            
                                            </tr>
									
                                    </thead>
                                    <tbody>
									<?php

										foreach($contents as $data)
										{
										?>	
									<tr id="cont<?php echo $data['id']; ?>">
									<td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['t2']; ?></td>
									<td><?php echo $data['t3']; ?></td>
									<td><img src="../images/<?php echo $data['pics']; ?>" style="width: 400px;"></td>
									<td><?php echo $data['link']; ?></td>								
									<td><a href="ehpic.php?id=<?php echo $data['id']; ?>" class="btn btn-xs btn-warning">Edit</a> <?php if ($userlevel == "1009") { 
						echo '<span  class="btn btn-danger btn-xs deo" id="'.$data['id'].'" rel="'.$data['pics'].'">Delete</span>'; }
									?> 
									</td></tr>
									<?php } ?>
                                    <tr> <?php if($contents ==""){
                                        echo "No Home Pic Avaialble";
                                    }?></tr>
									</tbody>
									</table>
									
									</div>
					<?php include 'pagination_footer.php'; ?>
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
			
						
			
$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Delete Photo?");
var ID=$(this).attr("id");
var pc=$(this).attr("rel");
var dataString = 'pid='+ID+'&pc='+pc ;
console.log(pc);
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
	console.log(html);
if(html=="ok"){
$("#cont"+ID).fadeOut("slow");
}
}
});
}
});

			
		});
		
		
		</script>

        

    </body>
</html>
