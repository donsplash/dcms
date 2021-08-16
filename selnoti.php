<?php
include 'check.php';

if(isset($_POST['em'])){
	
	$to = $_POST['em'];
	$mes = $_POST['mes'];
	$sub = "Sell Order info";
	
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
		if($m){
			echo "ok";
		}
	
}


?>