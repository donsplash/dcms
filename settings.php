<?php
include 'check.php';
$mes ="";
$ud = $madmin->Admin_Details($uid);
$co = $madmin->GetConfig();
if(isset($_GET['mes'])){
$mes = "Update Successfull!";
}
if (isset($_POST['nm'])) {
$tit = $_POST['nm'];
$des = $_POST['ab'];
$pp = $_POST['pp'];
$fb = $_POST['fb'];
$tw = $_POST['tw'];
$in = $_POST['ins'];
$ft = $_POST['ft'];
$ft2 = $_POST['ft2'];
$em = $_POST['em'];
$ad = $_POST['addr'];
$t1 = $_POST['tel'];
$t2 = $_POST['tel2'];


$data = $madmin->Uconfig($tit, $des, $pp, $fb, $tw, $in, $ft,$ft2, $em, $ad, $t1, $t2);
if($data){
	header('Location: settings.php?mes=ok');
}else{
header("Location: settings.php?mes=ok");
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
    width: 500,
    height: 300,
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
                        Settings
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Settings</li>
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
								<span style="font-weight: bold; color: green;"><?php  echo $mes;   ?></span>
                                    <form action="settings.php" method="POST">
                                    <div class="form-group">
                                        <div>
                                            <img src="../images/<?php echo $co['logo']; ?>">
                                            <a href="addlogo.php">Change Logo</a>
                                        </div>
                                    </div>
                                        <div class="form-group">
											<label>Site Title</label>		
											<input type="text" name="nm" id="nm" placeholder="Site Title" class="form-control" value="<?php  echo $co['appName'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>About</label>       
                                            <input type="text" name="ab" id="ab" placeholder="About" class="form-control" value="<?php  echo $co['appDesc'];   ?>">
                                        </div>
						                  <div class="form-group">
                                            <label>Per Page</label>       
                                            <input type="text" name="pp" id="pp" placeholder="About" class="form-control" value="<?php  echo $co['perpage'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>       
                                            <input type="text" name="em" id="em" placeholder="Email" class="form-control" value="<?php  echo $co['email'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>       
                                            <input type="text" name="addr" id="addr" placeholder="Address" class="form-control" value="<?php  echo $co['addr'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tel 1</label>       
                                            <input type="text" name="tel" id="tel" placeholder="Telephone" class="form-control" value="<?php  echo $co['tel1'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tel 2e</label>       
                                            <input type="text" name="tel2" id="tel2" placeholder="Telephone 2" class="form-control" value="<?php  echo $co['tel2'];   ?>">
                                        </div>
			                             <div class="form-group">
                                            <label>FAcebook Link</label>       
                                            <input type="text" name="fb" id="fb" placeholder="Site Title" class="form-control" value="<?php  echo $co['fb'];   ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter Link</label>       
                                            <input type="text" name="tw" id="tw" placeholder="Site Title" class="form-control" value="<?php  echo $co['tw'];   ?>">
                                        </div>
        								<div class="form-group">
                                            <label>Instagram Link</label>       
                                            <input type="text" name="ins" id="ins" placeholder="Site Title" class="form-control" value="<?php  echo $co['ins'];   ?>">
                                        </div>			
										<div class="form-group">
                                            <label>Footer Text</label>       
                                            <textarea name="ft" class="form-control"><?php  echo $co['footer1']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Footer Text 2</label>       
                                            <textarea name="ft2" class="form-control"><?php  echo $co['footer2']; ?></textarea>
                                        </div>	
										<div class="form-group">
											
										<button type="submit" class="btn btn-primary">Update</button>
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
