<?php
    if(!class_exists('Categories'))
    {
     require_once(dirname(__FILE__)."/../model/Categories/Categories.php");
    }
    if(isset($_POST['add_brand']))
    {
        
        $args = [
            "name" =>$_POST['brandname'],
            "parent"=>strtoupper($_POST['pro_cate']),
            "description"=>$_POST['brandDes']
        ];


        $result_set = addBrand($args);
        if($result_set>0)
           echo "<script>alert('Brand Added.');window.location='index.php';</script>";
        else
            echo "<script>alert('Some Error Occured Please Try Again Later...');</script>";
        unset($_POST['add_brand']);
    }
    $category=get_parent_categories();
?>
<div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="form-group form-inline">
                        <label for="" class="col-form-label">Select Category:</label>
                        <select class="form-control form-control-sm-2 custom-select" name="pro_cate" id="" required="true">
                                <option selected>Select Category</option>
                            <?php for($i=0;$i<count($category);$i++) {   ?>
                                    <option value="<?php echo $category[$i]->cateID; ?>"><?php echo $category[$i]->cateName; ?></option>
                            <?php } ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">New Brand Name:</label>
                        <input type="text" class="form-control" placeholder=" " id="brand_name" name="brandname" required=""/>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Description:</label>
                        <div class="form-group">
                          <input type="text" name="brandDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Optional*</small>
                        </div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" name="add_brand" class="form-control"  value="Add Brand">
                    </div>
                    <p class="text-center dont-do mt-3" > <a href="#" data-dismiss="modal">Cancel</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
