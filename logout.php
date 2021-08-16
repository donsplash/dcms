<?php
session_start();

unset($_SESSION['logged_in']);
unset($_SESSION['username']);
unset($_SESSION['clinet_id']);
unset($_SESSION['Logged_admin']);
session_destroy();
if($_GET['log']=='ad'){
header('Location: adminlogin.php');
}else{
header('Location: access.php');
}
?>