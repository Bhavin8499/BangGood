<!DOCTYPE html>
<html lang="en">
	<?php  $title = "Single Product"; ?>
	<!-- top-header -->
	<?php require_once('header.php');
	 if(!class_exists('Product'))
	 {
	  require_once(dirname(__FILE__)."/../model/Product/Product.php");
	 }
 
    if(isset($_REQUEST['pro_id']))
    {
			$pro=new Product($_REQUEST['pro_id']);
	 }	
	?>
	<!-- //header-bottom -->
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->


	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>S</span>ingle
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
						<ul class="slides">
								<?php $image=Unserialize($pro->images);
									for($i=0;$i<count($image);$i++){?>
								<li data-thumb="<?php echo '../'.$image[$i];?>" >
									<div class="thumb-image">
										<img src="<?php echo '../'.$image[$i];?>"  data-imagezoom="true" class="img-fluid" alt="" > </div>
									</li><?php } ?>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $pro->name;?></h3>
					<p class="mb-3">
						<span class="item_price">INR <?php echo $pro->mrp;?></span>
						<del class="mx-2 font-weight-light"><?php echo $pro->mrp+500;?></del>
						<label>Free delivery</label>
					</p>
					<div class="product-single-w3l">
						<?php echo $pro->description;?>
					</div>
                        <div class="form-group form-inline col-md-3 col-md-6">
							<form action="editProduct.php" method="post" >
									<input type="hidden" name="pro_id" value="<?php echo $pro->pro_id;?>" />
                                    <input type="submit" name="edit" value="Edit" class="button btn btn-secondary" />
                                    <a href="showallProduct.php"><input type="button" name="del_Pro" value="Cancel" class="button btn btn-danger" /></a>
							</form>
                        </div>
					</div>
			</div>
		</div>
	</div>
	<!-- //Single Page -->


    <!-- footer -->
    <?php require_once('footer.php');?>
    <!-- //footer -->
    


	<!-- imagezoom 
	<script src="js/imagezoom.js"></script>-->
	<!-- //imagezoom -->

    	<!-- flexslider -->
<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />
<script src="../js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->
</body>

</html>