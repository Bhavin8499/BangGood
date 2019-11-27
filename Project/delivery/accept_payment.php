<?php
$title = "Accept Payment | BangGood";
include("header.php");
include("nevigation.php");

if(!class_exists("Order.php"))
{
    include("../model/Cart/Order.php");
}
if(!class_exists("Address")){
    include("../model/Address.php");
}

$orders = getRemainingPaymentOrder();

?>

<div class="ads-grid col-md-12 col-xs-12">
    <div class="container-fluid" style="margin-top:15px; margin-bottom:15px;">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>A</span>ccept
            <span>P</span>ayment
        </h3>
    </div>
<?php
    $counter = 0;
foreach ($orders as $order) {
    $counter += 1;
    $addre = $order->getAddress();
    ?>
    <div style="margin:50px;" id="payDiv<?php echo $order->order_id; ?>">
    <div style="width:98%; box-shadow:-1px 1px 1px 1px Gray;" class="table-responsive">
        <table class="table table-striped table-bordered" data-page-length='10'>
            <tr style="border-bottom:1px;">
                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. : <?php echo $order->order_id; ?> </H5>
            </tr>
            <tr>
                <td>
                    <div class="text-center">  <?php echo $counter; ?>
                    </div>
                </td>

                <td style="width:200px;"><b>Buyer : </b><?php echo $order->name; ?><br />
                    <span style="color:Gray; font-size:x-small;">Number Of Items : <?php echo $order->getOrderProductCount() ?>
                        <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span><br />
                    <span style="color:Gray; font-size:x-small;">Price : <?php echo $order->getTotalPriceOfProducts() ?>
                        <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span>
                </td>

                <td style="min-width:200px;"><b>Payment Staus : </b><?php echo $order->payment_status; ?><hr/>
                <b>Contact Number : </b><?php echo $order->contact_num; ?><hr/><b>Order Staus :</b> <?php echo $order->order_status; ?>
                </td>

                <td>
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

                <td>
                    <div class="text-center" style="height: 100%;">
                        <button type="button" class="btn btn-primary" style="width:100%; max-width:150px;" onClick="acceptPayment(<?php echo $order->order_id; ?>);" >Accpet<br>Payment</button><br /> 
                    </div>

                </td>
                

            </tr>


        </table>
    </div>
</div>
<?php } ?>

</div>


<?php

include("footer.php");

?>

<script>
function acceptPayment(order_id){
    alert("Hello");
var confirmId = confirm("Are You Sure. you want to delete this address.");

if (confirmId == true) {
    var divId = '#payDiv' + order_id;
    $(divId).fadeOut(500);

    $.ajax({
        url: "../ajax/accept_payment.php",
        method: "POST",
        data: {
            order_id: order_id
        },
        success: function (data) {
            alert(data);
            alert("Payment Accepted Succesfully.");
        },
        error: function (errorThrown) {
            alert(errorThrown);
            alert("There is an error with AJAX!");
        }
    });

}



</script>