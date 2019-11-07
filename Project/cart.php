<!DOCTYPE html>
<html lang="en">
	<?php    $title = "Product"; ?>

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
                    <span id="TotalProduct"> <?php echo count($result_set);?> Products</span>
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
                               $p = new Product($result_set[$i]['pro_id']);
                               ?>
                                        <tr class="rem1">
                                        <td class="invert"><?php echo $p->name; ?></td>
                                        <td class="invert-image" >
                                            <a href="single.php?pro_id=<?php echo $p->pro_id;?>">
                                                <?php $image = Unserialize($p->images);?>
                                                <img src="<?php echo $image[0]; ?>" alt=" " class="img-responsive" style="max-height:200px; width:auto;">
                                            </a>
                                        </td>
                                        <td class="invert">
                                                    <form id='myform' method='post' action='Cart.php'>
                                                    <input type='number' name='quantity' value="<?php echo $result_set[$i]['qty']; ?>" min="1" class='qty' style="width:auto; max-width:100px;" /><br />
                                                    <input type='hidden' name='ProductID' value='<?php echo $result_set[$i]['pro_id']; ?>' class='pro_id' />
                                                    <input style="font-size:1em; margin:0; padding:0; border:0; background-color:White;" name="btnUpdateCart" type="submit" value="Restock" />
                                                    </form> 
                                                </td>
                                                <td class="invert"><?php echo $p->name; ?></td>
                                                <td class="invert"><?php echo $p->mrp; ?></td>
                                                <td class="invert"></td>
                                                <td class="invert">
                                                    <a href="cart.php?delProduct=YES&pro_id=<?php echo $p->pro_id; ?>"> <div class="rem">
                                                        <div class="close1"> </div>
    								                    </div></a>
    							                    </td>
    						                </tr>
                                <?php } ?>
                                <tr><td colspan="7"><div class="right-w3l"> <form method=post action="checkout.php"> <input type="submit" class="form-control" value="Check Out" > </form></div></td></tr>
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

        <script>alert('Please Login To View Your Cart Cart'); window.location = 
        "index.php"
        </script>

<?php  }
        if(isset($_REQUEST['delProduct']) && isset($_REQUEST['pro_id']) && !empty($_REQUEST['delProduct']) && !empty($_REQUEST['pro_id']))
        {
            $cart->deleteProduct($_REQUEST['pro_id']);
            echo "<script>window.location = \"index.php\";</script>";
        }
?>
<?php include_once('footer.php'); ?>
	
    <script>
		$('.qty').on('click', function () {
            var cart = '<?php echo $cart->cart_id; ?>';
            var user_id = '<?php echo $cart->user_id; ?>';
            var qty = $('.qty').val();
            var pro_id = $('.pro_id').val();
            alert(cart+""+user_id+""+qty+""+pro_id);
            $.ajax({
				url:"model/Cart/Cart.php",
				method:"POST",
				data:{action:'update_pro',qty:qty,cart:cart,user_id:user_id,pro_id:pro_id},
				success:function(data){
                    alert(data);
				},
				error: function(errorThrown){
        			alert(errorThrown);
        			alert("There is an error with AJAX!");
    			}               

			});
			
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>