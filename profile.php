<?php
include 'check.php'; 
$ud = $madmin->adminuser($uid);
$msg = "";
if(isset($_POST['addu'])){

$sec = $_POST['sec'];
	$np = $_POST['pass'];
	//$id  = $_SESSION['userid'];
	//$id  = 3;
	
	$pin = $madmin->PinC($uid, $sec);
	$a = $pin['seccode'];
	echo '<script>console.log('.$a.');</script>';
	if($sec == $a){
		$pn = md5($np);
		$p2 = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ", 19)), 0, 19);
		$salt = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz$/ABCDEFGHIJKLMNOPQRSTUVWZYZ", 10)), 0, 10);
		$hash = crypt($pn, $salt);
		$p = $hash.$p2;
		
			$cpp = $madmin->ChangP($uid, $p);
		if($cpp){
			
			$msg = "Password Changed Successfully";
		}else{
			$msg = "Password change Failed";
			
		}
		
	}else{
		$msg = "Invalid Security Code";
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'hcss.php';  ?>
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
                        <small>Profile</small>
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
                                    <div class="row" style="padding: 10px;">
                                						
				<div>
				<h2>My Profile</h2>
				<div class="form-control">Name: <?php echo $ud['fname'];  ?></div>
				<div class="form-control">Username :  <?php echo $ud['enteru'] ; ?></div>
				<div class="form-control">Email:  <?php echo $ud['email'] ; ?></div>
				<div class="form-control">Role: <?php if($ud['sec_level']==  1009){
					echo 'Admin';
				}else{
					echo 'User';
				}  ?> </div>
				<div></div>
				<div><button class="btn btn-success" id="cpp">Change Password</button></div>
				<div><button class="btn btn-primary" id="csc">Change Sec Code</button></div>
				<div class="alert alert-info" id="err" style="display: none;"></div>
				<div id="cp" style="display:none;">
				<h3>Change Password</h3>
				<div class="form-group">
				<label>Sec Code</label><input type="password" id="sc" maxlenght="4" class="form-control">
				
				</div>
				<div>
				<label>New Password</label><input type="password" id="pss"  class="form-control">
				</div>
				<div><button class="btn btn-danger" id="cnp">Change</button></div>
				</div>
				<div id="cp1" style="display:none;">
				<h3>Change SECURITY CODE</h3>
				<div class="form-group">
				<label>OLD SEC CODE</label><input type="password" id="osc" maxlenght="4" class="form-control">
				
				</div>
				<div>
				<label>NEW SEC CODE</label><input type="password" id="nsc"  class="form-control">
				</div>
				<div><button class="btn btn-danger" id="cpnn">Change</button></div>
				</div>
				</div>
						
										</div>
					<?php //include 'pagination_footer.php'; ?>
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
			$("#cpp").click(function (){
		
		$("#cp").show();
		
	});
	$("#csc").click(function (){
		
		$("#cp1").toggle();
		$("#cp").hide();
		
	});
				$("#cnp").click(function () {

var pc = $("#sc").val();
var ps = $("#pss").val();

console.log(pc);
var dataString = 'cp='+ pc+'&ps='+ps ;
 $.ajax({
type: "POST",
url: 'cp.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#err").show().html(html);	
$("#err").fadeOut(5000);	
$("#sc").val('');
$("#pss").val('');
//$("#cont"+ID).fadeOut("slow");
}
});

});

$("#cpnn").click(function(){
	var op = $("#osc").val();
	var np = $("#nsc").val();
var dataString = 'op='+op+'&np='+np;
 $.ajax({
type: "POST",
url: 'cpin.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(html)
{
$("#err").show().html(html);	
$("#err").fadeOut(15000);	
$("#osc").val('');
$("#nsc").val('');
//$("#cont"+ID).fadeOut("slow");
}
});	
	
});
		
			
			


			
		});
		
		
		</script>

        

    </body>
</html>
