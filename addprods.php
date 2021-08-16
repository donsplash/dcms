<?php
include 'check.php';
$start = 0;
$per_page = 100;


$ud = $madmin->Admin_Details($uid);
$prc = $madmin->prcode();
$aut = $madmin->myauthor($start, $per_page);
if (isset($_POST['addme'])) {

$nm = $_POST['nm'];
$cat = $_POST['cat'];
$price = $_POST['price'];
$decs = $_POST['decs'];
$pic = $_POST['pic'];
$man = $_POST['aut'];
$ty = $_POST['ty'];
$yr = $_POST['yr'];
$siz = $_POST['pag'];
$pre = $_POST['pre'];
$gen = $_POST['gen'];
$pc = $prc + 1;

$dt= time();
$postby = $ud['enteru'];


//$data = $madmin->addprod($nm, $cat, $price, $decs, $dt, $si);
$data = $madmin->addprods($nm, $cat, $price, $pic, $decs, $dt, $man, $ty, $siz, $yr, $pre, $pc, $gen);
if($data){
	$cid = $data;
	$ac = "Added Product With ID-"  .$cid;
	$ips = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	$logs = $madmin->logs($postby, $ac, $ips);
header("Location: vprod.php?page");
}else{
header("Location: addprod.php");
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
    selector: "textarea#decs, textarea#pre",
    theme: "modern",
    width: 500,
    height: 100,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"
         
         
   ],
  
   content_css: "css/content.css",
   toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | forecolor backcolor ", 
   
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}}
        
    ]
 }); 
</script>
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
								<form id="picid" method="post" enctype="multipart/form-data" action=''>

<input type="file"  name="image" id="image" class=" custom-file-input " original-title="Upload Profile Picture" multiple>
<input type="submit" id="picup" value="Upload">

</form>
<div id="loading" style="display: none;" >Loading....</div>
<label>Thumbnail</label>
<div id="mis" style="display: none; "><img id="mypic" src=""></div>
<div id="message"> </div>
                                    <form action="addprod.php" method="POST">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="hidden" name="content_id" value="">
                                            <input type="hidden" name="addme" value="addme">
                                            <input type="hidden" name="pic" id="mn" value="">
											
											<h3>Product Code : EMA<?php echo $prc +1;  ?></h3>
											<input type="text" size="50" maxlength="250"  name="nm" id="nm" placeholder="Product Name" class="form-control">
											
											</div>
											<div class="form-group">
                                                <label>Price</label>
                                            <input type="text" size="50" maxlength="250"  name="price" id="price" placeholder="Buy Price" class="form-control">
											</div>
											
											<div class="form-group">
                                            <label>Select Category <font color="red"> E.g  <i>Electronics , home etc.</i></font></label>
                                            <select class="form-control" name="cat" id="cat" class="form-control">
                                                
                                                <option value="new">New</option>
                                                <option value="top">Top</option>
                                                
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Type <font color="red"> </i></font></label>
                                            <select class="form-control" name="ty" id="ty" class="form-control">
                                                
                                                <option>ebook</option>
                                                <option>hardback</option>
                                                <option>paperback</option>
                                                
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Genre <font color="red"> </i></font></label>
                                            <select class="form-control" name="gen" id="gen" class="form-control">
                                                
                                                <option value="fiction">Fiction</option>
                                                <option value="biz">Business</option>
                                                <option value="scifi">Sci Fiction</option>
                                                <option value="religious">Religious</option>
                                                <option value="motivation">Motivational</option>
                                                <option value="educational">Educational</option>
                                                <option value="romance">Romance</option>
                                                <option value="drama">Drama</option>
                                                <option value="tech">Tech</option>
                                                                                              
                                                
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Author</label>
                                           <select class="form-control" name="aut" id="aut" class="form-control">
                                            <option>Select</option>
                                             <?php foreach ($aut as $at) { ?>
                                                     <option value="<?php echo $at['auid']  ?>"><?php echo $at['name'];  ?></option>
                                             <?php
                                                 # code...
                                             }   ?>   
                                               
                                                                                              
                                                
                                            </select>
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Pages</label>
                                            <input type="text" size="50" maxlength="250"  name="pag" id="pag" placeholder="Pages" class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" size="50" maxlength="250"  name="yr" id="yr" placeholder="Year" class="form-control">
                                           
                                        </div>

										<div class="form-group">
											<label>Description</label>
											<textarea cols="50" rows="5" id="decs" name="decs" class="form-control"></textarea>
                                        
										</div>
                                        <div class="form-group">
                                            <label>Preview</label>
                                            <textarea cols="50" rows="5" id="pre" name="pre" class="form-control"></textarea>
                                        
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary pull-right">Add Product</button>
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
