<!doctype html>
<html lang="en">
<?php  $title = "Product"; ?>

<!-- top-header -->
    <?php	require_once('header.php');?>
<!-- //top-header -->

<!-- navigation -->
<?php require_once('nevigation.php');?>
<!-- //navigation -->

<div class="tab-content ml-1" id="myTabContent">
                                    <div class="<% Response.Write(classLink1); %>" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                            <div style="margin:50px;">
                                                <div style="width:98%; box-shadow:-1px 1px 1px 1px Gray;" class="table-responsive">
                                                <table class="timetable_sub">
                                                    <tr style="border-bottom:1px;"><H5 style="font-size:medium; margin:20px; margin-top:30px;">Order No. :</H5></tr>
                                                    <tr>
                                                        <td><div style="width:150px; margin:10px;"><a href="#"><img src="../images/products/" style="width:50%;"/></a></div></td>
                                                        
                                                        <td style="width:200px;"><b></b><br /><span style="color:Gray; font-size:x-small;">Type :</span></td>
                                                        
                                                        <td style="width:100px;"><b><br /> x &nbsp; <br />_____________<br /></b></td>
                                                        
                                                        <td> <br />____________________________________________________<br /><br />____________________________________________________<br /></td>
                                                        <td style="width:100px;"><b><a href="">Edit Shipping Details</a></b></td>
                                                        
                                                    </tr>
                                                </table>
                                                </div>     
                                            </div>


                                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="width:98%">
					<div class="row">
					<div class="col-md-4 product-men">
               
                    <div class="col-md-4 product-men mt-md-0 mt-5">
                <div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item text-center" >
					<div style="height:250px; width:auto;">
				<img src='../images/products/" +  "' style='height:auto; max-height:90%; width:auto; max-width: 90%;' alt=''>
						</div><div class="men-cart-pro">
						<div class="inner-men-cart-pro">
				    		<a href="" class="link-product-add-cart">Quick Edit</a>
						</div>
						</div>
					</div>
					<div class="item-info-product text-center border-top mt-4">
						<h4 class="pt-1">
						</h4>
						<div class="info-product-price my-2">
							<span class="item_price"></span>
							<del></del>
						</div>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out" style="width:50%;">
						<a href=""><input type="button" name="submit" value="Edit Product" class="button btn" /></a>
							
						</div>
					</div>
				</div>
			</div>
        
                </div>
                </div>
             </div>
              </div>  

                                        <!--
                                        <div style="margin:50px;">
                                            <div style="width:98%; box-shadow:-1px 1px 1px 1px Gray;" class="table-responsive">
                                            <table class="timetable_sub">
                                                <tr style="border-bottom:1px;"><H5 style="font-size:medium; margin:20px; margin-top:30px;">Order No. : 78945612123</H5></tr>
                                                <tr>
                                                    <td><div style="width:150px; margin:10px;"><a href="#"><img src="images/product images/p3.jpeg" style="width:50%;"/></a></div></td>
                                                    
                                                    <td style="width:200px;"><b>Oppo F7</b><br /><span style="color:Gray; font-size:x-small;">Color : Grey</span></td>
                                                    
                                                    <td style="width:100px;"><b>$12364 <br /> x &nbsp; 5<br />_____________<br />50005</b></td>
                                                    
                                                    <td>Kishan Jinjariya<br />____________________________________________________<br />"Shakti Nivas", Chamunda Soc., Opp. Ranchhoddas Ashram, Kuvadava Road, Rajkot.<br />____________________________________________________<br />9913829112</td>
                                                    <td style="width:100px;"><b><a href="TrackOrder.aspx">Edit Shipping Details</a></b></td>
                                                    
                                                </tr>
                                            </table>
                                            </div>
                                         </div>
                                         -->
                                    </div>
    
<form action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="true">
    <input type="submit" value="Upload Image" name="submit">
</form>

    <!-- footer -->
    <?php require_once('footer.php');?>
	<!-- //footer -->
</body>
</html>	
<?php
$target_dir = "../images/";
//$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$allowTypes = array('jpg','png','jpeg','gif');
    
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    foreach($_FILES["fileToUpload"]["name"] as $key=>$val){
        $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"][$key]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$key]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
       echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"][$key] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
        }   
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "\nSorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"][$key]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
}
?>
                                    