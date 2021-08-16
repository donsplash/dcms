<?php
include 'check.php';
$ud = $madmin->Admin_Details($uid);
$search = '';
if($_POST['search']){
$search = $_POST['search'];
}

include_once 'pagination_header.php';

$contents=$madmin->mysorders($start,$per_page, $search);
$count = $madmin->os_count($search);
//$count = $Users_Count;
$no_of_paginations = ceil($count / $per_page);


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
                 <h3 class="box-title">Manage Users</h3><form action="user.php" method="post"><input type="text" id="usearch" name="usearch" class="form-control" placeholder="Enter User ID you want to search For">
					
		  <button class="btn-primary btn">Search</button></form>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
						                             
							   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Orderid</th>
                                            <th>Name</th>
                                            <th>Product</th>
                                            <th>Qty (USD)</th>
                                            <th>Price(NGN)</th>
                                            <th>Bank</th>
                                            <th>Account/ No</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                            </tr>
									
                                    </thead>
                                    <tbody>
									<?php
										foreach($contents as $data)
										{
										?>	
									<tr id="cont<?php echo $data['soid']; ?>">
                                     <td>WDX-S<?php echo $data['soid']; ?></td>
                                    <td><?php 
                                    $n = $data['ouid']; 
                                   $un = $madmin->idtoU($n);
                                   echo $un;
                                    ?>
                                   </td>
                                    <td><?php 
                                    $p =$data['pid']; 
                                      $p = $data['pid'];
                                    echo $madmin->idprod($p);
                                     ?></td>
                                    <td>$<?php echo $data['pr']; ?></td>
									<td>₦<?php echo number_format($data['amt']); ?></td>
									<td><?php echo $data['bname']; ?></td>
									<td><?php echo $data['acc']; ?></td>
									<td><?php $st = $data['st'];
                                    $uss = $madmin->Suser($n);
									if($st ==  1){ ?>
                                        <a style="color: #fff;" data-toggle="modal" data-email="<?php echo $uss['email']; ?>"  data-nm="<?php echo $uss['username']; ?>" href="#myModal" class="btn btn-primary btn-xs">Notify</a>
									<?php echo '<span class="label label-primary">Processing</span>';
									}else { echo '<span class="label label-success">Completed</span>';}
										?></td>
									<td><?php if ($userlevel == "1009") { 
                                        if($st == 1){
									echo '<span  class="btn btn-danger btn-xs deo" id="'.$data['soid'].'">Complete</span>'; }
                                }
									?>
									</td>
									<?php } ?>
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
                        <!-- Left col --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Payment Notification</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                            <label for="subject" class="control-label">to:</label>
                           <input type="text" class="form-control" name="em"  id="em" >
                       </div><div class="form-group">
                        <label>Subject</label>
                            <input type="text" class="form-control" id="sub" value="Sell Payment Details">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea name="mes" id="mes" class="form-control" ></textarea>
                        </div>

    
          <div class="alert alert-success" id="rsv"  style="display: none;">
          <h3>Notification Sent</h3>
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success" id="notiall">Send</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
                      
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php include 'bjs.php';  ?>
		
        <script>
		$(document).ready(function (){
			
			$("#notiall").click(function()
		{
        var em = $("#em").val();
		var mes = $("#mes").val();
		
		
		var dataString = 'em='+ em+'&mes='+mes ;
		console.log(dataString);
		var r = confirm("Want to Match user ??");
		if(r==true)
		{
		$.ajax({
		type: "POST",
		url: "selnoti.php",
		data: dataString,
		cache: false,
		success: function(html){
			console.log(html);
		if(html =="ok"){
		alert("Notification Sucessfully Sent");
		$("#rsv").show();
		}else{
			alert("Error");
		}
		
		}
		});
		} 
		return false;
		});
			
			
$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Complete?");
var ID=$(this).attr("id");
var dataString = 'sord='+ ID ;
if(choice == true) { 
 $.ajax({
type: "POST",
url: 'delc.php',
data: dataString,
cache: false,
beforeSend: function(){$("#cont"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html)
{
    window.location = 'vorder.php';
	console.log(ID);

}
});
}
});

 $("#myModal").on('show.bs.modal', function(event){
        
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var email = button.data('email');
        var user = button.data('nm');
        //var titleData = button.data('title');
        //$(this).find('.number').text(titleData);
        $(this).find('#em').val(email);
        $(this).find('#accn').html(user);
        

    });
			
		});
		
		
		</script>

        

    </body>
</html>
