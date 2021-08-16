<?php
include 'check.php';
include 'ad.php';

$us1 = $ud['sec_level'];
if ($us1 != 1009) {
header("location: access.php");
exit();
}

if(isset($_POST['addu'])){
if($_POST['email'] =="" || $_POST['fname'] =="" || $_POST['uname']  ==""){
	echo '<script>alert("Please Fill All required Fields");</script>';
}else{

$u = $_POST['uname'];
$em = $_POST['email'];
$fn = $_POST['fname'];
$p = $_POST['password'];
$pn = md5($p);
		$p2 = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ", 19)), 0, 19);
		$salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz$/ABCDEFGHIJKLMNOPQRSTUVWZYZ", 10)), 0, 10);
		$hash = crypt($pn, $salt);
		$p = $hash.$p2;

$sec = $_POST['sec'];
$s = 1111;
$addu = $madmin->addu($fn, $u, $p, $sec, $s, $em);
if($addu){
header("Location : adminu.php");
}
}
}
$adm = $madmin->vadmin();
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
                        <small>Home Page Pics</small>
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
                            <div class="box" style="padding: 15px;">
                                <div class="box-header">
                 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                <h1 class="page-header">Create New User!</h1>
						<form action="adminu.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="addu" value="addu">
											
											<input type="text" size="50" maxlength="250"  name="fname" id="fname" placeholder="Full Name"><br><br>
											<input type="text" size="50" maxlength="250"  name="email" id="email" placeholder="Email"><br><br>
											<input type="text" size="50" maxlength="250"  name="uname" id="uname" placeholder="Username"><br><br>
											<input type="text" size="50" maxlength="250"  name="password" id="password" placeholder="Password"><br>
																				
											</div>
											<div class="form-group">
                                            <label>Select User TYPE <font color="red"> E.g  <i>Admin or User  Note Admin Has all privileges.</i></font></label>
                                            <select class="form-control" name="sec" id="sec">
                                                
                                                <option value="1000">User</option>
                                                <option value="1005">Editor</option>
                                                <option value="1009">Admin</option>
                                                                                                
                                            </select>
                                        </div><br>
										<div class="form-group">
											
											
                                        <button type="submit" class="btn btn-primary">Add USER</button>
										</div>
											</form>
						<table class="table table-striped table-bordered table-hover" id="dt">
						<thead>
						<tr>
						<th>ID</th>
						<th>Username</th>
						<th>User Type</th>
						<th>Action</th>
						</tr>
						</thead>
						<?php  
						foreach ($adm as $data)
						{
						?>
						<tr id="us<?php echo $data['md_id'];  ?>">
						<td><?php echo $data['md_id'];  ?></td>
						<td><?php echo $data['enteru'];  ?></td>
						<td><?php $l = $data['sec_level'];
							if($l == 1009) {
							echo "Admin";
							}else if($l == 1005){
								echo "Editor";
							} else {
							echo "User";} ?></td>
			<td>
                <button class="btn btn-danger btn-xs del" id="<?php echo $data['md_id'];  ?>">Delete</button>
                <?php  if($data['st'] == 10){
                    ?>
             <button class="btn btn-info btn-xs dact" id="<?php echo $data['md_id'];  ?>">Disable</button>       
                    <?php
                } else{

                    ?>
             <button class="btn btn-warning btn-xs act" id="<?php echo $data['md_id'];  ?>">Enable</button>       
                    <?php
                }

                   ?>
                

                
            </td>
						</tr>
						<?php 
						}
						?>
						<tbody>
						
						</tbody>
						</table>
										</div>
					<?php //include 'pagination_footer.php'; ?>
                                </div><!-- /.box-body -->
								
      </div><!-- /.box -->
                </section><!-- /.content -->
        <!-- /.right-side -->
        </div>
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                      
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
        <!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


       <?php include 'bjs.php';  ?>
		
        <script>
		$(document).ready(function (){
			
			
		$(".del").click(function () {

		var choice = confirm("Are you sure You Want to Delete?");
		var ID=$(this).attr("id");
		var dataString = 'auid='+ ID ;
		if(choice == true) { 
		 $.ajax({
		type: "POST",
		url: 'delc.php',
		data: dataString,
		cache: false,
		beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
		success: function(html)
		{
			console.log(html);
		$("#us"+ID).fadeOut("slow");
		}
		});
		}
		});

$(".act").click(function () {

        var choice = confirm("Are you sure You Want to Enable Account?");
        var ID=$(this).attr("id");
        var dataString = 'aduid='+ ID ;
        if(choice == true) { 
         $.ajax({
        type: "POST",
        url: 'delc.php',
        data: dataString,
        cache: false,
        beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
        success: function(html)
        {
       alert("Enabled");
       window.location.href="adminu.php"
        }
        });
        }
        });
$(".dact").click(function () {

        var choice = confirm("Are you sure You Want to Disable Account?");
        var ID=$(this).attr("id");
        var dataString = 'daduid='+ ID ;
        if(choice == true) { 
         $.ajax({
        type: "POST",
        url: 'delc.php',
        data: dataString,
        cache: false,
        beforeSend: function(){$("#us"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
        success: function(html)
        {
       alert("Disabled");
       window.location.href="adminu.php"
        }
        });
        }
        });			
		});
		
		
		</script>

        

    </body>
</html>
