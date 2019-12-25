<?php 
    if(!class_exists('Database'))
    {
         require_once(dirname(__FILE__)."/../Database/Database.php");
    }
    if(!function_exists('generate_insert_query'))
    {
        require_once(dirname(__FILE__)."/../helper_functions.php");
    }
class Cart{
    public static $table_name = "cart";
    public $user_id=0;
    public $cart_id=0;
    public $name=""; // it could be wishlist/cart
    public $value="";
    
    public $result_set;
    public $connection;
    public $database;
    
    function __construct($args = 0)
    {
            $this->database = Database::getInstance();
            $this->connection = $this->database->conn;
            if(is_array($args))
            {
                
            }
            else
            {   
                $this->user_id = $args;
                $sql = "SELECT * FROM  ".Cart::$table_name." WHERE user_id = ".$this->user_id;
                $this->result_set = $this->database->get_result($sql); 
                if(!empty($this->result_set))
                {
                    $this->cart_id=$this->result_set['cart_id'];
                    $this->name=$this->result_set['name'];
                    $this->value=$this->result_set['value'];
                }
            }
    }
    function getCart(){
         
        $modelArr = array();

        $cartArr = (array)json_decode($this->value,true);

        foreach ($cartArr as $product) {
            $cartItem = new CartProduct($product);
            array_push($modelArr, $cartItem);
        }


        return $modelArr;
    }
    function deleteProduct($id){
        $value = (array)json_decode($this->value,true);
        
        foreach($value as $key=>$row){
            if($row['pro_id'] == $id){
              unset($value[$key]);
            }
        }

        $value = array_values($value);

        //print_r($value);

        $this->value = json_encode($value,true) ;

        $query = "UPDATE cart set value = '".$this->value."' WHERE cart_id =".$this->cart_id;
        
        //echo $query;

        $update_id = $this->database->run_query($query);

        return $update_id;  
    
    }

    function updateQuantity($cart_id,$proct_id,$qty)
    {
        $value = $this->value;
       
        $value = (array)json_decode($value,true);
        
        foreach($value as $key=>$row){
            if($row['pro_id'] == $proct_id){
                $value[$key]['qty'] = (int)$qty;
                //echo "true";
                $flag=1;
            }
        }
        
        $value = json_encode($value);

        $this->value = $value;

        $query = "UPDATE cart set value = '".$this->value."' WHERE cart_id =".$cart_id;
    
        //echo $query;
        $update_id = $this->database->run_query($query);

        return $update_id;  
    }

    function getWishlist(){
         
        $sql = "SELECT * FROM  cart WHERE name='wishlist' AND cart_id =".$this->cart_id;
     
        $result_set = $this->database->get_result($sql);

        return $result_set;
    }

    function getTotalProduct(){

        $arr = $this->getCart();

        $counter = 0;

        foreach($arr as $prod){
            $counter += $prod->qty;
        }

        return $counter;

    }

    function removeAllCartProduct(){

        $query = "Delete from ". Cart::$table_name ." where cart_id=".$this->cart_id;

        $dbObj = Database::getInstance();

        $dbObj->run_query($query);

    }


}
function addProductCart($user_id,$type,$product)
{
    $cart = new Cart($user_id);
    if(!empty($cart->result_set))
    {
        $flag=0;

        $value = $cart->value;
       
        $value = (array)json_decode($value,true);
        
        foreach($value as $key=>$row){
            if($row['pro_id'] == $product['pro_id']){
                $value[$key]['qty'] +=1;
                //echo "true";
                $flag=1;
            }
        }
        if($flag==0){array_push($value,$product);}
        
        $value = json_encode($value);

        $cart->value = $value;

        $query = "UPDATE cart set value = '".$value."' WHERE cart_id =".$cart->cart_id;
    
        $update_id = $cart->database->run_query($query);

        return $update_id;  
    
    }
    else
    {   
        $value = array();
        
        array_push($value,$product);
        //print_r($value);
        
        $value = json_encode($value);
        
        $args = [
           "user_id" => $user_id ,
           "name" => $type,
           "value" => $value,
        ];
    
        $query = generate_insert_query($args, Cart::$table_name);
        
        $insert_id = $cart->database->run_query($query);

        return $insert_id;  
    }
}
/// --------------- DONT CHANGE THE BELLOW CODE ITS FOR AJAX -------------------////

if(isset($_POST['action']))
{
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : "ERROR";
    $pro_id = isset($_POST['pro_id']) ? $_POST['pro_id'] : "ERROR";
    
    if($_POST['action']=='update_quantity')
    {
        $qty = isset($_POST['qty']) ? $_POST['qty'] : "ERROR";
        $cart_id = isset($_POST['cart_id']) ?  $_POST['cart_id'] : "ERROR";
        $cart = new Cart($user_id);
        $cart->updateQuantity($cart_id,$pro_id,$qty);
    }
    if($_POST['action']=='insert_cart')
    {
        $type = isset($_POST['type']) ? $_POST['type'] : "ERROR" ;
        $product=array("pro_id"=>$pro_id,"qty"=>1);
        $result_set=addProductCart($user_id,$type,$product);
        echo $result_set;
    }
}


/*
$r=array("pro_id"=>3,"qty"=>2);
$p=array(array("pro_id"=>1,"qty"=>2),array("pro_id"=>2,"qty"=>1));
echo print_r($p)."<br>";
array_push($p,$r);
print_r($p);
$p=json_encode($p);
echo $p."<br>";
$p=(array)json_decode($p,true);
for($i=0;$i<count($p);$i++)
{
    echo"<br>";
    print_r($p[$i]); 
    foreach($p[$i] as $key => $val)
    {
        echo "<br>".$key."===".$val;
    }
}


foreach($p as $key=>$row){
    if($row['pro_id'] == 2){
      unset($p[$key]);
    }
}        
echo "<br>";
print_r($p);
*/

// $p=array("pro_id"=>2,"qty"=>1);
// $r=addProductCart(1,"cart",$p);
// echo $r;

//$cart = new Cart(1);
//$r=$cart->getCart();
//print_r($r);
//$cart->deleteProduct(8);*/
//$cart->updateQuantity(4,11,3);


class CartProduct{

    function __construct($args = array()){

        $this->product_id = $args["pro_id"];
        $this->qty = $args["qty"];

    }

}

?>