<?php 
	/*    SCHEMA OF Products TABLE:
          prod_id , name , price ,discount , discription , stock	
          
         /* pro_id,name,cat_id,mrp,discount,description,images,qty,can_buy,tags
          pro_id,name,cat_id,brand,mrp,discount,description,images,qty,can_buy,tags
*/

    if(!class_exists('Database'))
    {
         require_once(dirname(__FILE__)."\..\Database\Database.php");
    }
    if(!function_exists('generate_insert_query'))
    {
        require_once(dirname(__FILE__)."\..\helper_functions.php");
    }
    class Product{

            public static $table_name = "product";
            public static $table_name_meta = "usermeta";
            public $pro_id = 0;
            public $name = "";
            public $cat_id =0;
            public $mrp =0;
            public $discount = 0;
            public $description = "";
            public $qty=0;
            public $images="";
            public $can_buy=0;
            public $tags="";
            public $brand="";
            
        
            public $connection;
            public $database;
    
        function __construct($args = 0)
        {
            $this->database = Database::getInstance();
            $this->connection = $this->database->conn;
            if(is_array($args))
            {
                $this->pro_id =$args['pro_id'];
                $this->name = $args['name'];
                $this->cat_id = $args['cat_id'];
                $this->mrp = $args['mrp'];
                $this->discount = $args['discount'];
                $this->description = $args['description'];
                $this->qty=$args['qty'];
                $this->images=$args['images'];
                $this->can_buy = $args['can_buy'];
                $this->tags = $args['tags'];
                $this->brand = $args['brand'];
            }
            else 
            {
                $sql = "SELECT * FROM  ".Product::$table_name." WHERE pro_id = ".$args;
                $result_set = $this->database->get_result($sql); 
                $this->pro_id=$result_set['pro_id'];
                $this->name=$result_set['name'];
                $this->cat_id=$result_set['cat_id'];
                $this->mrp=$result_set['mrp'];
                $this->discount=$result_set['discount'];
                $this->description=$result_set['description'];
                $this->qty=$result_set['qty'];
                $this->images=$result_set['images'];
                $this->can_buy=$result_set['can_buy'];
                $this->tags=$result_set['tags'];
                $this->brand = $result_set['brand'];
            }
           
        }

        function getPrice(){
            if($this->discount > 0)
                return round($this->mrp - ($this->mrp*$this->discount/100));
            return $this->mrp;
        }

        function getProduct($columns="*"){
         
            $sql = "SELECT ".$columns." FROM  product ";
         
            $result_set = $this->database->get_result($sql);

            return $result_set;
        }

        function updateProduct()
        {
            $query = "UPDATE ".Product::$table_name." SET name='".$this->name."',cat_id=".$this->cat_id.",brand=".$this->brand.",mrp=".$this->mrp.",discount='".$this->discount."',description='".$this->description."',images='".$this->images."',qty=".$this->qty.",can_buy=".$this->can_buy.",tags='".$this->tags."' WHERE pro_id =".$this->pro_id;

            $update_id = $this->database->run_query($query);        
            
            return $update_id;
    
        }
        
        function updateStock($prod_id , $stock)
        {
        	$sql = "UPDATE product SET stock=? WHERE product_id = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("ii", $stock , $prod_id);


            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE UPDATING PRODUCT QUANTITY: ".$this->connection->error);
        }

        function deleteProduct(){

        	$query = "UPDATE product SET qty=0 WHERE pro_id =".$this->pro_id;
            
            $update_id = $this->database->run_query($query);
        
            return $update_id;
        }


    }
