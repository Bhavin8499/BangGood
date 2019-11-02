<?php 
    if(!class_exists('Database'))
    {
         require_once(dirname(__FILE__)."\..\Database\Database.php");
    }
class Cart{
    public static $table_name = "cart";
    public $user_id=0;
    public $name=""; // it could be wishlist/cart
    public $value="";

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
                $sql = "SELECT * FROM  ".Cart::$table_name." WHERE user_id = ".$args;
                $result_set = $this->database->get_result($sql); 
                $this->cart_id=$result_set['cart_id'];
                $this->pro_id=$result_set['pro_id'];
                $this->name=$result_set['name'];
                $this->value=$result_set['value'];
            }
    }
    function getCart(){
         
        $sql = "SELECT * FROM  cart WHERE name='cart'";
     
        $result_set = $this->database->get_result($sql);

        return $result_set;
    }

    function getWishlist(){
         
        $sql = "SELECT * FROM  cart WHERE name='wishlist'";
     
        $result_set = $this->database->get_result($sql);

        return $result_set;
    }
}
    