<?php 
	/*    SCHEMA OF Products TABLE:
          prod_id , name , price ,discount , discription , stock	
          
         /* pro_id,name,cat_id,mrp,discount,description,images,qty,can_buy,tags
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
            }
           
        }

        function getProduct($columns="*"){
         
            $sql = "SELECT ".$columns." FROM  product ";
         
            $result_set = $this->database->get_result($sql);

            return $result_set;
        }

        function updateProduct()
        {
            $query = "UPDATE ".Product::$table_name." SET name='".$this->name."',cat_id=".$this->cat_id.",mrp=".$this->mrp.",discount='".$this->discount."',description='".$this->description."',images='".$this->images."',qty=".$this->qty.",can_buy=".$this->can_buy.",tags='".$this->tags."' WHERE pro_id =".$this->pro_id;

            
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

        	$query = "UPDATE product SET qty=0 WHERE pro_id = ?";
            
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
        "tags"=>""
    ];

    $args = array_replace_recursive($def_arr, $args);

    $query = generate_insert_query($args, Product::$table_name);

    //echo $query;

    $insert_id = $dbObj->run_query($query);

    return $insert_id;
}
function getRecentProduct($columns='*',$cat_id){
    $sql = "SELECT ".$columns." FROM  product WHERE cat_id= ".$cat_id." ORDER BY pro_id DESC LIMIT 4";
    
    $dbObj = Database::getInstance();

    $result_set = $dbObj->get_results($sql);

    return $result_set;
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
*/



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

