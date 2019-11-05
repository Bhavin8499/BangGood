<?php 
 if(!class_exists('Database'))
 {
      require_once(dirname(__FILE__)."\..\Database\Database.php");
 }
 if(isset($_POST["action_from_filter"]))
 {
    //foreach ($_POST as $key => $value) {
    //echo "Field ==== ".$key."   is === ".$value."<br>";
    //}
 $database = Database::getInstance();
 $connection = $database->conn;

 $query = "SELECT * FROM PRODUCT WHERE CAN_BUY=1 ";
    if(isset($_POST["cat"]))
    {
         $cat_filter=implode("|",$_POST["cat"]);
        //$query .= "AND name LIKE ('%".$brand_filter."%') ";
        $query .= "AND cat_id REGEXP  '".$cat_filter."' ";
    } 
    if(isset($_POST["minimum_mrp"],$_POST["maximum_mrp"]) && !empty($_POST["minimum_mrp"]) && !empty($_POST["maximum_mrp"]))
    {
        $query .= "AND mrp BETWEEN '".$_POST["minimum_mrp"]."' AND '".$_POST["maximum_mrp"]."' ";
    }
    if(isset($_POST["brand"]))
    {
        $brand_filter=implode("|",$_POST["brand"]);
        //$query .= "AND name LIKE ('%".$brand_filter."%') ";
        $query .= "AND name REGEXP  '".$brand_filter."' ";
    }
    if(isset($_POST["ram"]))
    {
        $ram_filter=implode("|",$_POST["ram"]);
        //$query .= "AND description LIKE '%".$ram_filter."%' ";
        $query .= "AND description REGEXP '".$ram_filter."' ";

    }
    if(isset($_POST["storage"]))
    {
        $storage_filter=implode("|",$_POST["storage"]);
        //$query .= "AND description LIKE '%".$storage_filter."%' ";
        $query .= "AND description REGEXP '".$storage_filter."' ";
    }

    //print $query;
    $result_set = $database->get_results($query);
    $output = '';
    if(!empty($result_set))
    {
        $output .= '<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
        <div class="row">';
        for($i=0;$i<count($result_set);$i++)
        {
            $image=Unserialize($result_set[$i]["images"]);
            $output .='
            <div class="col-md-4 product-men mt-3">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item text-center">
                        <img src='.$image[0].' alt=""  style="height:275px; max-width:250px;" >
                    </div>
                    <div class="item-info-product text-center border-top mt-4">
                        <h4 class="pt-1">
                            <a href="./single.php?pro_id='.$result_set[$i]['pro_id'].'">'.ucfirst($result_set[$i]['name']).'</a>
                        </h4>
                        <div class="info-product-price my-2">
                            <span class="item_price">'.$result_set[$i]['mrp'].'</span>
                            <del>'.$result_set[$i]['mrp'].'+500</del>
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="business" value="" />
                                    <input type="hidden" name="item_name" value="'.ucfirst($result_set[$i]['name']).'" />
                                    <input type="hidden" name="amount" value="'.$result_set[$i]['mrp'].'" />
                                    <input type="hidden" name="image_path" value="'.$image[0].'" />                                                        
                                    <input type="hidden" name="discount_amount" value="" />
                                    <input type="hidden" name="currency_code" value="INR" />
                                    <input type="hidden" name="return" value="" />
                                    <input type="hidden" name="cancel_return" value="" />
                                    <input type="submit" name="submit" value="Add to cart" class="button btn" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>';
            }
        $output .= '</div>
            </div>';
        }
        else
        {
            $output .='<h3>No Such Product</h3>';
        }
        echo $output;
}
?>