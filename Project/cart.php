<!DOCTYPE html>
<html lang="en">
<?php $title = "Cart | Banggood"; ?>

<!-- top-header -->
<?php
			require_once('model/Product/Product.php'); 
			require_once('header.php');
		?>
<!-- //top-header -->


<!-- log in -->
<?php require_once('login.php');?>
<!-- // log in -->

<!-- register -->
<?php //require_once('register.php');?>
<!-- //register -->


<!-- navigation -->
<?php require_once('nevigation.php');?>
<!-- //navigation -->

<?php 
    if(!class_exists('Cart'))
    {
         require_once(dirname(__FILE__)."/model/Cart/Cart.php");
    }
    if(isset($_SESSION['user_id']))
    {
            $user_id = $_SESSION['user_id'];
            $cart = new Cart($user_id);
            //echo $cart->user_id;
            $result_set =$cart->getCart();
        ?>

<div class="privacy py-sm-3 py-4">
    <div class="container py-xl-1 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>C</span>art
        </h3>
        <!-- //tittle heading -->
        <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
            <span id="TotalProduct"> <?php echo $cart->getTotalProduct();?> Products</span>
        </h4>
        <div class="checkout-right">

            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (!empty($result_set))
                        {
                          for($i=0;$i<count($result_set);$i++)
                           {
                               $p[$i] = new Product($result_set[$i]->product_id);
                               ?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $i+1;?></td>
                            <td class="invert-image">
                                <a href="single.php?pro_id=<?php echo $p[$i]->pro_id;?>">
                                    <?php $image = Unserialize($p[$i]->images);?>
                                    <img src="<?php echo $image[0]; ?>" alt=" " class="img-responsive"
                                        style="max-height:200px; width:auto;">
                                </a>
                            </td>
                            <td class="invert">
                                <input type='number' name='quantity' value="<?php echo $result_set[$i]->qty; ?>" min="1"
                                    class='qty' style="width:auto; max-width:100px;"
                                    onclick='updateQty(this,<?php echo $p[$i]->pro_id;?>,<?php echo $p[$i]->mrp; ?>)' /><br />
                                <input type='hidden' name='pro_id' value='<?php echo $p[$i]->pro_id; ?>' onclick='this'
                                    class='pro_id' />
                                <input style="font-size:1em; margin:0; padding:0; border:0; background-color:White;"
                                    name="btnUpdateCart" type="submit" value="Restock" />
                            </td>
                            <td class="invert"><?php echo $p[$i]->name; ?></td>
                            <td class="invert"><?php echo $p[$i]->mrp; ?></td>
                            <td class="invert">
                                <p><span id="tot_mrp<?php echo $p[$i]->pro_id;?>">
                                        <?php echo $result_set[$i]->qty*$p[$i]->mrp; ?> </span></p>
                            </td>
                            <td class="invert">
                                <a href="cart.php?delProduct=YES&pro_id=<?php echo $p[$i]->pro_id; ?>">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="7">
                                <div class="right-w3l">
                                    
                                    <form method=post action="checkout.php">
                                        <input type="submit" class="form-control" value="Check Out">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
        
    }
    else
    {?>

<script>
    alert('Please Login To View Your Cart Cart');
    window.location = "index.php"
</script>

<?php  }
        if(isset($_REQUEST['delProduct']) && isset($_REQUEST['pro_id']) && !empty($_REQUEST['delProduct']) && !empty($_REQUEST['pro_id']))
        {
            $cart->deleteProduct($_REQUEST['pro_id']);
            echo "<script>window.location = \"cart.php\";</script>";
        }
?>
<?php include_once('footer.php'); ?>

<script>
    function updateQty(qty, pro_id, mrp) {
        if (qty.value >= 1) {
            var action = 'update_quantity';
            var cart_id = '<?php echo $cart->cart_id; ?>';
            var user_id = '<?php echo $cart->user_id; ?>';
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

        }
    }
    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1) divUpd.text(newVal);
    });
</script>

</body>

</html>