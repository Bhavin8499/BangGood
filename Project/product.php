<!DOCTYPE html>
<html lang="en">
	<?php    $title = "Product"; ?>

	<!-- top-header -->
		<?php
			require_once('model/Product/Product.php'); 
			require_once('header.php');
		?>
	<!-- //top-header -->

    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->


<?php
    global $result_set;
     if(isset($_REQUEST['search']))
     {
        $search = explode(' ',$_REQUEST['search'],5);

        $search = implode(',',$search);

        $search = htmlspecialchars($search);   
       
        $result_set = getSearchedProduct('*',$search,$_REQUEST['search']);
        
     }
     if(!empty($result_set))
     {
        unset($_REQUEST['search']);
     ?>
	<!-- top Products -->
	<div class="ads-grid  py-sm-2 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-sm-4 mb-3">
				<span>P</span>roduct</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="filter_data">
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
                                <?php for($i=0;$i<count($result_set);$i++)	{?>
								<div class="col-md-4 product-men mt-3">
									<div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                        <?php $image=Unserialize($result_set[$i]['images']);                                        ?>
											<img src="<?php echo $image[0];?>" alt=""  style="height:275px; max-width:250px;" >
										
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="./single.php?pro_id=<?php echo $result_set[$i]['pro_id'];?>"><?php echo "".ucfirst($result_set[$i]['name']);?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo round($result_set[$i]['mrp']-($result_set[$i]['mrp']*$result_set[$i]['discount']/100));?></span>
												<del><?php echo $result_set[$i]['mrp'];?></del>
											</div>
											<div class="snipcart-details single-item hvr-outline-out">
													<button type="button"  value='<?php echo $result_set[$i]['pro_id'];?>' onclick='addToCart(<?php echo $result_set[$i]["pro_id"];?>)' >ADD TO CART</button>
													<!--<input type="button" value="ADD TO CART" class="button btn">-->
											</div>
										</div>
									</div>
								</div>
								<?php  } ?>
							</div>
                        </div>
                        </div>          
						<!-- //first section -->
					</div>
				</div>
				<?php require_once('filters.php'); ?>
				<!-- product right -->
				<!-- <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
					
						<div class="border-bottom py-2">
								<h3 class="agileits-sear-head mb-3">Categories</h3>
								<div class="list checkbox_input">
									<label><input type="checkbox"  class="common-selector cat" value="1">Mobile</label></br>
									<label><input type="checkbox"  class="common-selector cat" value="2">Laptop</label></br>
									<label><input type="checkbox"  class="common-selector cat" value="3">Accessoris</label></br>
								</div>		   	
						</div>
						<div class="border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<input type="hidden" id="hidden_minimum_mrp" value="0"/>
							<input type="hidden" id="hidden_maximum_mrp" value="9000"/>
							<p id="mrp_show">5000 - 90000</p>
							<div id="mrp_range"></div>
						</div>
						<div class="border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Brand</h3>
							<?php // fetch from db?>
							<div class="list-group-item checkbox_input">
							 
							 <label><input type="checkbox" class="common-selector brand" value="Redmi" disable>Redmi</label></br>
							 <label><input type="checkbox" class="common-selector brand" value="Samsung" disable>Samsung</label></br>
							 <label><input type="checkbox" class="common-selector brand" value="Google" disable>Google</label></br>
							 <label><input type="checkbox" class="common-selector brand" value="Motorola" disable>Motorola</label></br>
							 <hr/>
							 <label><input type="checkbox" class="common-selector brand" value="Lenovo">Lenovo</label></br>
							 <label><input type="checkbox" class="common-selector brand" value="HP">HP</label></br>
							 <label><input type="checkbox" class="common-selector brand" value="Macbook">Macbook</label></br>

							</div> 
						</div>
						<div class="border-bottom py-2">
								<h3 class="agileits-sear-head mb-3">Ram</h3>
								<div class="list-group-item checkbox_input">
									<label><input type="checkbox" class="common-selector ram" value="8 GB Ram">8 GB</label></br>
									<label><input type="checkbox" class="common-selector ram" value="6 GB Ram">6 GB</label></br>
									<label><input type="checkbox" class="common-selector ram" value="4 GB Ram">4 GB</label></br>
								</div>		   	
						</div>
						<div class="border-bottom py-2">
								<h3 class="agileits-sear-head mb-3">Internal Storage</h3>
								<div class="list-group-item checkbox_input">
									<label><input type="checkbox" class="common-selector storage" value="128 GB ROM">128 GB</label></br>
									<label><input type="checkbox" class="common-selector storage" value="32 GB ROM">32 GB</label></br>
									<label><input type="checkbox" class="common-selector storage" value="64 GB ROM">64 GB</label></br>
								</div>		   	
						</div>	
					</div>
				</div> -->
				<!-- //product left -->
				<!-- product right 
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Brand</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Search Brand..." name="search" required="">
								<input type="submit" value=" ">
							</form>
							<div class="left-side py-2">
								<ul>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Electronics</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">ELECTRON</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Electronic</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Generic</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">mono</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">ACR Electronics</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">NAXA Electronics</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Techno electronics</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">TC Electronic</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Robodo Electronics</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">JJ Electronic</span>
									</li>
								</ul>
							</div>
						</div>-->
					<!-- reviews -->
						<!--<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Customer Review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<span>5.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<span>4.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<span>3.5</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<span>3.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<i class="fa fa-star-o" aria-hidden="true"></i>
										<span>2.5</span>
									</a>
								</li>
							</ul>
						</div>-->
						<!-- //reviews -->
						<!-- price -->
						<!--<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Under $1,000</a>
									</li>
									<li class="my-1">
										<a href="#">$1,000 - $5,000</a>
									</li>
									<li>
										<a href="#">$5,000 - $10,000</a>
									</li>
									<li class="my-1">
										<a href="#">$10,000 - $20,000</a>
									</li>
									<li>
										<a href="#">$20,000 $30,000</a>
									</li>
									<li class="mt-1">
										<a href="#">Over $30,000</a>
									</li>
								</ul>
							</div>
						</div>-->
						<!-- //price -->
						<!-- discounts 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Discount</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">5% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">10% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">20% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">30% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">50% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">60% or More</span>
								</li>
							</ul>
						</div>-->
						<!-- //discounts -->
						<!-- offers 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Offers</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Exchange Offer</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">No Cost EMI</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Special Price</span>
								</li>
							</ul>
						</div>-->
						<!-- //offers -->
						<!-- delivery 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Eligible for Cash On Delivery</span>
								</li>
							</ul>
						</div>-->
						<!-- //delivery -->
						<!-- arrivals 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">New Arrivals</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 30 days</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 90 days</span>
								</li>
							</ul>
						</div>-->
						<!-- //arrivals -->
						<!-- Availability 
						<div class="left-side py-2">
							<h3 class="agileits-sear-head mb-3">Availability</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Exclude Out of Stock</span>
								</li>
							</ul>
						</div>-->
						<!-- //Availability -->
					<!--</div>
				</div>-->
				<!-- //product right -->
			</div>
		</div>
	</div>
	<!-- //top products -->
	<?php } else 
	{ ?>
		<div class="agileinfo-ads-display col-lg-12">
			<div class="wrapper">			
			<div class="row">
				<div class="col-md-12 product-men mb-5 mt-5">
					<div class="men-pro-item simpleCart_shelfItem">
						<h3 class="" style="color:gray;text-align:center;">NO PRODUCT FOUND</h3>
					</div>
				</div>
			</div>
			</div>
		</div>
												
								
	<?php }?>

	<!-- footer -->
	<?php require_once('footer.php');?>
	<!-- //footer -->
	<script >
	$(document).ready(function(){
		function filter_data()
		{
			$('.filter_data').html('<div id="loading" ></div>');
			var action ='fetch_data';
			var minimum_mrp = $('#hidden_minimum_mrp').val();
			var maximum_mrp = $('#hidden_maximum_mrp').val();
			var brand = get_filter('brand');		
			var cat = get_filter('cat');
			var ram = get_filter('ram');
			var storage = get_filter('storage');
			$.ajax({
				url:"model/Product/Product.php",
				method:"POST",
				data:{action:action,cat:cat,minimum_mrp:minimum_mrp,maximum_mrp:maximum_mrp,brand:brand,ram:ram,storage:storage},
				success:function(data){
					$('.filter_data').html(data);
				},
				error: function(errorThrown){
        			alert(errorThrown);
        			alert("There is an error with AJAX!");
    			}               

			});
		}
		function get_filter(class_name)
		{
			 var filter=[];
			 $('.'+class_name+':checked').each(function(){
				filter.push($(this).val());
			 });
			 return filter;
		}

		$('.common-selector').click(function(){
			//filter_data();
			if ($('.cat').is(':checked')) {
				filter_data();
				//alert('ready');
    		} else {
    		    alert('Please Select Category First.');
				$(this).attr('checked', false);
    		}
		});			
		
		
		$('#mrp_range').slider({
			range:true,
			min:500,
			max:90000,
			values:[500,500],
			step:500,
			slide:function(event,ui)
			{
				$('#mrp_show').html(ui.values[0]+'-'+ui.values[1]);
				$('#hidden_minimum_mrp').val(ui.values[0]);
				$('#hidden_maximum_mrp').val(ui.values[1]);	
				filter_data();
			} 
			
		});
		// $( "#mrp_range" ).slider({
        //        orientation:"vertical",
        //        value:50,
        //        slide: function( event, ui ) {
        //           $( "#mrp_show" ).val( ui.value );
        //        }	
        //     });

	});
</script>

</body>

</html>