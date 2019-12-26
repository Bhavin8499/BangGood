<?php
    if(!class_exists("Order")){
        include("../model/Address.php");
    }

    if(!class_exists("Order")){
        include("../model/Cart/Order.php");
    }


    $title = "Current Orders | BangGood";

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
            <span>O</span>rders</h3>
    </div>
</div>
<div class="ads-grid col-md-12 col-xs-12">
    <div class="container-fluid px-sm-4 px-3 py-sm-5 py-3 mb-4">
    <div class="row">
        <div class="wrapper col-md-12 col-xs-12">
            <div class="product-sec1 px-sm-4 px-3 py-sm-5 py-3">
				
<?php
$counter = 0;
foreach ($orders as $order) {
    $addre = $order->getAddress();
    $counter += 1;
    ?>
    <div style="margin:50px;">
        <table class="table table-striped table-bordered" style="width:98%;"  data-page-length='10'>
            <tr style="border-bottom:1px;">
                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. : <?php echo $order->order_id; ?> </H5>
            </tr>
            <tr>
                <td style="width:5%;">
                    <div class="text-center">  <?php echo $counter; ?>
                    </div>
                </td>

                <td style="width:20%;"><b>Buyer : </b><?php echo $order->name; ?><br />
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

                <td style="width:8%;">
                    <div class="text-center" style="height: 100%;">
                    <a href="viewOrder.php?id=<?php echo $order->order_id; ?>"><button type="button" class="btn btn-primary" style="width:100%; max-width:150px; " >Track Order</button></a><br />
                        <?php if($order->order_status == "Need Approval") { ?>
                            <button type="button" class="btn btn-success" id="<?php echo $order->order_id; ?>" onClick="approveOrder(this);" style="margin-top:10px;width:100%;max-width:150px;">Approve</button><br />
                        
                        <button type="button" class="btn btn-danger" style="margin-top:10px; width:100%; max-width:150px;" id="<?php echo $order->order_id; ?>" onClick="disapproveOrder(this);" >Reject</button>
                        <?php } ?>
                    </div>
                </td>
            </tr>
        </table>
        </div>
        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include("footer.php"); ?>

<script type="text/javascript">

    function approveOrder(btn){
       
        $.ajax({
                url: "../ajax/approve_order.php",
                method: "POST",
                data: {
                    action : "approve_order",
                    order_id : btn.id
                },
                success: function (data) {
                    //alert(data);
                    alert("Order Is Approved...!!!");
                },
                error: function (errorThrown) {
                    alert(errorThrown);
                    alert("There is an error with AJAX!");
                }
            });

        btn.remove();
    } 

    
    function disapproveOrder(btn){
       
       $.ajax({
               url: "../ajax/disapprove_order.php",
               method: "POST",
               data: {
                   action : "disapprove_order",
                   order_id : btn.id
               },
               success: function (data) {
                   //alert(data);
                   alert("Order Is Disapproved...!!!");
               },
               error: function (errorThrown) {
                   alert(errorThrown);
                   alert("There is an error with AJAX!");
               }
           });

       btn.remove();
   } 
</script>