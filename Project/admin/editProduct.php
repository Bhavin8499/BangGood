<!doctype html>
<html lang="en">
<?php
   
    if(!class_exists('Product'))
    {
     require_once(dirname(__FILE__)."/../model/Product/Product.php");
    }

    if(isset($_REQUEST['pro_id']))
    {
        if(!empty($_REQUEST['pro_id']))
         {   
             $pro=new Product($_REQUEST['pro_id']);
             //$pro_id=(int)$_REQUEST['pro_id'];
             //$result_set = $pro->getProduct($_REQUEST['pro_id']);
             //$result_set = $pro->getProduct();
         }
       
    }
    else{
        echo "<center><h3>Please come from proper way</h3></center>";
        }


    if(isset($_POST['pro_update']))
    {
            $pro=new Product($_POST['id']);

            $errors = array();
            $uploadedFiles = array();
            $extension = array("jpeg","jpg","png","gif");
            $bytes = 1024;
            $KB = 1024;
            $totalBytes = $bytes * $KB;
            $UploadFolder = "./images";
            $imagesDB="";
            $counter = 0;
            
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
                $temp = $_FILES["files"]["tmp_name"][$key];
                $name = $_FILES["files"]["name"][$key];
                if(empty($temp)){break;}
                
                $counter++;
                $UploadOk = true;
                
                if($_FILES["files"]["size"][$key] > $totalBytes)
                {
                    $UploadOk = false;
                    array_push($errors, $name." file size is larger than the 1 MB.");
                }
                
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                if(in_array($ext, $extension) == false){
                    $UploadOk = false;
                    array_push($errors, $name." is invalid file type.");
                }
                
                if(file_exists($UploadFolder."/".$name) == true){
                    $UploadOk = false;
                    array_push($errors, $name." file is already exist.");
                }
                
                if($UploadOk == true){
                    move_uploaded_file($temp,".".$UploadFolder."/".$name);
                    //echo $UploadFolder."/".$name;
                    array_push($uploadedFiles, $UploadFolder."/".$name);
                }
            }
            if($counter>0){
                if(count($errors)>0)
                {
                    echo "<b>Errors:</b>";
                    echo "<br/><ul>";
                    foreach($errors as $error)
                    {
                        echo "<li>".$error."</li>";
                    }
                    echo "</ul><br/>";
                }
                //print_r($uploadedFiles);
                $imagesDB=serialize($uploadedFiles);
                //echo "<br>";
                //print_r($imagesDB);
                //$imagesDB=Unserialize($imagesDB);echo "<br>";
                //print_r($imagesDB);
            }
            else{
                echo "Please, Select file(s) to upload.";
            }



            $pro->cat_id     = $_POST['pro_cat'];
            $pro->name       = $_POST['pro_name'];
            $pro->mrp        = $_POST['pro_price'];

            $description    = $_POST['pro_discription'];
            
            $description =  preg_replace("/\s+|\n+|\r/",' ', $description);
            // //echo htmlspecialchars($description);
            
            $pro->description = $description;

            $pro->tags       = $_POST['pro_tags'];
            $pro->discount   = $_POST['pro_discount'];
            $pro->qty        = $_POST['pro_quantity'];
            $can_buy    = $_POST['pro_canbuy'];

            if($can_buy=='on')
                    $pro->can_buy=1;
            else
                    $pro->can_buy=0;
            
            $pro->images=$imagesDB;

            $result_set=$pro->updateProduct();
            
            //echo $result_set;
            header('location:editProduct.php?pro_id='.$pro->pro_id);
          
    }
    
    
?>
		<?php  $title = "Edit Product"; ?>

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
            <span>E</span>dit 
            <span>P</span>roduct</h3>
             <div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                   <div class="product-sec1 px-sm-4 px-4 py-sm-4 py-4 mb-4">
				        <div class="row">
					    <div class="col-md-12 product-men mt-5">		
                    <form action="editProduct.php" method="post" enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <label class="col-form-label">Category&nbsp;</label>
                            <select class="form-control custom-select form-control-sm" name="pro_cat" id="" required="true">
                               <option value=NULL>Select Category</option>
                               <option value=1 <?php echo ($pro->cat_id =='1' ? 'selected' : '');?>>Mobile</option>
                               <option value=2 <?php echo ($pro->cat_id =='2' ? 'selected' : '');?>>Laptop</option>
                               <option value=3 <?php echo ($pro->cat_id =='3' ? 'selected' : '');?>>Accessories</option>
                             </select>
                        </div>
						<div class="form-group ">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" placeholder=" " name="pro_name" value="<?php echo $pro->name;?>" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Price</label>
							<input type="number" class="form-control" placeholder=" " min=0  name="pro_price" value="<?php echo $pro->mrp;?>" required="true"></div>
                        <div class="form-group">
							<label class="col-form-label">Discription</label>
							<textarea  type="text" class="form-control"  name="pro_discription" value="<?php echo $pro->description;?>" required="true"></textarea>
                            
                            <script type="text/javascript">             

                                            CKEDITOR.replace( 'pro_discription',
                                            {   //fullPage : true,
                                                //uiColor : '#efe8ce'
                                            });
                                            var data="<?php echo $pro->description;?>";
                                            CKEDITOR.instances.pro_discription.setData(data, function()
                                            {
                                                this.checkDirty();  // true
                                            });
                            </script>
                        </div>
                        <div class="form-group">
							<label class="col-form-label">Tags</label>
							<input type="text" class="form-control" placeholder=" " name="pro_tags" value="<?php echo $pro->tags;?>"  required="">
                        </div>
						<div class="form-group">
							<label class="col-form-label">Images</label>
                            <input type="file" class="form-control" placeholder=" " multiple="true" name="files[]" value="<?php echo Unserialize($pro->images);?>" id="fileupload" >
                            <div id="dvPreview"></div>
						</div>
                        
                        <div class="form-group form-inline col-md-4 col-md-12">
                           <label class="col-form-label  px-sm-0">Disount&nbsp;</label>
                            <input type="number" class="form-control" placeholder=" " min="0" max="80" name="pro_discount" value="<?php echo $pro->discount;?>" required="">
                            
                            <label class="col-form-label px-sm-4">Quantity</label>
                            <input type="number" class="form-control" placeholder=" " min="1" max="80" name="pro_quantity" value="<?php echo $pro->qty;?>" required="">
                    
                            <div class="form-check">
                              <label class="form-check-label px-sm-4">Can Buy - 
                                <input type="checkbox" class="form-control  form-check-input" name="pro_canbuy" id="" <?php echo ($pro->can_buy =='1' ? 'checked' : '');?> />
                              </label>
                            </div>
                        </div>
						<div class="form-group form-inline col-md-6 col-md-12 ">
							<input type="submit" class="form-control button btn btn-primary" name="pro_update" value="Update">&nbsp;
                            <input type="hidden" name="id" value="<?php echo $pro->pro_id;?>">
                            <a href="showallProduct.php"><input type="button" name="return" value="Cancel" class="button btn btn-danger" /></a>
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
    <script language="javascript" type="text/javascript">
        window.onload = function () {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "250";
                                img.width = "175";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
    </script>
</body>
</html>	