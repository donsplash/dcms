<?php
include 'check.php';

if($_POST['ids']){

$pt = $_POST['pt'];
$pr = $_POST['pr'];
$pd = $_POST['dt'];
$ids = $_POST['ids'];

$pro = $madmin->proInv($ids, $pt, $pr, $pd);

if($pro){
$inv = $madmin->orderInv($ids);

foreach ($inv as $d) {
	$nm = $madmin->Comorder($ids);
}
echo "ok";
}

}
?>