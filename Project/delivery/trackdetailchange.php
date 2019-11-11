<?php


if(!class_exists("Order")){
    include("../model/Address.php");
}

if(!class_exists("Order")){
    include("../model/Cart/Order.php");
}



$title = "Home | BangGood";

include("header.php");
include("nevigation.php");

?>

<div class="ads-grid col-md-12 col-xs-12" style="margin-bottom: 10px; margin-top: 10px;">
    <div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>C</span>hange
            <span>T</span>racking
            <span>D</span>etails
        </h3>
    </div>

    <div class="container" style="background: ;"></div>

</div>


<div style="margin:50px;">
    <div style="width:98%; box-shadow:-1px 1px 1px 1px Gray;" class="table-responsive">
        <table class="table table-striped table-bordered">
            <tr style="border-bottom:1px;">
                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. : <?php echo $_GET['id']; ?> </H5>
            </tr>
            <tr>
                <td style="width:200px;"><b>Buyer : </b><?php echo $order->name; ?><br />
                    Number Of Items : <?php echo $order->getOrderProductCount() ?>
                        <!--<% Response.Write(readerProduct["Type"].ToString()); %>--><br />
                    Price : <?php echo $order->getTotalPriceOfProducts() ?>
                       
                </td>

                <td style="min-width:200px;"><b>Payment Staus : </b><?php echo $order->payment_status; ?><hr/>
                <b>Contact Number : </b><?php echo $order->contact_num; ?><hr/><b>Order Staus :</b> <?php echo $order->order_status; ?>
                </td>
            </tr>
            <tr>
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
                </tr>
                <tr>
                    <td>
                    
                        

                    </td>
                </tr>


        </table>
    </div>
</div>

<?php include("footer.php"); ?>