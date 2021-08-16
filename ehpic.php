<?php
$idd = $_GET['id'];
include 'check.php';

$ud = $madmin->Admin_Details($uid);
$hp = $madmin->allHp($idd);

if($_POST['hp']){
  $tit = $_POST['title'];
  $t2 = $_POST['title2'];
  $lnk = $_POST['link'];
  $bt = $_POST['bt'];
  $t3 = $_POST['t3'];
	$id = $_POST['id'];

	$sql = "UPDATE homepic SET title='$tit', t2='$t2', t3='$t3', link='$lnk', btn='$bt' WHERE id='$id' ";
	$query = mysqli_query($db, $sql);
	header("location: vpic.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'hcss.php';  ?>
		<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/jquery.js"></script>

<script>
 $(document).ready(function () {
//$('#picid').submit( function(e)
$('#picid').submit( function(e)
{
$('#loading').show();
e.preventDefault();
//var image = $('#image').val();
$.ajax({
url: "ajaxupload.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$('#mis').show();
//$("#message").html(data);
$("#mypic").attr('src', '../assets/img/'+data);
$("#mn").val(data);
}
});


});





});

</script>
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
                                <h3 class="box-title">Edit Home Page Scrolling Pic</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <span style="color: red; font-weight: bold;"><?php  echo $mes;   ?></span>
									      <div class="row">
										  <div class="col-lg-6">
                                    <form enctype="multipart/form-data" action="ehpic.php" method="POST">
                                        <div class="form-group">
                                        <label>Title</label>
                                            <input type="hidden" name="hp" value="1">
                                            <input type="hidden" name="id" value="<?php echo $hp['id'];   ?>">
                                            <input type="hidden" name="addme" value="changepic">
											
											<input class="form-control" type="text"   name="title" id="title" placeholder="Title" value="<?php echo $hp['title'];   ?>" required><br>
											</div>
                      <div class="form-group">
                      <label>Title 2</label>
                      <input class="form-control" type="text"   name="title2" id="title2" value="<?php echo $hp['t2'];   ?>" placeholder="Sub Title * Optional" required><br>
                      </div>
                      <div class="form-group">
                      <label>Title 3</label>
                      <input class="form-control" type="text"   name="t3" id="t3" value="<?php echo $hp['t3'];   ?>" placeholder="Sub Title 3 * Optional" ><br>
                      </div>
                      <div class="form-group">
                      Button Text
                      <input class="form-control" type="text"   name="bt" id="bt" value="<?php echo $hp['btn'];   ?>" placeholder="Button Text" ><br>
                      </div>
                      <div class="form-group">
                      <label>Link</label>
                      <input class="form-control" type="text"   name="link" id="link" value="<?php echo $hp['link'];   ?>" placeholder="Link if Any" ><br>
                      </div>
											
										<div class="form-group">
																		
                                        <button type="submit" class="btn btn-primary">Edit Details</button>
										</div>
										
										</form>
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
var dataString = 'cid='+ ID ;
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
