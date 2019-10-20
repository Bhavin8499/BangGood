<?php 
	/*    SCHEMA OF Products TABLE:
          prod_id , name , price ,discount , discription , stock	
          
          pro_id,name,cat_id,mrp,discount,description,images,qty,can_buy,tags
*/

    require_once(dirname(__FILE__)."\..\Database\Database.php");
    class Product{

        
        public $connection;
        public $database;
    
        function __construct()
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



        function updateProduct($name,$cat_id,$mrp, $discount, $disctiption,$images,$qty,$can_buy,$tags,$pro_id)
        {
        	$sql = "UPDATE product SET name=?,cat_id=?,mrp=?,discount=?,description=? , images=?, qty=?, can_buy=?, tags=? WHERE pro_id = ?";
                      
        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            
           $preparedStatement->bind_param("siiissiisi",$name, $cat_id,$mrp, $discount, $disctiption,$images,$qty,$can_buy,$tags, $pro_id);
           
            
            if($preparedStatement->execute())
               {    
                   echo $preparedStatement->affected_rows;               
                   return "true";
               }
            else
                die("ERROR WHILE UPDATING PRODUCTS: ".$this->connection->error);	

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



        function deleteProduct($prod_id){

        	$sql = "UPDATE product SET qty=0 WHERE pro_id = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
                die($this->connection->error);

            $preparedStatement->bind_param("i",$prod_id);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE DELETING PRODUCT: ".$this->connection->error);
        }


    }
function getAllProduct($columns='*')
{


       $sql = "SELECT ".$columns." FROM bg_product";
       $dbObj = Database::getInstance();
 	    $result_set = $dbObj->get_results($sql);
   
	return $result_set;
}

    //$pro = new Product();
    /*$result_set = $pro->addProduct("Redmi Go",1,4500,10,"<I>Loud Speaker</I><B>Android 8</B>","./images/migo.jpg",1,1,"Redmi,MI,MOBILE");
    echo $result_set;*/
    /*$result_set=$pro->getAllProduct();
	print_r ($result_set);

    echo "<br>";*/

  /*  $result_set=$pro->updateProduct('Samsung Galaxy J7',1,13000,0,'<I>3500mah Bettery</I><BR><B>Android 9</B>','./images/sgJ2.jpg',3,0,'SAMSUNG',1);
    echo $result_set;
*/
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
?>

