<?php  
$mid = $_SESSION['md_id'];
$Users_Count=$madmin->Users_Count();
$newsc = $madmin->Ncount();
$Adv = $madmin->AdvertsC();
$Links = $madmin->Lkcounts();
$Slinks = $madmin->SubLcount();
$Cont = $madmin->ccount();
$Orders = $madmin->corder();
$sOrders = $madmin->csorder();
$Prod = $madmin->cprod();
$Cview = $madmin->Sviews();
$viewsn = $Cview['SUM(views)'];
$Corder = $madmin->Sorders();
$tprice = $Corder['SUM(price)'];
$comp = $madmin->Corders();
$cprice = $comp['SUM(price)'];
$ud = $madmin->Admin_Details($mid);
?>