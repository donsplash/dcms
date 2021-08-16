<?php 
include 'check.php';

if ($_POST['op']){
	
	$op = $_POST['op'];
	$np = $_POST['np'];
    $id  = $_SESSION['md_id'];
	//$id  = 3;
	
	
	$pin = $madmin->ChangePin($id, $op, $np);
	$a = $pin['seccode'];
	if($a == $op){
		//$ids  = $_SESSION['userid'];
		$pins = $madmin->Cpin($id, $np);
		if($pins){
		echo "PIN changed Successfully";
	}else{
		echo "Error Invalid PIN";
	
	}
	}else{
		echo "Invalid PIN";
	}	

}
//echo  $_SESSION['userid'];
?>