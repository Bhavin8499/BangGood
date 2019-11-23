<?php

$title = "All Address | BangGood";

include("header.php");
include("nevigation.php");

include("model/Address.php");

if(!isset($_SESSION["user_id"]))
    echo "<script>alert('Login First to see your addresses details'); window.location='login.php'</script>";

$add = getAllAddress($_SESSION["user_id"]);

?>

<div class="ads-grid col-md-12 col-xs-12">
    <div class="container-fluid" style="margin-top:15px; margin-bottom:15px;">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>A</span>ll
            <span>A</span>ddress
        </h3>
    </div>

    <?php

        if(count($add) < 1){
?>

    <div class="col-md-12 col-xs-12 text-center">
    <hr>
        <p>There is no Address Avaiable please add new address by clicking following button</p>
        <hr>  <a href="addupdateaddress.php"> <button type="button" class="btn btn-primary" style="width:60%; margin-bottom:30px;">Add New Address</button></a><br />

    </div>

<?php
        }

    ?>
    

    <?php
        $counter = 0;
        foreach ($add as $address) {
            $counter++;
    ?>
    <div class="wrapper col-md-12 col-xs-12" id="addDiv<?php echo $counter; ?>">
        <div class="product-sec1 px-3  py-3 mb-4">
            <table style="width:100%;" class="table table-striped table-bordered" data-page-length='10'>
                <tr>
                    <td style="vertical-align: middle; width:1%;">
                        <H5 style="font-size:medium; "><span
                                class="text-secondary"><?php echo $counter;?></span></span></H5>
                    </td>

                    <td style="width:22%;vertical-align: middle;">
                        <p class="text-info">Address Line 1 :<span
                                class="text-dark"><?php echo $address->add_line1; ?></span></p>
                        <hr style="margin-top:10px; margin-bottom:10px;" />
                        <p class="text-info">Address Line 2 :<span
                                class="text-dark "><?php echo $address->add_line2; ?></span></p>

                        <hr style="margin-top:10px; margin-bottom:10px;" />
                        <p class="text-info">Pincode :<span class="text-dark"><?php echo $address->pincode; ?></span>
                        </p>
                        <hr style="margin-top:10px; margin-bottom:10px;" />
                        <p class="text-info">City :<span class="text-dark"><?php echo $address->city; ?></span></p>
                        <hr style="margin-top:10px; margin-bottom:10px;" />
                        <p class="text-info">State :<span class="text-dark"><?php echo $address->state; ?></span>
                        </p>

                    </td>

                    <td style="width:1%;vertical-align: middle;">
                        <div class="text-center" style="height: 100%;">
                            <button type="button" class="btn btn-danger"
                                onClick="removerAddress(<?php echo $address->id; ?>);"
                                style="width:100%; max-width:150px; ">Delete</button><br />

                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>


    <?php 
    
        }

    ?>

</div>

<script>
    function removerAddress(add_id) {
        if (add_id > 0) {

            var confirmId = confirm("Are You Sure. you want to delete this address.");

            if (confirmId == true) {
                var action = 'removeAddress';
                var divId = '#addDiv' + add_id;
                $(divId).fadeOut(500);
            }
            $.ajax({
                url: "ajax/remove_address.php",
                method: "POST",
                data: {
                    address_id: add_id
                },
                success: function (data) {
                    alert(data);
                    alert("Address Deleted Successfully");
                },
                error: function (errorThrown) {
                    alert(errorThrown);
                    alert("There is an error with AJAX!");
                }
            });
            /*var user_id = '';
            var mrp = mrp;
            var pro_id = pro_id;
            //alert(mrp);
            //alert(qty.value+"*--*"+pro_id+"*--*"+user_id+"**--*"+cart_id);
            $.ajax({
                url: "model/Cart/Cart.php",
                method: "POST",
                data: {
                    action: action,
                    qty: qty.value,
                    cart_id: cart_id,
                    user_id: user_id,
                    pro_id: pro_id
                },
                success: function (data) {
                    alert("Quantity Updated...!!!");
                },
                error: function (errorThrown) {
                    alert(errorThrown);
                    alert("There is an error with AJAX!");
                }
            });
            var tot_mrp = mrp * qty.value;
            document.getElementById("tot_mrp" + pro_id).innerHTML = tot_mrp;
            */
        }
    }
</script>


<?php
include("footer.php");

?>