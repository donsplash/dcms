<?php
include '../inc/dbcon.php';
include 'classad.php';
$madmin = new Madmin($db);
session_start();
$message = "";
$login_error='';
if($_POST['e'] && $_POST['p'] )
{
$username=$_POST['e'];
$password=$_POST['p'];

if (strlen($username)>0 && strlen($password)>0)
{
$login=$madmin->Adlogin($username,$password);

if($login)
{
$_SESSION['md_id']=$login;
$_SESSION['Logged_admin']=true;
$ac = "LOGGED IN";
$ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
$logs = $madmin->logs($username, $ac, $ip);
$url='home.php';
//header("Location:$url");
}
else
{
echo "login_failed";
$message="<span class='error'>Username or Password is invalid</span>";
exit();
}
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Donsplash CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="js/main.js"></script>
<script src="js/ajax.js"></script>
<script>
function emptyElement(x){
	_(x).innerHTML = "";
}
function login(){
	var e = _("email").value;
	var p = _("password").value;
	if(e == "" || p == ""){
		_("status").innerHTML = "Fill out all of the form data";
	} else {
		_("loginbtn").style.display = "none";
		_("status").innerHTML = '<img src=loader.gif> Login in Please wait ...';
		var ajax = ajaxObj("POST", "access.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					_("status").innerHTML = "Login unsuccessful, please try again.";
					_("loginbtn").style.display = "block";
				} else {
					window.location = "home.php";
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
</script>
</head>

<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Donsplash CMS v2.0</a>
            </div>
			</nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="panel-title">Please Sign In</h2>
                    </div>
                    <div class="panel-body">
                        <form id="loginform" onsubmit="return false;">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="email" id="email" type="text" onfocus="emptyElement('status')" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id="password" type="password" onfocus="emptyElement('status')">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
									<font color="red"><span id="status"></span></font>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="loginbtn" class="btn btn-lg btn-success btn-block" onclick="login()">Login</button> 
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
