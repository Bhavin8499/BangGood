<!doctype html>
<html lang="en">
<?php

     require_once(dirname(__FILE__)."/../model/Product/Product.php");
     
    global  $result_set; 
    if(isset($_REQUEST['pro_del']))
    {
        //echo $_REQUEST['pro_del'];
        $del_pro=new Product($_REQUEST['pro_del']);
        //echo $del_pro->name;
        $update_id=$del_pro->deleteProduct();
        //echo $update_id;
        header('location:showall.php');
    }

    if(isset($_REQUEST['pro_category']))
    {
        $result_set=getProduct('*',$_REQUEST['pro_category']); 
        //print_r($result_set);
        //echo "set";
    }
    else if(!isset($_REQUEST['pro_category']))
    {
        //echo "nathi set";
        $result_set=getAllProduct(); 
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
    <?php //$result_set=$pro->getAllProduct();	
      //$result_set=getAllProduct(); ?>
	<div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>S</span>how  
            <span>A</span>ll   
            <span>P</span>roduct</h3>
             <div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                   <div class="product-sec1 px-sm-4 px-4 py-sm-4 py-4 mb-4">
                    <div class="row justify-content-center align-items-center">
					    <div class="form-group form-inline">
                          <label for="">Select Category :</label>
                          <select class="form-control" name="pro_cat"  id="pro_cat" >
                            <option value='ALL' >ALL</option>
                            <option value=1 <?php if(isset($_REQUEST['pro_category'])){echo ($_REQUEST['pro_category']=='1' ? 'selected' : '');}?>>MOBILE</option>
                            <option Value=2 <?php if(isset($_REQUEST['pro_category'])){echo ($_REQUEST['pro_category']=='2' ? 'selected' : '');}?>>LAPTOP</option>
                            <option Value=3 <?php if(isset($_REQUEST['pro_category'])){echo ($_REQUEST['pro_category']=='3' ? 'selected' : '');}?>>ACCESSORIES</option>
                          </select>
                        </div>
                    </div>     
                    
                <div class="row" id="product">
                <?php for($i=0;$i<count($result_set);$i++){ ?>
                <div class="col-md-3 product-men  mt-5" >
                <div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item text-center" >
                            <?php $image=Unserialize($result_set[$i]['images']);?>
					<div style="height:250px; width:auto;">
			            	<img src=<?php echo '../'.$image[0];?>  style='height:auto; max-height:90%; width:auto; max-width: 90%;' alt=''>
						</div>  
					</div>
					<div class="item-info-product text-center border-top mt-4">
						<h4 class="pt-1"><a href="./single.php?pro_id=<?php echo $result_set[$i]['pro_id'];?>">
                        <?php echo "".ucfirst($result_set[$i]['name']);?>
                        </a>
                        </h4>
						<div class="info-product-price my-2">
							 INR: <span class="item_price"><?php echo $result_set[$i]['mrp'];?></span> |
							 Quantity:   <span><?php echo $result_set[$i]['qty'];?></span>
						</div>
                    </div>
                    <div class='col-md-6 col-md-12 mb-2'>
					<a href="editProduct.php?pro_id=<?php echo $result_set[$i]['pro_id'];?>"><input type="button" name="edit_Pro" value="Edit Product" class="button btn btn-secondary btn-sm" /></a>
                    <a href="?pro_del=<?php echo $result_set[$i]['pro_id'];?>"><input type="button" name="pro_del" value="Delete Product" class="button btn btn-danger btn-sm" /></a>
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
    <script>
                   var pro_cat=document.getElementById('pro_cat');
                    pro_cat.onchange=function(){
                        //alert(pro_cat.value);
                        //return pro_cat.value;
                        //$.post("showallProduct.php?",{pro_category:pro_cat.value});
                       /* $.ajax({
                                   url:"showallProduct.php", //Page with data
                                   data:{pro_category: pro_cat.value},
                                   type: "POST", //You can use any method POST, GET, DELETE, PUT...
                                   success:function(result){
                                      alert("\\\\"+result);
                                   }
                                });*/
                        if(pro_cat.value!=='ALL')
                        {
                         var url = "showallProduct.php?pro_category=" +pro_cat.value;
                         window.location.href = url;
                         }
                        else
                        {
                        var url = "showallProduct.php";
                         window.location.href = url;
                        }
                    };
    </script>
</body>
</html>