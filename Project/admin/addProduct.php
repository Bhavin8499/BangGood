<!doctype html>
<html lang="en">
<?php
    require_once(dirname(__FILE__)."/../model/Product/Product.php");
    if(isset($_POST['pro_submit']))
    {
            $pro=new Product();

            $cat_id     =$_POST['pro_cat'];
            $name       =$_POST['pro_name'];
            $mrp        =$_POST['pro_price'];

            $description=$_POST['pro_discription'];
            $description = preg_replace("/\s+|\n+|\r/", ' ', $description);
            //echo htmlspecialchars($description);
        
            $tags       =$_POST['pro_tags'];
            $discount   =$_POST['pro_discount'];
            $qty        =$_POST['pro_quantity'];
            $can_buy    =$_POST['pro_canbuy'];

            if($can_buy=='on')
                $can_buy=1;

            $images='./images/sgs10.jpg';

            /*secho "<br>".$cat_id     ;echo "<br>".$name       ;echo "<br>".$mrp        ;
            echo htmlspecialchars($strDesc);echo "<br>".$tags       ;echo "<br>".$discount   ;echo "<br>".$qty        ;echo "<br>".$can_buy    ;*/
            $pro->addProduct($name,$cat_id,$mrp,$discount,$description,$images,$qty,$can_buy,$tags);
            
          
    }
?>
		<?php  $title = "Add Product"; ?>

	<!-- top-header -->
		<?php	require_once('header.php');?>
	<!-- //top-header -->

    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->

	<!-- Form -->
	<div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>A</span>dd 
            <span>N</span>ew 
            <span>P</span>roduct</h3>
             <div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                   <div class="product-sec1 px-sm-4 px-4 py-sm-4 py-4 mb-4">
				        <div class="row">
					    <div class="col-md-12 product-men mt-5">		
                        <form action="addProduct.php" method="post"  enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <label class="col-form-label">Category&nbsp;</label>
                            <select class="form-control custom-select form-control-sm" name="pro_cat" id="" required="true">
                               <option value=NULL>Select Category</option>
                               <option value=1>Mobile</option>
                               <option value=2>Laptop</option>
                             </select>
                        </div>
						<div class="form-group ">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" placeholder=" " name="pro_name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Price</label>
							<input type="number" class="form-control" placeholder=" " name="pro_price" required="">
                        </div>
                        <div class="form-group">
							<label class="col-form-label">Discription</label>
							<textarea  type="text" class="form-control"  name="pro_discription"  required=""></textarea>
                            <script type="text/javascript">             
                                        CKEDITOR.replace( 'pro_discription',
                                            {   //fullPage : true,
                                                //uiColor : '#efe8ce'
                                            });
                            </script>
                        </div>
                        <div class="form-group">
							<label class="col-form-label">Tags</label>
							<input type="text" class="form-control" placeholder=" " name="pro_tags"  required="">
                        </div>
						<div class="form-group">
							<label class="col-form-label">Images</label>
							<input type="file" class="form-control" placeholder=" " multiple="true" name="pro_images"  required="">
						</div>
                        
                        <div class="form-group form-inline col-md-4 col-md-12">
                           <label class="col-form-label  px-sm-0">Disount&nbsp;</label>
                            <input type="number" class="form-control" placeholder=" " min="0" max="80" name="pro_discount"  required="">
                            
                            <label class="col-form-label px-sm-4">Quantity</label>
                            <input type="number" class="form-control" placeholder=" " min="1" max="80" name="pro_quantity"  required="">
                    
                            <div class="form-check">
                              <label class="form-check-label px-sm-4">Can Buy - 
                                <input type="checkbox" class="form-control  form-check-input" name="pro_canbuy" id="" required="">
                              </label>
                            </div>
                        </div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="pro_submit" value="Submit">
						</div>
					</form>
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
