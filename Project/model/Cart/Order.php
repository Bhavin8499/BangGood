<?php

if(!class_exists('Database')){
    include(dirname(__FILE__)."/../Database/Database.php");
}
if(!class_exists('Product')){
    include(dirname(__FILE__)."/../Product/Product.php");
}
if(!class_exists('Cart')){
    include("Cart.php");
}
if(!function_exists('generate_insert_query')){
    include(dirname(__FILE__)."../helper_functions.php");
}


class Order{

    public static $TABLE_NAME_ORDER = "orders";
    public static $TABLE_NAME_ORDER_PRODUCT = "order_products";

    function __construct(){

        $this->order_id = 0;
        $this->user_id = 0;
        $this->name = "";
        $this->address = "";
        $this->contact_num = "";
        $this->order_status = "";
        $this->deli_id = "";
        $this->payment_type = "";
        $this->payment_status = "";
        $this->order_note = "";

    }

    function setOrderDetails($args = array()){

        if(is_array($args)){

        $def_args = [
            "oid" => 0,
            "user_id" => 0,
            "name" => "",
            "address" => 0,
            "contact_num" => "0",
            "order_status" => "Need Approval",
            "deli_id" => 0,
            "payment_type" => "COD",
            "payment_status" => "Remain",
            "order_note" => "",
        ];

        $args = array_replace_recursive($def_args, $args);

        $this->order_id = $args["oid"];
        $this->user_id = $args["user_id"];
        $this->name = $args["name"];
        $this->address = $args["address"];
        $this->contact_num = $args["contact_num"];
        $this->order_status = $args["order_status"];
        $this->deli_id = $args["deli_id"];
        $this->payment_type = $args["payment_type"];
        $this->payment_status = $args["payment_status"];
        $this->order_note = $args["order_note"];
    }
   

    }

    function generateOrder($args = array()){
        //user_id	name	address	contact_num	order_status	deli_id	payment_type	payment_status	order_note

        $def_args = [
            "user_id" => 0,
            "name" => "",
            "address" => 0,
            "contact_num" => "0",
            "order_status" => "Need Approval",
            "deli_id" => 0,
            "payment_type" => "COD",
            "payment_status" => "Remain",
            "order_note" => "",
        ];

        $args = array_replace_recursive($def_args, $args);

        $dbObj = Database::getInstance();
        $sql = generate_insert_query($args, Order::$TABLE_NAME_ORDER);
        $this->order_id = $dbObj->run_query($sql);

    }

    function getProducts(){
        $dbObj = Database::getInstance();
        $query = "select * from ". Order::$TABLE_NAME_ORDER_PRODUCT . " where ord_id=".$this->order_id;
       
        $result = $dbObj->get_results($query);
        
        $arrProducts = array();

        foreach ($result as $product) {
            $model = new OrderProduct($product);
            array_push($arrProducts, $model);
        }

        return $arrProducts;
    }

    function getOrderProductCount(){

        $arr = $this->getProducts();

        $count = 0;

        foreach ($arr as $prod) {
            $count += $prod->qty;
        }
        
        return $count;

    }

    function getTotalPriceOfProducts(){
        $arr = $this->getProducts();

        $count = 0;

        foreach ($arr as $prod) {
            $count += $prod->qty * $prod->price;
        }
        
        return $count;
    }

function getAddress(){

    $address = new Address($this->address);
    return $address;
}

    function checkOutCart( $cart = array()){

        try {
            $dbObj = Database::getInstance();
            $ord_id = $this->order_id;
            
            foreach ($cart as $cart_product) {
                
                $product = new Product($cart_product->product_id);
                $qty = $cart_product->qty;
                $price = $product->getPrice();

                $args = [
                    "ord_id" => $ord_id,
                    "pro_id" => $cart_product->product_id,
                    "qty" => $qty,
                    "price" => $price
                ];
                

                $query = generate_insert_query($args, Order::$TABLE_NAME_ORDER_PRODUCT);

                $dbObj->run_query($query);

                $query = "update product set qty=qty-".$qty." where pro_id=".$cart_product->product_id;
                $dbObj->run_query($query);

            }
            return true;
        } 
        catch (Throwable $th) {
            echo $th->getMessage();
            return false;
        }
        


    }

    
}

class OrderProduct{

    function __construct($args){

        $this->id = $args["id"];
        $this->ord_id = $args["ord_id"];
        $this->pro_id = $args["pro_id"];
        $this->qty = $args["qty"];
        $this->price = $args["price"];

    }

}

function getAllOrders(){

    $query = "select * from ". Order::$TABLE_NAME_ORDER ." order by oid desc";

    $orders = array();

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($query);

    foreach ($result as $orderArgs) {
        
        $order = new Order();
        $order->setOrderDetails($orderArgs);
        array_push($orders, $order);

    }

    return $orders;

}

function getRemainingOrders(){

    $query = "select * from ". Order::$TABLE_NAME_ORDER ." where oid in (select ord_id from delivery where is_delivered='No') order by oid desc";

    $orders = array();

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($query);

    foreach ($result as $orderArgs) {
        
        $order = new Order();
        $order->setOrderDetails($orderArgs);
        array_push($orders, $order);

    }

    return $orders;

}

function getAllDeliveredOrders(){

    $query = "select * from ". Order::$TABLE_NAME_ORDER ." where oid in (select ord_id from delivery where is_delivered='Yes') order by oid desc";

    $orders = array();

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($query);

    if(!is_array($result))
        return $orders;

    foreach ($result as $orderArgs) {
        
        $order = new Order();
        $order->setOrderDetails($orderArgs);
        array_push($orders, $order);

    }

    return $orders;

}

function getOrderByUserID( $id = 0){

    $query = "select * from ". Order::$TABLE_NAME_ORDER ." where user_id=".$id." order by oid desc";

    $orders = array();

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($query);

    if(!empty($result))
    { 
        foreach ($result as $orderArgs) {
            
            $order = new Order();
            $order->setOrderDetails($orderArgs);
            array_push($orders, $order);

        }
    }
    return $orders;

}

function getOrderByID($order_id=0){

    $query = "select * from ". Order::$TABLE_NAME_ORDER ." where oid=".$order_id;
    $dbObj = Database::getInstance();
    $result = $dbObj->get_result($query);

    $order = new Order();

    $order->setOrderDetails($result);

    return $order;
}

function getRemainingPaymentOrder($deli_id = 0){

    $sql = "select * from  orders where deli_id=".$deli_id." and payment_status='Remain' and payment_type='COD' order by oid desc";

    $orders = array();

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($sql);

    if(!is_array($result))
        return $orders;

    foreach ($result as $orderArgs) {
        
        $order = new Order();
        $order->setOrderDetails($orderArgs);
        array_push($orders, $order);

    }

    return $orders;

}

?>