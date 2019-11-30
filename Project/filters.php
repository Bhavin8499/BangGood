<?php
	if(!class_exists('Categories'))
    {
     require_once(dirname(__FILE__)."/model/Categories/Categories.php");
	}
?>
<!-- product right -->
<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
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
				<input type="hidden" id="hidden_maximum_mrp" value="250000"/>
				<p id="mrp_show">500 - 2,50,000</p>
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
					<label><input type="checkbox" class="common-selector brand" value="Nokia" disable>Nokia</label></br>
					<label><input type="checkbox" class="common-selector brand" value="Oneplus" disable>OnePluse</label></br>
					<hr/>
					<label><input type="checkbox" class="common-selector brand" value="Lenovo">Lenovo</label></br>
					<label><input type="checkbox" class="common-selector brand" value="HP">HP</label></br>
					<label><input type="checkbox" class="common-selector brand" value="Macbook">Macbook</label></br>
					<label><input type="checkbox" class="common-selector brand" value="Dell">Dell</label></br>
					<hr/>
					<label><input type="checkbox" class="common-selector brand" value="Sandisk">Sandisk</label></br>
					<label><input type="checkbox" class="common-selector brand" value="Sony">Sony</label></br>
					<label><input type="checkbox" class="common-selector brand" value="Boat">Boat</label></br>
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
</div>
<!-- //product right-->