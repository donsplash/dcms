<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);
function resize($width, $height){

  /* Get original image x y*/
  list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
  /* calculate new image size with ratio */
  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  $rand = time();
  /* new file name */
  $imgn = $rand.'_'.$height.'_'.$_FILES['image']['name'];
  //$path = 'uploads/'.$rand.'_'.$height.'_'.$_FILES['image']['name'];
  $path = "../images/";
  /* read binary data from image file */
  $imgString = file_get_contents($_FILES['image']['tmp_name']);
  /* create image from string */
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,
    0, 0,
    $x, 0,
    $width, $height,
    $w, $h);
  /* Save image */
  switch ($_FILES['image']['type']) {
    case 'image/jpeg':
      imagejpeg($tmp, $path.$imgn, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path.$imgn, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path.$imgn);
      break;
    default:
      exit;
      break;
  }
  //return $path.$imgn;
  return $imgn;
  /* cleanup memory */
  imagedestroy($image);
  imagedestroy($tmp);
}

$msg = "";
$max_file_size = 2048*2048; // 2000kb
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(600 => 600);

if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['image'])) {
  if( $_FILES['image']['size'] < $max_file_size ){
    // get file extension
    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $valid_exts)) {
      /* resize image */
      foreach ($sizes as $w => $h) {
        $files[] = resize($w, $h);
		}
    //$me = $_FILES['image']['name'];
  $tit = $_POST['title'];
	$des = $_POST['des'];
    $me = $files[0];
  
    $dt = time();
    $m=$madmin->Calbulm($tit, $me, $dt, $des);
	
	header("location: valbulm.php");
	//exit();
    } else {
      $mes = "Unsupported file";
	  header("location: calbulm.php");
	  exit();
    }
  } else{
    $mes =  "Please upload image smaller than 1MB";
	header("location: calbulm.php");
	exit();
  }
  exit;
 }
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
                                <h3 class="box-title"> Create New ALbulm</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									      <div class="row">
										  <div class="col-lg-6">
                                    <form enctype="multipart/form-data" action="calbulm.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="content_id" value="">
                                            <input type="hidden" name="addme" value="changepic">
											
											<input class="form-control" type="text"   name="title" id="title" placeholder="Albulm Name" required><br>
											</div>

											<div class="form-group">
                        <label>Cover Photo</label>
                                            <input class="form-control" type="file" name="image" id="image" accept="image" required>
                                        </div>
                      <div class="form-group">
                        <label>Description</label>
                         <textarea class="form-control" name="des"></textarea>
                      </div>
										<div class="form-group">
																		
                                        <button type="submit" class="btn btn-primary">Create Albulm</button>
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
