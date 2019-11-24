<!DOCTYPE html>
<html lang="en">
	
    <?php 

$title = "All Orders";
require_once('header.php');

if(!isset($_SESSION['user_id'])){

    echo "<script>alert('Please Login First'); window.location='index.php'</script>";

}
    
        include("model/Cart/Order.php");
        //echo $_SESSION["user_id"];
        $orders = getOrderByUserID($_SESSION['user_id']);

    //print_r($orders);

     ?>
     

	<!-- header -->
    <?php ?>
    <!-- //header -->
    <style>
        span {
          margin-left: 10px;
        }
        </style>
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->
    <div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center col-md-12 col-xs-12">
				<span>A</span>ll
				<span>O</span>rders</h3>
            <!-- //tittle heading -->
            <?php 
                foreach ($orders as $order) {
                    # code...
                ?>
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                    <div class="product-sec1 px-3  py-3 mb-4">
                                <table style="width:100%;" class="table table-striped table-bordered" data-page-length='10'>
                            <tr style="border-bottom:1px;">
                                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. :<span class="text-secondary"><?php echo $order->order_id;?></span></span></H5>
                            </tr>
                            <tr >
                                <td style="width:6%;vertical-align: middle;" >
                                    <div class="text-center"> <?php echo "";?> </div>  
                                </td>
                                <td style="width:22%;vertical-align: middle;">
                                    <p class="text-info">Number Of Items:<span class="text-dark"><?php echo $order->getOrderProductCount(); ?></span></p>
                                    <hr />
                                    <b><p class="text-secondary">Price : <span class="item_price "><?php echo $order->getTotalPriceOfProducts(); ?></span></p></b>
                                </td>
                                <td style="min-width:20%;vertical-align: middle;" >
                                        <b> 
                                            Payment Method : <?php echo $order->payment_type; ?>
                                         </b> 
                                        <hr/>
                                         <b>
                                             Order Staus : <?php echo $order->order_status; ?>
                                         </b>
                                </td>
                                <td style="width:20%;vertical-align: middle;">
                                    <div class="text-center" style="height: 100%;">
                                        <a href="viewOrder.php?id=<?php echo $order->order_id; ?>"><button type="button" class="btn btn-primary" style="width:100%; max-width:150px; " >Track Order</button></a><br />
                                        <button type="button" class="btn btn-danger" style="margin-top:10px; width:100%; max-width:150px;">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div >
                    </div>
                </div>    
                <?php } ?>
            </div>
            
        </div>
    </div>     
    <?php require_once('footer.php');?>
    </body>

</html>