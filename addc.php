<?php
include 'check.php';

$ud = $madmin->Admin_Details($uid);
if (isset($_POST['addme'])) {

$tit = $_POST['title'];
$cont = $_POST['content'];
$cat = $_POST['cat'];
$pic = $_POST['pic'];
$key = $_POST['key'];
$lnkst = $_POST['lnkst'];
$sbst = $_POST['sbst'];
$lnk = $_POST['link'];
$lnkid = $_POST['linkid'];

$time= time();
$postby = $ud['enteru'];

//$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
$link=str_replace(" ","-",$tit);
$link=preg_replace('/[^A-Za-z0-9\-]/', '', $link);

$data = $madmin->addcon($tit, $cont, $cat, $postby, $pic, $time, $link, $key, $lnkst, $sbst, $lnk, $lnkid);
if($data){
	$cid = $data;
	$ac = "Added Content With ID-"  .$cid;
	$ips = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	$logs = $madmin->logs($postby, $ac, $ips);
header("Location: vcon.php?page");
}else{
header("Location: addc.php");
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

<input type="file"  name="image" id="image" class=" custom-file-input " original-title="Upload Profile Picture">
<input type="submit" id="picup" value="Upload">

</form>
<div id="loading" style="display: none;" >Loading....</div>
<label>Thumbnail</label>
<div id="mis" style="display: none; "><img id="mypic" src="" style="width: 400px;"></div>
<div id="message"> </div>
                                    <form action="addc.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="content_id" value="">
                                            <input type="hidden" name="addme" value="addme">
                                            <input type="hidden" name="pic" id="mn" value="">
                                            <input type="hidden" name="lnkst" id="lnkst" value="1">
                                            <input type="hidden" name="sbst" id="sbst" value="1">
                                            <input type="hidden" name="linkid" id="linkid" value="">
											<br>
											
											<input type="text" size="50" maxlength="250"  name="title" id="title" placeholder="Title"><br>
											<input type="text" size="50" maxlength="250"  name="key" id="key" placeholder="Search Keyword"><br>
											</div>
											<div class="form-group">
                                            
											</div>
											
											<div class="form-group">
                                            <label>Select Category <font color="red"> E.g  <i>Content , News etc.</i></font></label>
                                            <?php $c = $madmin->vcat();   ?>
                                            <select class="form-control" name="cat" id="cat">
                                                
                                                <?php foreach($c as $ca){
                                                    ?>
                                                    <option><?php echo $ca['cat'] ?></option>
                                                    <?php
                                                    }   ?>
                                               
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Link Generate</label>
                                            <select class="form-control" name="adl" id="adl">
                                                    <option value="1">No</option>
                                                    <option value="2">Yes</option>
                                            </select>
                                            
                                        </div>
                                        <div id="dplink" style="display: none;">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input type="text" name="link" class="form-control" id="link">
                                        </div>
                                         <div class="form-group">
                                            <label>Sub Link?</label>
                                            <select class="form-control" name="sbl" id="sbl">
                                                    <option value="1">No</option>
                                                    <option value="2">Yes</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <?php  
                                    $mlink = $madmin->AllLinks();
                                      ?>
                                    <div id="sublc" style="display: none;">
                                        <div class="form-group">
                                            <select class="form-control" name="sb" id="sb">
                                                <option>Select Link</option>
                                                <?php foreach ($mlink as $li) { ?>
                                                                 
                                                    
                                                    <option value="<?php echo $li['link_id'];  ?>"><?php echo $li['links'];  ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
										<div class="form-group">
											
											<textarea cols="100" rows="20" id="content" name="content"></textarea><br>
                                        <button type="submit" class="btn btn-primary">Add Content</button>
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
       
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

            $("#adl").change(function(){
                //alert("cool");
               var v = $("#adl").val();
               if(v == 2){
                $("#dplink").slideDown();
                $("#lnkst").val(2);
               }else{
                $("#dplink").hide();
               }
            });
            $("#sbl").change(function(){
                //alert("cool");
               var v = $("#sbl").val();
               if(v == 2){
                $("#sublc").slideDown();
                $("#sbst").val(2);
                $("#lnkst").val(1);
                }else{
                $("#sublc").hide();
               }
            });
            $("#sb").change(function(){
                var lid = $("#sb").val();
                $("#linkid").val(lid);
            });
			
		});
		
		
		</script>

        

    </body>
</html>
