<?php
include 'check.php';
$ud = $madmin->adminuser($uid);
if (isset($_GET['pid']) || !empty($_GET['pid'])){
$contid = $_GET['pid'];

$data1 = $madmin->eprod($contid);
$a = $data1['name'];
$p = $data1['pic'];
$b = $data1['det'];
$c = $data1['cat'];
$pr = $data1['price'];
$co = str_replace("images", "../images", $data1['det']);
}

if (isset($_POST['edit']) || !empty($_POST['id'])) {

$id = $_POST['id'];
$nm = $_POST['title'];
$pic = $_POST['pic'];
$decs = $_POST['content'];
$cat = $_POST['cat'];
$price = $_POST['price'];
$decs = str_replace("../images", "images", $decs); 
$data = $madmin->edpro($nm, $cat, $price, $decs, $pic, $id);
if($data){
	$us = $ud['enteru'];
	$cid = $data;
	$ac = "Edited  Product With ID-"  .$cid;
	$ips = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	$logs = $madmin->logs($us, $ac, $ips);
header("Location: vprod.php?page");
}else{
header("Location: edpro.php");
}
}
?>
<!DOCTYPE html>
<html>
    <head>
       <?php include 'hcss.php';  ?>
		<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/jquery.js"></script>
<script>

tinymce.init({
    selector: "textarea#content",
    theme: "modern",
    height: 500,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor jbimages"
   ],
   templates: [ 
        {title: 'sim', description: 'mysim', content: 'Hello my'}, 
        {title: 'cooldiv', description: 'pagelay', url: 'http://localhost/visitedo/tr.html'} 
    ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons | jbimages", 
   
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>
<script>
 $(document).ready(function () {
//$('#picid').submit( function(e)
$('#picid').submit( function(e)
{
var im = $("#image").val();
if(im==""){
alert("Please Select Photo");
return false;
}
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
$("#mypic").attr('src', '../images/'+data);
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
                 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									         <div class="row">
                                <div class="col-lg-12">

                                <?php if($p==""){
                                        ?>
                                                <form id="picid" method="post" enctype="multipart/form-data" action=''>

<input type="file"  name="image" id="image" class=" custom-file-input " original-title="Upload Profile Picture"><br>
<input type="submit" id="picup" value="Upload New Photo" class="btn btn-primary">

</form>
<div id="loading" style="display: none;" >Loading....</div>
<label>Thumbnail</label>
<div id="mis" style="display: none; "><img id="mypic" src="" style="width: 400px;"></div>
<div id="message"> </div>
                                        <?php
                                    }else{

                                        ?>
<div id="mis"><img id="mypics" src="../images/<?php echo $p; ?>" style="width: 400px;">
<button class="btn btn-danger btn-xs" id="dpic" rel="<?php echo $contid; ?>" rel1="<?php echo $p; ?>">Delete</button></div><br><br>

                                        <?php
                                        } ?>








                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $contid; ?>">
                                            <input type="hidden" name="edit" value="edit">
                                            <input type="hidden" name="pic" id="mn" value="<?php echo $p; ?>">
											<label>Title</label>
											<input type="text" size="50" maxlength="250"  name="title" id="title" placeholder="Title" value="<?php echo $a; ?>" class="form-control"><br>
											</div>
											<div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" class="form-control" value="<?php echo $pr; ?>">
                                            </div>
										<div class="form-group">
											
											<textarea cols="50" rows="20" id="content" name="content" class="form-control"><?php echo $co; ?></textarea><br>
                                        <button type="submit" class="btn btn-primary">Edit Prod</button>
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

$("#dpic").click(function () {

var choice = confirm("Are you sure You Want to Delete Photo?");
var ID=$(this).attr("rel");
var p=$(this).attr("rel1");
var dataString = 'cpic='+ID+'&p='+p ;
if(choice == true) { 
 $.ajax({
type: "POST",
url: 'delc.php',
data: dataString,
cache: false,
beforeSend: function(){},
success: function(data)
{
if(data=="ok"){
window.location.reload();
}
}
});
}
});
			
		});
		
		
		</script>

        

    </body>
</html>
