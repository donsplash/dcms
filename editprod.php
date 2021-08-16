<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);

if (isset($_GET['pid']) || !empty($_GET['pid'])){
$pid = $_GET['pid'];
}

$data1 = $madmin->eprod($pid);

$name = $data1['name'];
$price = $data1['price'];
$cats = $data1['cat'];
$des = $data1['descc'];

//$size = $data1['pss'];
//$yrr = $data1['yr'];

if (isset($_POST['edit']) || !empty($_POST['pid'])) {

$pids = $_POST['pid'];
$nm = $_POST['nm'];
$cat = $_POST['cat'];
$price = $_POST['price'];
$decs = $_POST['decs'];
$man = $_POST['aut'];
$ty = $_POST['ty'];
$yr = $_POST['yr'];
$siz = $_POST['pag'];
$pre = $_POST['pre'];
$gen = $_POST['gen'];
//$dt = $_POST['dt'];

//$si = $_POST['si'];
$dt= time();
$postby = $ud['enteru'];


//$data = $madmin->editpro($pids, $nm, $price, $cat, $decs, $si);
$data = $madmin->editpro($pids, $nm, $price, $cat, $decs, $man, $ty, $siz, $yr, $pre, $gen);
if($data){
	$cid = $data;
	$ac = "eDITED Product With ID-"  .$cid;
	$ips = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	$logs = $madmin->logs($postby, $ac, $ips);
header("Location: vprod.php?page");
}else{
header("Location: editprod.php");
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
                 
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
									      <div class="row">
                                <div class="col-lg-6">
								
<div id="mis" style="display: none; "><img id="mypic" src=""></div>
<div id="message"> </div>
                                    <form action="editprod.php" method="POST">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                                            <input type="hidden" name="edit" value="edit">
                                            										
											
											<input type="text" size="50" maxlength="250"  name="nm" id="nm" placeholder="Product Name" class="form-control" value="<?php echo $name; ?>">
											
											</div>
											<div class="form-group">
                                                <label>Buy Price</label>
                                            <input type="text" size="50" maxlength="250"  name="price" id="price" placeholder="Buy Price" class="form-control" value="<?php echo $price; ?>">
											</div>
											
											<div class="form-group">
                                            <label>Select Category <font color="red"> E.g  <i>New , Top etc.</i></font></label>
                                            <select class="form-control" name="cat" id="cat" class="form-control" >
                                                
                                                <option><?php echo $cats; ?></option>
                                                <option value="new">New</option>
                                                <option value="top">Top</option>
                                                
                                                
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Type <font color="red"> </i></font></label>
                                            <select class="form-control" name="ty" id="ty" class="form-control">
                                                <option><?php echo $data1['type']; ?></option>
                                                <option>ebook</option>
                                                <option>hardback</option>
                                                <option>paperback</option>
                                                
                                                
                                            </select>
                                        </div>

									
                                         <div class="form-group">
                                            <label>Genre <font color="red"> </i></font></label>
                                            <select class="form-control" name="gen" id="gen" class="form-control">
                                                
                                                <option><?php echo $data1['gen'];  ?></option>
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
                                            <input type="text" size="50" maxlength="250"  name="aut" id="aut" placeholder="Author" value="<?php echo $data1['manifac'];  ?>" class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Pages</label>
                                            <input type="text" size="50" maxlength="250"  name="pag" id="pag" placeholder="Pages" value="<?php echo $data1['size'];  ?>" class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" size="50" maxlength="250"  name="yr" id="yr" placeholder="Year" value="<?php echo $data1['year'];  ?>" class="form-control">
                                           
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea cols="50" rows="5" id="decs" name="decs" class="form-control">
                                                <?php echo $data1['descc'];  ?>
                                            </textarea>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Preview</label>
                                            <textarea cols="50" rows="5" id="pre" name="pre" class="form-control">
                                                <?php echo $data1['preview'];  ?>
                                            </textarea>
                                        
                                        </div>
                                       
                                       <button type="submit" class="btn btn-primary">Edit Product</button>
										
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
