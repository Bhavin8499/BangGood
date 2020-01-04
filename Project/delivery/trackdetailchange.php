<?php


if(!class_exists("Order")){
    include("../model/Address.php");
}

if(!class_exists("Order")){
    include("../model/Cart/Order.php");
}
if(!class_exists("Delivery")){
    include("../model/Delivery.php");
}

$order = getOrderByID($_GET['id']);
$addre= $order->getAddress();
$title = "Home | BangGood";
include("header.php");
include("nevigation.php");

if(isset($_POST["up_status"])){

    $key = $_POST["txtKey"];
    $desc = $_POST["txtDesc"];

    $del = new Delivery($_GET['id'], $_SESSION["user_id"]);

    $del->insert_new_track_detail($key, $desc);

    


}

$del = new Delivery($_GET['id'], $_SESSION["user_id"]);


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
                <b>Payment Method : </b><?php echo $order->payment_type; ?><hr/>
                <b>Contact Number : </b><?php echo $order->contact_num; ?><hr/><b>Order Staus :</b> <?php echo $order->order_status; ?>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <div class="text-center">
                        <b>Address</b>
                        <hr style="margin:2px;">
                        <p>Address Line 1 : <?php echo $addre->add_line1; ?></p>
                        <hr style="margin:2px;">
                        <p>Address Line 2 : <?php echo $addre->add_line2; ?></p>
                        <hr style="margin:2px;">
                        <p>Pincode : <?php echo $addre->pincode; ?></p>
                        <hr style="margin:2px;">
                        <p>City : <?php echo $addre->city; ?></p>
                        <hr style="margin:2px;">
                        <p>State : <?php echo $addre->state; ?></p>
                    </div>
                   
                </td>
                </tr>
                <tr>
                    <td colspan=2>                    
                        <div class="text-center" style="margin-top:20px; margin-bottom:20px;"><h3>Current Tracking Order Details</h3></div>
                        
                        <div><?php $del->print_delivery_status(); ?></div>
                        
                    </td>
                </tr>

                <tr>
                <td colspan=2>
                <form action="#" method="post"  enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <label class="col-form-label">Status :&nbsp;</label>
                            <select class="form-control custom-select form-control-sm" name="txtKey" id="" required="true">
                               <option value="">Select Status</option>
                               <option value=2>In progress</option>
                               <option value=3>Reach Near Hub</option>
                               <option value=4>Out Of Delivery</option>
                               <!--<option value=5>Delivered</option>-->
                             </select>
                        </div>
						<div class="form-group ">
                            <label class="col-form-label">Description : </label>                                           
                            <textarea style="width:100%; min-height:250px;" name="txtDesc"></textarea>
                        
						</div>
                        <div class="right-w3l">
							<input type="submit" class="form-control" name="up_status" value="Update">
						</div>
                        </td>
                </tr>


        </table>
    </div>
</div>

<?php include("footer.php"); ?>