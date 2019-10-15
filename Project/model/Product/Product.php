<?php 
	/*    SCHEMA OF Products TABLE:
		  prod_id , name , price ,discount , discription , stock	*/
    require_once("C:\\xampp\htdocs\BangGood\Project\model\Database\Database.php");
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
        	$sql = "SELECT ".$columns." FROM bg_product";
        	$result_set = $this->database->get_results($sql);

			if($this->connection->errno) {
				die("Error while getting product details : ".$this->connection->errno);
			}
			return $result_set;
        }


        function getProduct($prod_id,$columns){
            $sql = "SELECT ".$columns." FROM  bg_product WHERE product_id = $prod_id";
            $result_set = $this->database->get_result($sql);

            return $result_set;
        }

        function getRecentProduct($columns='*',$category){
            $sql = "SELECT ".$columns." FROM  bg_product WHERE category= '".$category."' ORDER BY product_id DESC LIMIT 4";
            //echo $sql;
            $result_set = $this->database->get_results($sql);

            return $result_set;
        }


        function addProduct($name,$price, $discount, $disctiption,$category, $stock)
        {
        	$sql = "INSERT INTO bg_product(name,price,discount, discription ,category,stock ) VALUES(?,?,?,?,?,?)";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("siissi",$name,$price, $discount, $disctiption, $category,$stock);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE INSERTING PRODUCT: ".$this->connection->error);
        }



        function updateProduct($prod_id,$name,$price, $discount, $disctiption, $category,$stock)
        {
        	$sql = "UPDATE bg_product SET name=? , price=? , discount=?, discription=? ,category=? ,stock=? WHERE product_id = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("siissii", $name,$price, $discount, $disctiption, $category,$stock, $prod_id);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE UPDATING PRODUCTS: ".$this->connection->error);	

        }



        function updateStock($prod_id , $stock)
        {
        	$sql = "UPDATE bg_product SET stock=? WHERE product_id = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("ii", $stock , $prod_id);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE UPDATING PRODUCT QUANTITY: ".$this->connection->error);
        }



        function deleteProduct($prod_id){

        	$sql = "UPDATE bg_product SET stock=0 WHERE product_id = ?";

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

    /*$pro = new Product();
    /*$result_set = $pro->addProduct("acer",25000,5,"amd, 256GB, 4GB","laptop",02);
    echo $result_set;*/

    /*$result_set=$pro->getAllProduct();
	print_r ($result_set);

    echo "<br>";

    $result_set=$pro->getAllProduct('name,price');
	print_r ($result_set);*/

    /*$result_set=$pro->getProduct(1,'name,price');
    print_r( $result_set);*/
    
    /*$result_set=$pro->getRecentProduct('product_id,name','mobile');
    for($i=0;$i<count($result_set);$i++)
    { echo "<br>".strtoupper($result_set[$i]['name']); }

    echo __DIR__ ;
    /*$result_set=$pro->deleteProduct(1); 
    echo $result_set;*/

///////////////////////////////////////////////////////////////
/*
    $result_set=getAllProduct();
    print_r($result_set);
*/
?>

