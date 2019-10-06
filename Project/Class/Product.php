<?php 
	/********************************************************************************************************
	******************************************** COMMENTS CLASS *********************************************
	********************************************************************************************************/

	/*    SCHEMA OF Products TABLE:
		  prod_id , name , price ,discount , discription , stock	*/
    require_once("Database.php");
	class Product{

		private $connection;
        function __construct()
        {
            global $database;//The 'global' is used to refer the variable that is defined outside the funtion.
            $this->connection = $database->getConnection();
        }
        function getAllProduct($columns)
        {
        	$sql = "SELECT $columns FROM bg_product";
        	$result_set = $this->connection->query($sql);

			if($this->connection->errno) {
				die("Error while getting product details : ".$this->connection->errno);
			}
			return $result_set;
        }
        function getProduct($prod_id,$columns){
            $sql = "SELECT $columns FROM  bg_product WHERE product_id = $prod_id";
            $result_set = $this->connection->query($sql);

            if($this->connection->errno) {
                die("Error while getting PRODUCT details : ".$this->connection->errno);
            }
            return $result_set;
        }
        function addProduct($name,$price, $discount, $disctiption, $stock)
        {
        	$sql = "INSERT INTO bg_product(name,price,discount, discription ,stock ) VALUES(?,?,?,?,?)";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("siisi",$name,$price, $discount, $disctiption, $stock);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE INSERTING PRODUCT: ".$this->connection->error);
        }
        function updateProduct($prod_id,$name,$price, $discount, $disctiption, $stock)
        {
        	$sql = "UPDATE bg_product SET name=? , price=? , discount=?, discription=? ,stock=? WHERE product_id = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("siisii", $name,$price, $discount, $disctiption, $stock, $prod_id);

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
        $pro = new Product();
    $result_set = $pro->addProduct("HTC",9000,15,"Touch Screen Android 9",10);
    echo $result_set;
	/*$result_set = $pro->updateProduct(1,"HTC CHAINA",9000,10,"Touch Screen Android 9",10);
	echo $result_set;
	$row =mysqli_fetch_assoc($result_set);
	extract($row);
    echo "".$row['name'];*/
    /*$result_set=$pro->deleteProduct(1); */
    //echo $result_set;
?>

