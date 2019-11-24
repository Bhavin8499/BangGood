<?php

if(!class_exists("Order")){
    include("../model/Address.php");
}

if(!class_exists("Order")){
    include("../model/Cart/Order.php");
}



$title = "Delivery | BangGoods";

include("header.php");
include("nevigation.php");

$orders = getAllOrders();

$ord = $orders[0];
//echo $ord->getOrderProductCount();

?>


<div class="ads-grid col-md-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;">
    <div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>C</span>urrent
            <span>P</span>ending</h3>
    </div>

    <div class="container" style="background: ;"></div>

</div>

<?php
$counter = 0;
foreach ($orders as $order) {
    $counter += 1;
    $addre = $order->getAddress();
    ?>
    <div style="margin:50px;">
    <div style="width:98%; box-shadow:-1px 1px 1px 1px Gray;" class="table-responsive">
        <table class="table table-striped table-bordered" data-page-length='10'>
            <tr style="border-bottom:1px;">
                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. : <?php echo $order->order_id; ?> </H5>
            </tr>
            <tr>
                <td style="width:5%;">
                    <div class="text-center">  <?php echo $counter; ?>
                    </div>
                </td>

                <td style="width:20%;">
                    <b>Buyer : </b><?php echo $order->name; ?><br />
                    <span style="color:Gray; font-size:x-small;">Number Of Items : <?php echo $order->getOrderProductCount() ?>
                        <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span><br />
                    <span style="color:Gray; font-size:x-small;">Price : <?php echo $order->getTotalPriceOfProducts() ?>
                        <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span>
                </td>

                <td style="width:45%;"><b>Payment Staus : </b><?php echo $order->payment_status; ?><hr/>
                <b>Contact Number : </b><?php echo $order->contact_num; ?><hr/><b>Order Staus :</b> <?php echo $order->order_status; ?>
                </td>

                <td style="width:15%;">
                    <div class="text-center">
                        <b>Address</b>
                        <hr style="margin:2px;">
                        <p><?php echo $addre->add_line1; ?></p>
                        <hr style="margin:2px;">
                        <p><?php echo $addre->add_line2; ?></p>
                        <hr style="margin:2px;">
                        <p><?php echo $addre->pincode; ?></p>
                        <hr style="margin:2px;">
                        <p><?php echo $addre->city; ?></p>
                        <hr style="margin:2px;">
                        <p><?php echo $addre->state; ?></p>
                    </div>
                   
                </td>

                <td style="width:13%;">
                    <div class="text-center" style="height: 100%;">
                        <a href="trackdetailchange.php?id=<?php echo $order->order_id; ?>" >
                        <button type="button" class="btn btn-primary" style="width:100%; max-width:150px;" >Tracking<br>Details</button></a><br /> 
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>


<?php include("footer.php"); ?>