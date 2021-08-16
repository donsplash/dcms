<?php
include 'check.php';
$ud = $madmin->Admin_Details($uid);

$search = '';
if($_POST['search']){
$search = $_POST['search'];
}
include_once 'pagination_header.php';

$contents=$madmin->myinvo($start,$per_page, $search);
$count = $madmin->i_count($search);
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
                                <div class="box-header" style="margin: 5px;">
                 <h3 class="box-title">Manage Invoice</h3> <form action="vprod.php" method="post"><input type="text" id="usearch" name="usearch" class="form-control" placeholder="Enter Invoice ID you want to search For">
					
		<button class="btn-primary btn">Search</button></form>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
						                             
							   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>InvoiceID</th>
                                            <th>Order No</th>
                                            <th>Name</th>
                                            <th>Price(NGN)</th>
                                           <th>Status</th>
                                            <th>Action</th>
                                            
                                            </tr>
									
                                    </thead>
                                    <tbody>
									<?php
										foreach($contents as $data)
										{
										?>	
									<tr id="pr<?php echo $data['invoice_id']; ?>">
                                    <td><?php echo $data['invoice_id']; ?><a href="vinvo.php?id=<?php echo $data['invoice_id']; ?>" target="_blank">View</a></td>
                                    <td><?php echo $data['odn']; ?></td>
									<td><?php
                                     $n = $data['ouid']; 
                                    echo $madmin->idtoU($n);
                                     ?></td>
									
									
                                    <td>₦<?php echo number_format($data['price']); ?></td>
                                    <td><?php 
                                    $st = $data['st'];
                                    if ($st == 3138) {
                                        echo '<span class="label label-success">PAID</span>';
                                    }else{
                                         echo '<span class="label label-warning">UNPAID</span>';
                                    }
                                    
                                     ?></td>
									
								<td><?php if ($userlevel == "1009") { 
								echo '<span  class="btn btn-danger btn-xs deo" id="'.$data['invoice_id'].'">Delete</span>';
                                ?>
                                <?php if($st != 3138){
                                    ?>
                                    
                                    <button type="button" class="btn btn-primary btn-xs mc" data-toggle="modal" data-target="#myModal" data-id="<?php echo $data['invoice_id']; ?>">Comaplete</button>

                                    <?php
                                } ?>
                                
                                <?php

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
                        <!-- Left col -->
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Complete Transaction</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
               Invoice ID <h4 id="mnn"></h4>
            </div>
            <input type="hidden" name="ids" id="ids" value="">
         <div class="form-group">
                            <label for="recipient-name" class="control-label">Payment Type:</label>
                              <select name="pt" id="pt" class="form-control">
                                  <option value="bank">Bank Transfer/ deposit</option>
                                  <option value="card">Debit Card</option>
                              </select>
                        </div>
                         <div class="form-group">
                            <label for="message-text" class="control-label">Transaction Reference:</label>
                            <input type="text" name="pr" id="pr" placeholder="Transaction Reference" class="form-control">                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Date:</label>
                            <input type="text" name="dt" id="dt" placeholder="Date" class="form-control">                        </div>
<div id="ad_image" class="picb"></div>
    <span class="up"></span>
    <div id="sa"></div>
    
          <div class="alert alert-success" id="rs"  style="display: none;">
          Successfully Completed the Trasanction
          </div>
        </div>
        <div class="modal-footer">
        
          <button type="button" class="btn btn-primary com" id="comp">Complete</button>
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
			
		$(".block").click(function()
        {
        var ID = $(this).attr("rel");
        var Ui = $(this).attr("data");
        var Bi = $(this).attr("datas");
            
        
        var dataString = 'com='+ ID+'&ui='+Ui+'&bi='+Bi;
        console.log(dataString);
        var r = confirm("Want to Complete Order ??");
        if(r==true)
        {
        $.ajax({
        type: "POST",
        url: "ocom.php",
        data: dataString,
        cache: false,
        beforeSend: function(){$("#pr"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
        success: function(html){
            console.log(html);
        if(html =="ok"){
        alert("Order  Sucessfully Completed");
        $("#bl"+ID).hide("slow");
        
        window.location = 'vorders.php';
        }else{
            alert("Could not Complete Order");
        }
        
        }
        });
        } 
        return false;
        });
        
        $(".com").click(function()
        {
        var PT = $("#pt").val();
        var PR = $("#pr").val();
        var DT = $("#dt").val();
        var ID = $("#ids").val();
            
        var dataString = 'ids='+ID+'&pt='+ PT+'&pr='+PR+'&dt='+DT;
        console.log(dataString);
        var r = confirm("Are You Sure Want to Complete this Order ??");
        if(r==true)
        {
        $.ajax({
        type: "POST",
        url: "proinv.php",
        data: dataString,
        cache: false,
        beforeSend: function(){$("#pr"+ID).animate({'backgroundColor':'green'},300);},
        success: function(html){
            console.log(html);
        if(html =="ok"){
        alert("Invoice Sucessfully Completed");
        $("#comp").hide("slow");
        $("#rs").show();
        window.location = 'vinv.php';
        }else{
            alert("Could not complete Invoice");

        }
        
        }
        });
        } 
        return false;
        });
			
			
$(".deo").click(function () {

var choice = confirm("Are you sure You Want to Delete?");
var ID=$(this).attr("id");
var dataString = 'vinv='+ ID ;
if(choice == true) { 
 $.ajax({
type: "POST",
url: 'delc.php',
data: dataString,
cache: false,
beforeSend: function(){$("#pr"+ID).animate({'backgroundColor':'#fb6c6c'},300);},
success: function(html)
{
	console.log(ID);
$("#pr"+ID).fadeOut("slow");
}
});
}
});
    $("#myModal").on('show.bs.modal', function(event){
        
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var ids = button.data('id');
        //var user = button.data('nm');
        //var titleData = button.data('title');
        //$(this).find('.number').text(titleData);
        $(this).find('#mnn').html(ids);
        $(this).find('#ids').val(ids);
        

    });
			
		});
		
		
		</script>

        

    </body>
</html>
