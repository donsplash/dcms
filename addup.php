<?php
include 'check.php';
$message ="";
$ud = $madmin->Admin_Details($uid);
if (isset($_POST['addme'])) {

$tit = $_POST['title'];
$cont = "";
$cat = "down";
//$pic = $_POST['pic'];
//$key = $_POST['key'];
$time= time();
$postby = $ud['enteru'];


$path = "img/"; //file to place within the server
$valid_formats1 = array("mp3", "ogg", "flac", "png", "mp4", "pdf", "jpg"); //list of file extention to be accepted
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $file1 = $_FILES['fileToUpload']['name']; //input file name in this code is file1
        $size = $_FILES['fileToUpload']['size'];

        if(strlen($file1))
            {
                list($txt, $ext) = explode(".", $file1);
                if(in_array($ext,$valid_formats1))
                {
                        $actual_image_name = $txt.".".$ext;
                        $tmp = $_FILES['fileToUpload']['tmp_name'];
                        if(move_uploaded_file($tmp, $path.$actual_image_name))
                            {
                            //success upload
							$sql = "INSERT INTO content (title, category, postby, pic, created) VALUES ('$tit','$cat', '$postby', '$file1', '$time') ";
							$query = mysqli_query($db, $sql);
							$message = '<h3>File Uploaded Successfully</h3>';
                            }
                        else
                           $message = '<h3>Download failed please check Size in PHP configuration</h3>';              
                    }
        }
    }




/*


$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	
	
}
// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size

// Allow certain file formats
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
	$sql = "INSERT INTO content (title, category, postby, pic) VALUES ('$tit','$cat', '$postby', '$fname') ";
	$query = mysqli_query($db, $sql);
       $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
       $message = "Sorry, there was an error uploading your file.";
    }
}



//$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
*/
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
                 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									      <div class="row">
                                <div class="col-lg-6">
								

<div id="message"><?php  echo $message;   ?> </div>
                                    <form action="addup.php" method="POST"   enctype="multipart/form-data">
									<input type="hidden" name="addme"  value="2">
                                        <div class="form-group">
                                            
											<input type="file" name="fileToUpload" id="fileToUpload">
											<input type="text" size="50" maxlength="250"  name="title" id="title" placeholder="Title"><br>
											<input type="text" size="50" maxlength="250"  name="key" id="key" placeholder="Search Keyword"><br>
											</div>
											<div class="form-group">
                                            
											</div>
											
											
										
										<button type="submit" class="btn btn-primary">Add Upload</button>
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
