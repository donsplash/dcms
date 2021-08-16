<?php
include 'check.php';
$ud = $madmin->Admin_Details($uid);

$ct = $madmin->vwid();
$userlevel = $ud['sec_level'];
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
            <?php    include 'lg.php';  ?>
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
                 <h3 class="box-title">Manage WIDGET</h3><a href="addw.php" class="btn btn-info">Add New Widget</a>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                                     
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Widget ID</th>
                                            <th>Title</th>
                                             <th>Action</th>                                           
                                            </tr>
                                    
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($ct as $data)
                                        {
                                        ?>  
                                    <tr id="cont<?php echo $data['wid']; ?>">
                                    <td><?php echo $data['wid']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    
                                                                    
                                    <td><?php 
                                    echo '<a href="edw.php?id='.$data['wid'].'"  class="btn btn-info btn-xs">Edit</a> ';
                                    if ($userlevel == "1009") { 
                                    echo '<span  class="btn btn-danger btn-xs deo" id="'.$data['wid'].'">Delete</span>'; }
                                    ?>
                                    </td>
                                    <?php } ?>
                                    </tbody>
                                    </table>
                                    
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
       <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
		
		
        <script>
		$(document).ready(function (){
			
			$(".block").click(function()
		{
		var ID = $(this).attr("rel");
		var sen = $(this).attr("data");
		
		
		var dataString = 'id='+ ID+'&sen='+sen ;
		console.log(dataString);
		var r = confirm("Want to Match user ??");
		if(r==true)
		{
		$.ajax({
		type: "POST",
		url: "pajaxn.php",
		data: dataString,
		cache: false,
		beforeSend: function(){$("#st"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
		success: function(html){
			console.log(html);
		if(html =="ok"){
		alert("User Sucessfully Matched");
		$("#st"+ID).fadeOut(300);
		}else{
			alert("No User To Match With");
		}
		
		}
		});
		} 
		return false;
		});
			
			
			$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Delete?");
var ID=$(this).attr("id");
var dataString = 'wid='+ ID ;
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