function getAllProduct($columns='*')
{
    $sql = "SELECT ".$columns." FROM product";

    $dbObj = Database::getInstance();

 	$result_set = $dbObj->get_results($sql);
   
	return $result_set;
}
function getProduct($columns='*',$cat_id){
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id= ".$cat_id;
    
    $dbObj = Database::getInstance();

    $result_set = $dbObj->get_results($sql);

    return $result_set;
}
function addProduct($args=array())
{
    $dbObj = Database::getInstance();
    
    $def_arr = [
        "name" => "",
       "cat_id" => 0 ,
        "mrp" => 0,
        "discount" => 0,
        "description" => "",
        "images" => "",
        "qty" => 0,
        "can_buy" => 0,
        "tags"=>"",
        "brand"=>0
    ];

    $args = array_replace_recursive($def_arr, $args);

    $query = generate_insert_query($args, Product::$table_name);

    //echo $query;

    $insert_id = $dbObj->run_query($query);

    return $insert_id;
}
function getSearchedProduct($columns='*',$tag,$query)
{
   if($query=="All Mobile")
   {
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id = 1 ORDER BY pro_id";    
   }
   else if($query=="New Arrivals")
   {
    $sql = "SELECT ".$columns." FROM  product ORDER BY pro_id  DESC LIMIT 15";    
   }
   else if($query=="All Laptop")
   {
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id = 2 ORDER BY pro_id";    
   }
   else if($query=="All Accessories")
   {
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id = 3 ORDER BY pro_id";    
   }
   else 
   {
    $sql = "SELECT ".$columns." FROM  product WHERE (tags LIKE '%".$tag."%') OR (name LIKE '%".$query."%') ORDER BY pro_id";
    //$sql = "SELECT ".$columns." FROM  product WHERE (tags REGEXP '".$tag."') OR (name LIKE '%".$query."%') ORDER BY pro_id";
   }
    $dbObj = Database::getInstance();

    $result_set = $dbObj->get_results($sql);

    return $result_set;
}
function getRecentProduct($columns='*',$cat_id){
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id= ".$cat_id." ORDER BY pro_id DESC LIMIT 4";
    
    $dbObj = Database::getInstance();

    $result_set = $dbObj->get_results($sql);

    return $result_set;
}
if(isset($_POST["action"]))
 {
    //foreach ($_POST as $key => $value) { echo "Field ==== ".$key."   is === ".$value."<br>"; }
      
 $dbObj = Database::getInstance();
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
    $result_set = $dbObj->get_results($query);
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
                            <span class="item_price">'.round($result_set[$i]['mrp']-($result_set[$i]['mrp']*$result_set[$i]['discount']/100)).'</span>
                            <del>'.$result_set[$i]['mrp'].'</del>
                        </div>
                        <div class="snipcart-details single-item hvr-outline-out">
                            <button type="button"  value='.$result_set[$i]['pro_id'].' onclick="addToCart('.$result_set[$i]['pro_id'].')" >ADD TO CART</button>
                            <!--<input type="button" value="ADD TO CART" class="button btn">-->
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
            // $output .='<h3>No Such Product</h3>';
            $output .= '<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
        <div class="row">';
        
            $output .='
            <div class="col-md-4 product-men mt-3">
                <div class="men-pro-item simpleCart_shelfItem">
                    <h3 style="color:gray;text-align:center;">No Such Product</h3>
                </div>
            </div>';
            
        $output .= '</div>
            </div>';
        }
        echo $output;
}
    //$pro = new Product();

    /*$args = [
        "name" => "Google Pixel 4",
        "cat_id" => 1,
        "mrp" => 90000,
        "discount" => 10,
        "description" => "<p>Android 9</p>",
        "images" => "./images/gp4.jpg",
        "qty" => 10,
        "can_buy" => 1,
        "tags"=>"GOOGLE MOBILE"
        "brand"=>0
    ];*/

    //  addProduct($args);
    /*$pro->name="Samsung Galaxy J8";
    echo $pro->name;*/
    /*$result_set = $pro->addProduct("Redmi Go",1,4500,10,"<I>Loud Speaker</I><B>Android 8</B>","./images/migo.jpg",1,1,"Redmi,MI,MOBILE");
    echo $result_set;*/
    /*$result_set=$pro->getAllProduct();
	print_r ($result_set);

    echo "<br>";*/

   /*$result_set=$pro->updateProduct('Samsung Galaxy J7',1,13000,0,'<I>3500mah Bettery</I><BR><B>Android 9</B>','./images/sgJ2.jpg',3,1,'SAMSUNG,Mobile',1);
    echo $result_set;*/

    /*$result_set=$pro->getAllProduct('name,price');
	print_r ($result_set);*/

    /*$result_set=$pro->getProduct(1);
    print_r( $result_set);*/

    /*$result_set=$pro->getRecentProduct('name',1);
    for($i=0;$i<count($result_set);$i++)
    { echo "<br>".strtoupper($result_set[$i]['name']); }*/
    
    //echo __DIR__ ;
    /*$result_set=$pro->deleteProduct(1); 
    echo $result_set;*/

///////////////////////////////////////////////////////////////
/*
    $result_set=getAllProduct();
    print_r($result_set);
function*/

//////////////////////////////////////////////////////////////////////////////////////
/*
class Product{
     public $connection;
            public $database;
    
        function __construct($args = 0)
        {
            $this->database = Database::getInstance();
            $this->connection = $this->database->conn;
           
        }
         function getAllProduct($columns='*')
        {
        	$sql = "SELECT ".$columns." FROM product";
        	$result_set = $this->database->get_results($sql);

			if($this->connection->errno) {
				die("Error while getting product details : ".$this->connection->errno);
			}
			return $result_set;
        }


        function getProduct($pro_id,$columns="*"){
            $sql = "SELECT ".$columns." FROM  product WHERE pro_id = $pro_id";
            $result_set = $this->database->get_result($sql);

            return $result_set;
        }

        function getRecentProduct($columns='*',$cat_id){
            $sql = "SELECT ".$columns." FROM  product WHERE cat_id= ".$cat_id." ORDER BY pro_id DESC LIMIT 4";
            //echo $sql;
            $result_set = $this->database->get_results($sql);

            return $result_set;
        }
        function updateProduct($name,$cat_id,$mrp, $discount, $disctiption,$images,$qty,$can_buy,$tags,$pro_id)
        {
        	$sql = "UPDATE product SET name=?,cat_id=?,mrp=?,discount=?,description=? , images=?, qty=?, can_buy=?, tags=? WHERE pro_id = ?";
                      
        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            
           $preparedStatement->bind_param("siiissiisi",$name, $cat_id,$mrp, $discount, $disctiption,$images,$qty,$can_buy,$tags, $pro_id);
           
            
            if($preparedStatement->execute())
               {    
                   //echo $preparedStatement->affected_rows;               
                   return "true";
               }
            else
                die("ERROR WHILE UPDATING PRODUCTS: ".$this->connection->error);	

        }
        function addProduct($name,$cat_id,$mrp,$discount,$disctiption,$images,$qty,$can_buy,$tag)
        {
        	$sql = "INSERT INTO product(name,cat_id,mrp,discount,description,images,qty,can_buy,tags) VALUES(?,?,?,?,?,?,?,?,?)";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("siiissiis",$name,$cat_id,$mrp,$discount,$disctiption,$images,$qty,$can_buy,$tag);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE INSERTING PRODUCT: ".$this->connection->error);
        }


    }
        */


?>