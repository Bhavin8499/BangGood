<!doctype html>
<html lang="en">
		<?php  $title = "Admin | Home"; ?>

	<!-- top-header -->
		<?php
			require_once('header.php');
		?>
	<!-- //top-header -->

    
    
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->

	<!-- top Products -->
	<div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center col-md-12 col-xs-12" style="margin:20px;">
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
						<!-- first section -->
							<?php //require_once("first_section.php")?>
							<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<h3 class="heading-tittle text-center font-italic">New Brand Mobiles</h3>
							<div class="row">
							<?php for($i=0;$i<4;$i++) {?>
								<div class="col-md-3 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/m1.jpg" alt="">
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.php">Samsung Galaxy J7</a>
												
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">$200.00</span>
												<del>$280.00</del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="Samsung Galaxy J7" />
														<input type="hidden" name="amount" value="200.00" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
						</div>
					</div>
						<!-- //first section -->

							
						<!-- second section -->
						<!--- <?php //require_once("second_section.php"); ?> -->
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Tv & Audio</h3>
					<div class="row">
							<?php for($i=1;$i<=4;$i++)	{?>
							<div class="col-md-3 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
							<div class="men-thumb-item text-center">
							<img src="images/m4.jpg" alt="">
							</div>
							<div class="item-info-product text-center border-top mt-4">
  	    						<h4 class="pt-1">
									<a href="single.php">Sony 80 cm (32 inches)</a>
								</h4>
							<div class="info-product-price my-2">
								<span class="item_price">$320.00</span>
									<del>$340.00</del>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="#" method="post">
								<fieldset>
										<input type="hidden" name="cmd" value="_cart" />
										<input type="hidden" name="add" value="1" />
										<input type="hidden" name="business" value=" " />
										<input type="hidden" name="item_name" value="Sony 80 cm (32 inches)" />
										<input type="hidden" name="amount" value="320.00" />
										<input type="hidden" name="discount_amount" value="1.00" />
										<input type="hidden" name="currency_code" value="USD" />
										<input type="hidden" name="return" value=" " />
										<input type="hidden" name="cancel_return" value=" " />
										<input type="submit" name="submit" value="Add to cart" class="button btn" />
								</fieldset>
							</form>
							</div>
							</div>
							</div>
						</div>	
						<?php } ?>
					</div>
					</div>

						<!-- //second section -->

						<!-- third section -->
						<div class="product-sec1 product-sec2 px-sm-5 px-3">
							<div class="row">
								<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
								<p class="w3l-nut-middle">Get Extra 10% Off</p>
								<div class="col-md-8 bg-right-nut">
									<img src="../images/image1.png" alt="">
								</div>
							</div>
						</div>
						<!-- //third section -->
						
						<!-- fourth section -->
						<?php //require_once("forth_section.php")?>
				<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
				<h3 class="heading-tittle text-center font-italic">Large Appliances</h3>
					<div class="row">
						<?php for($i=1;$i<=4;$i++) {?>
								<div class="col-md-3 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/m7.jpg" alt="">
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.html">Whirlpool 245</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">$230.00</span>
												<del>$280.00</del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="#" method="post">
													<fieldset>
														<input type="hidden" name="cmd" value="_cart" />
														<input type="hidden" name="add" value="1" />
														<input type="hidden" name="business" value=" " />
														<input type="hidden" name="item_name" value="Whirlpool 245" />
														<input type="hidden" name="amount" value="230.00" />
														<input type="hidden" name="discount_amount" value="1.00" />
														<input type="hidden" name="currency_code" value="USD" />
														<input type="hidden" name="return" value=" " />
														<input type="hidden" name="cancel_return" value=" " />
														<input type="submit" name="submit" value="Add to cart" class="button btn" />
														</fieldset>
													</form>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								</div>			
							</div>
						<!-- //fourth section -->
						</div>
					</div>
			
				</div>
			</div>
	<!-- //top products -->

	<!-- footer -->
	<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Electronics 	:</h2>
				<p class="footer-main mb-4">
					If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we make it easy to
					find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops, cell phones, tablets
					and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free Shipping</h3>
								<p>on orders over $100</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Fast Delivery</h3>
								<p>World Wide</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Big Choice</h3>
								<p>of Products</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
	
	<?php require_once('footer.php');?>
	<!-- //footer -->

</body>

</html>