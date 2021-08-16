 <?php
include 'check.php';
if($_GET['id']){
    $id = $_GET['id'];

}
$ginv = $madmin->ginvo($id);
$odn = $ginv['odn'];
$t = $ginv['dt'];
$uids = $ginv['ouid'];
 $userd =  $madmin->Suser($uids);

 $name = $userd['name'];
 $email = $userd['email'];

$gord = $madmin->gord($odn);

 ?>
 <!DOCTYPE html>
<html>
    <head>
         <?php include '../head.php'; ?>
    </head>

 <section id="services">
        <div class="container">
            <div class="box first">
            <h1>Invoice</h1><hr>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <img src="../images/logo.png">
                    <address>
                        <strong><?php echo $name;  ?></strong>
                        <br>
                        <abbr title="Email">E:</abbr> <?php echo $email;  ?>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php echo date('d M Y h:i:s A', $t);  ?></em>
                    </p>
                    <p>
                        <strong>Invoice #: <?php echo $id;   ?></strong>
                    </p>
                    <p>ORDER NO: <?php echo $odn;   ?></p>
                </div>
            </div>
	<table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr>
               <td></td> 
               <td></td> 
               <td>Status</td> 
               <td><?php if($ginv['st'] == 3138){  ?>
                <button class="btn btn-big btn-lg btn-success">PAID</button>
                <?php
                } else { ?>
                <button class="btn btn-big btn-lg btn-danger">UNPAID</button>
                <?php }  ?>

               </td> 
            </tr>
            <tr>
                
            </tr>
            <tr>
                <th>Item</th>
                <th>QTY</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
            <tr></tr>
            <?php       
    foreach ($gord as $item){
        ?>
            <tr id="pr<?php echo $item['pid'] ?>">
                <td><div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="../images/<?php echo $item['pid']; ?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                     <h4 class="media-heading"><a href="pdetails.php?id=<?php echo $item['pid']; ?>"><?php echo $madmin->idtoP($item['pid']);   ?></a></h4>
                                
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                <td><?php echo $item['qty'];   ?> <a href="#" class="remove" id="<?php echo $item['pid'];  ?>">X</a></td>
                <td>₦ <?php echo number_format($item['uprice']);  ?></td>
                <td>₦ <?php echo number_format($item['price']);   ?></td>
            </tr>
         <?php 
//$item_total += ($item["price"]*$item["quantity"]);
          }  ?> 
           
            <tr>
                <th colspan="3"><span class="pull-right">Sub Total</span></th>
                <th>₦ <?php echo number_format($ginv['price']);   ?></th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right"></span></th>
                <th></th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">Total</span></th>
                <th>₦ <?php echo number_format($ginv['price']);   ?></th>
            </tr>
            <tr>
                <td></td>
                <td colspan="3"> </td>
            </tr>
        </tbody>
    </table>  
                           </div><!--/.box-->
        </div><!--/.container-->
    </section><!--/#services-->
    </html>