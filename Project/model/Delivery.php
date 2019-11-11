<?php

if(!class_exists("Database")){
    include("Database/Database.php");
}

class Delivery{

    public static $TABLE_NAME = "delivery";

    function __construct($order_id = -1, $user_id = -1)
    {
        if($order_id != -1){
            
            $sql = "select * from ". Delivery::$TABLE_NAME ." where ord_id=".$order_id;

            $dbObj = Database::getInstance();

            $res = $dbObj->get_result($sql);

            
            $this->id = $res["id"];	
            $this->user_id = $res["user_id"];	
            $this->ord_id = $res["ord_id"];	
            $this->status_list = $res["status_list"];	
            $this->is_delivered = $res["is_delivered"];

        }
        else{
            
        }
        
    }

    function genrate($user_id = -1, $order_id = -1){
        
        $sql = "INSERT INTO ".Delivery::$TABLE_NAME." (user_id, ord_id) VALUES ($user_id, $order_id);";
        
        $dbObj = Database::getInstance();
        $res = $dbObj->get_result($sql);

        $this->id = $dbObj->run_query($sql);

    }

    function insert_new_track_detail($key = "", $descritption =""){

        $arr = unserialize($this->status_list);
        
        if($arr == null){
            $arr = array();
        }

        array_push($arr, new DeliveryStatus($key, $descritption, date('d-M-Y')));

        $ser = serialize($arr);

        $sql = "update ".Delivery::$TABLE_NAME." set status_list=".$ser." where id=".$this->id;
        $dbObj = Database::getInstance();

        $res = $dbObj->run_query($sql);

    }

    function print_delivery_status(){

        $arr = unserialize($this->status_list);

        print_r($arr);

    }

}

class DeliveryStatus{

    public $key="";
    public $description="";
    public $date = "";

    function __construct($key, $description, $date)
    {
        $this->key = $key;
        $this->description = $description;
        $this->date = $date;
    }

    public function toJson() {
        return get_object_vars($this);
    }
    

}

?>