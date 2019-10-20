<!doctype html>
<html lang="en">
<?php
     require_once(dirname(__FILE__)."/../model/Product/Product.php");
      $pro = new Product();
    if(isset($_POST))
    {
    }
?>
		<?php  $title = "Show Product"; ?>

	<!-- top-header -->
        <?php	require_once('header.php');// $result_set=getAllProduct();?>
	<!-- //top-header -->

    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->

	<!-- Form -->
    <?php $result_set=$pro->getAllProduct();	?>
	<div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>S</span>how  
            <span>A</span>ll   
            <span>P</span>roduct</h3>
             <div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                   <div class="product-sec1 px-sm-4 px-4 py-sm-4 py-4 mb-4">
				        <div class="row">
					    
                    <?php for($i=1;$i<count($result_set);$i++){ ?>

                <div class="col-md-3 product-men  mt-5">
                <div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item text-center" >

					<div style="height:250px; width:auto;">
			            	<img src=<?php echo '.'.$result_set[$i]['images'];?>  style='height:auto; max-height:90%; width:auto; max-width: 90%;' alt=''>
						</div>  
					</div>
					<div class="item-info-product text-center border-top mt-4">
						<h4 class="pt-1"><?php echo $result_set[$i]['name'];?></h4>
						<div class="info-product-price my-2">
							 MRP:<span class="item_price"><?php echo $result_set[$i]['mrp'];?></span> |
							 Quantity:   <span><?php echo $result_set[$i]['qty'];?></span>
						</div>
                    </div>
                    <div class='col-md-6 col-md-12 mb-2'>
					<a href="editProduct.php?pro_id=<?php echo $result_set[$i]['pro_id'];?>"><input type="button" name="edit_Pro" value="Edit Product" class="button btn btn-secondary" /></a>
                    <a href="#"><input type="button" name="pro_del" value="Delete Product" class="button btn btn-danger"     /></a>
                    </div>
				    </div>
			        </div>
               <?php }?>
                   <!-- -->    
                    </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>  
    </div>
    <!-- //form -->

    <!-- footer -->
    <?php require_once('footer.php');?>
	<!-- //footer -->
</body>
</html>	
