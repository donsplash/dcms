<?php
include 'check.php';

if(isset($_POST['app'])){
	
	$a = $_POST['app'];
	$ui = $_POST['ui'];
	$bid = $_POST['bi'];
	$uss = $madmin->Suser($ui);
	$usa = $uss['name'];
	$bnk = $madmin->Sbnk($bid);
	$ord = $madmin->eorder($a);
	$pro = $madmin->idprod($ord['pid']);
	$qty = $ord['qty'];
	$price = $ord['price'];
	$mes = " You placed an order for $".$qty. " of " .$pro." <br /><br />";
	$mes .= " ############# <br /><br />";
	$mes .= " ORDER ID  WDGX".$a. " <br />";
	$mes .= " Below is the Payment Details <br />";
	$mes .= " Deposit Amount: NGN ".$price."<br />";
	$mes .= " Bank Name:  ".$bnk['bank']."<br />";
	$mes .= " Account Name:  ".$bnk['name']."<br />";
	$mes .= " Account Number:  ".$bnk['accn']."<br /><br />";
	$mes .= "############### <br />";
	$mes .= "PLEASE NOTE  <br />";
	$mes .= "After you make Payment to our account,  sign into your Account and Click mark as PAID. If not, we will not get your order and it might not be processed. ";
	$mes .= "<br /><br /> ";
	$mes .= "NOTE: PLEASE NOTE THAT WE WILL NOT BE RESPONSIBLE FOR FUNDING A WRONG ACCOUNT PROVIDED BY YOU ";
	$sub = "New Order Invoice";
	$to = $uss['email'];
	$del = $madmin->appO($a);
	if($del){
		echo "ok";
		$from = "WiliDike X <info@wdgexchange.com>";
		$subject = $sub;
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>WiliDike Global Exchange</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="border: 5px solid #CF6476;"><div style="padding:10px; background:#CF6476; font-size:24px; color:#fff;"><a href="https://www.wdgexchange.com"><img src="https://www.wdgexchange.com/images/logo.png" width="120" height="55" style="border:none; float:left;"></a>WiliDike Global Exchange</div>
<div style="padding:24px; font-size:17px;"><p>Hello '.$usa.',<br /> 
'.$mes.'
  <p><strong id="yui_3_16_0_1_1400457885519_22883">Kind regards,<br>
WiliDike Global Exchange Support Staff</strong> </p>
  <p>&nbsp;  </p></div></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$m = mail($to, $subject, $message, $headers);
		if(!$m){
			echo "failed";
		}
	}else{
		echo "bad";
	}	
}


?>