<!DOCTYPE html>
<html lang="en">
	<?php  $title = "Single Product"; ?>
	<!-- top-header -->
	<?php require_once('header.php');
	if(!class_exists('Product'))
    {
     require_once(dirname(__FILE__)."/model/Product/Product.php");
	}
	if(!class_exists('Categories'))
    {
     require_once(dirname(__FILE__)."/model/Categories/Categories.php");
    }
    if(isset($_REQUEST['pro_id']))
    {
            $pro=new Product($_REQUEST['pro_id']);
            //$pro_id=$_REQUEST['pro_id'];
            //$result_set = $pro->getProduct($pro_id);
    }		$category = get_category($pro->cat_id);
	?>

	<!-- //header-bottom -->
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->


	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-sm-4 mb-4">
				<span><?php echo  ucfirst($category[0]['name'][0]);?></span><?php echo  substr(strtolower($category[0]['name']),1);?>
				<span>P</span>roduct
				</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
						<ul class="slides">
								<?php $image=Unserialize($pro->images);
									for($i=0;$i<count($image);$i++){?>
								<li data-thumb="<?php echo $image[$i];?>" >
									<div class="thumb-image">
										<img src="<?php echo $image[$i];?>"  data-imagezoom="true" class="img-fluid" alt="" style='height:450px; max-height:90%; width:auto; max-width: 90%;' > 
									</div>
									</li>
								<?php } ?>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $pro->name;?></h3>
					<p class="mb-3">
						<span class="item_price">INR <?php echo round($pro->getPrice());?></span>
						<del class="mx-2 font-weight-light"><?php echo $pro->mrp;?></del>
						<label>Free delivery</label>
					</p>
					<div class="product-single-w3l">
						<?php echo $pro->description;?>
					</div>
					<div class="input-group cm-number">
						<input type="number" id="qty" name="qty" value="1" max="5" min="1" />
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details single-item hvr-outline-out">
                            <button type="button"  value='<?php echo $pro->pro_id;?>' onclick="addToCart(<?php echo $pro->pro_id;?>)" >ADD TO CART</button>
                            <!--<input type="button" value="ADD TO CART" class="button btn">-->
						</div>
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
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script src="js/jquery.flexslider.js"></script>
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