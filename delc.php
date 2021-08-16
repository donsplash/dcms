<?php
include 'check.php';

if(isset($_POST['golive'])){
	$gl = $madmin->golive();
	if($gl){
		echo "ok";
	}
}
if(isset($_POST['pic'])){
	$pic = $_POST['pic'];
	$gl = $madmin->delpic($pic);
	if($gl){
		echo "ok";
	}
}
if(isset($_POST['gm'])){
	$gl = $madmin->gom();
	if($gl){
		echo "ok";
	}
}
if(isset($_POST['cid'])){
	
	$a = $_POST['cid'];
	$p = $_POST['pcc'];
	$c=$madmin->delpic($p);
	$del = $madmin->delc($a);
	if($del){
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
//delete PIc content
if(isset($_POST['cpic'])){
	
	$a = $_POST['cpic'];
	$p = $_POST['p'];
	$c=$madmin->delcp($a, $p);
	if($c){
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
if(isset($_POST['catcid'])){
	
	$a = $_POST['catcid'];
	$del = $madmin->delcat($a);
	echo $del;	
	
}
if(isset($_POST['wid'])){
	
	$a = $_POST['wid'];
	$del = $madmin->delw($a);
	if($del){
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
if(isset($_POST['catscid'])){
	
	$a = $_POST['catscid'];
	$del = $madmin->delscat($a);
	echo $del;	
	
}
if(isset($_POST['auid'])){
	
	$a = $_POST['auid'];
	$del = $madmin->delad($a);
	echo $del;	
	
}
if(isset($_POST['uid'])){
	
	$a = $_POST['uid'];
	$del = $madmin->delu($a);
	echo $del;	
	
}
//Block User
if(isset($_POST['bid'])){
	
	$a = $_POST['bid'];
	$del = $madmin->BlcU($a);
	if($del){
		echo "ok";
	}else{
		echo "bad";
	}	
}
//Activat User
if(isset($_POST['aid'])){
	
	$a = $_POST['aid'];
	$del = $madmin->ActU($a);
	if($del){
		echo "ok";
	}else{
		echo "bad";
	}	
}
// ODER PROCESSING
if(isset($_POST['app'])){
	
	$a = $_POST['app'];
	$ui = $_POST['ui'];
	$bid = $_POST['bi'];
	$uss = $madmin->Suser($ui);
	$usa = "DOn";
	$mes = " You placed an order for <br />";
	$mes .= " ORDER ID  WDGX- <br />";
	$sub = "Order Invoice";
	$to = $uss['email'];
	$del = $madmin->appO($a);
	if($del){
		echo "ok";
		$del = $madmin->notify($to, $sub, $mes, $usa);
	}else{
		echo "bad";
	}	
}
//Activat User
if(isset($_POST['com'])){
	
	$a = $_POST['com'];
	$del = $madmin->ComO($a);
	if($del){
		echo "ok";
	}else{
		echo "bad";
	}	
}

if(isset($_POST['prbid'])){
	
	$a = $_POST['prbid'];
	$del = $madmin->BlcPro($a);
	if($del){
		echo "ok";
	}else{
		echo "bad";
	}	
}
if(isset($_POST['praid'])){
	
	$a = $_POST['praid'];
	$del = $madmin->ActPro($a);
	if($del){
		echo "ok";
	}else{
		echo "bad";
	}	
}

if(isset($_POST['lid'])){
	
	$a = $_POST['lid'];
	$del = $madmin->delLink($a);
	echo $del;	
	
	
}

if(isset($_POST['slid'])){
	
	$a = $_POST['slid'];
	$del = $madmin->delSLink($a);
	echo $del;	
	
	
}
if(isset($_POST['adid'])){
	
	$a = $_POST['adid'];
	$del = $madmin->Dadv($a);
	echo $del;	
	
	
}
if(isset($_POST['pid'])){
	
	$a = $_POST['pid'];
	$p = $_POST['pc'];
	$c=$madmin->delpic($p);
	$del = $madmin->delhmp($a);
	if($del){	
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
if(isset($_POST['vpid'])){
	
	$a = $_POST['vpid'];
	$p = $_POST['pc'];
	$c=$madmin->delpic($p);
	$del = $madmin->delaph($a);
	if($del){	
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
if(isset($_POST['apid'])){
	
	$a = $_POST['apid'];
	$p = $_POST['apc'];
	$c=$madmin->delpic($p);
	$del = $madmin->DelAl($a);
	if($del){
		echo "ok";
	}else{
		echo "eroor";
	}
	
}
if(isset($_POST['lpid'])){
	
	$a = $_POST['lpid'];
	$del = $madmin->delLink($a);
	echo $del;	
	
	
}
if(isset($_POST['spid'])){
	
	$a = $_POST['spid'];
	$del = $madmin->delSLink($a);
	echo $del;	
	
	
}

if(isset($_POST['viod'])){
	
	$a = $_POST['viod'];
	$del = $madmin->delorder($a);
	echo $del;	
	
	
}

if(isset($_POST['vinv'])){
	
	$a = $_POST['vinv'];
	$del = $madmin->delinv($a);
	echo $del;	
	
	
}

if(isset($_POST['proid'])){
	
	$a = $_POST['proid'];
	$del = $madmin->delp($a);
	echo $del;	

	
}

if(isset($_POST['bnkid'])){
	
	$a = $_POST['bnkid'];
	$del = $madmin->delbnk($a);
	echo $del;	
	
	
}

if(isset($_POST['sord'])){
	
	$a = $_POST['sord'];
	$del = $madmin->csord($a);
	echo $del;	

}
if(isset($_POST['aduid'])){
	
	$a = $_POST['aduid'];
	$del = $madmin->Aadmin($a);
	echo $del;	

}
if(isset($_POST['daduid'])){
	
	$a = $_POST['daduid'];
	$del = $madmin->Dadmin($a);
	echo $del;	

}
if(isset($_POST['amt'])){
 $amt = $_POST['amt'];
 $id = $_POST['id'];
$ps = $madmin->Psale($id, $amt);
if($ps){
	echo "ok";
}
}
if(isset($_POST['rid'])){
	$id = $_POST['rid'];
	$rs = $madmin->Rsale($id);
	if($rs){
	echo "ok";
}

}

?>