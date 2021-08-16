<?php
include '../inc/dbcon.php';
include 'classad.php';
$adminclass = new Madmin($db);
$adm = $adminclass->vadmin();
if(isset($_POST['l'])){
	
	$l = $_POST['l'];
	$c = $_POST['c'];
	$a = $_POST['a'];
	$s = $_POST['s'];
	$e = $_POST['ext'];
	$el = $_POST['extl'];
$st = 1;
$addl = $adminclass->addLink($c, $l, $s, $st, $a, $e, $el);
if($addl){
	echo "ok";
	
}
}

if(isset($_POST['subl'])){
	
	$l = $_POST['sl'];
	$c = $_POST['ci'];
	$s = $_POST['sa'];
	$e = $_POST['ext'];
	$el = $_POST['extl'];
	//$s = $_POST['s'];
$st = 1;
$addl = $adminclass->addsubLink($c, $l, $s, $st, $e, $el);
if($addl){
	echo "ok sub";
	
}
}

?>