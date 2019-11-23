<?php

if(!class_exists("Database")){
    include("Database/Database.php");
}

class Delivery{

    public static $TABLE_NAME = "delivery";

    public static $arrs = array("","Accepted", "In progress", "Reach Near Hub", "Out Of Delivery", "Delivered");

    function __construct($order_id = -1, $user_id = -1)
    {
        if($order_id != -1){
            
            $sql = "select * from ". Delivery::$TABLE_NAME ." where ord_id=".$order_id;

            $dbObj = Database::getInstance();

            $res = $dbObj->get_result($sql);

            if($res == null){
                $this->genrate($user_id, $order_id);

                $sql = "select * from ". Delivery::$TABLE_NAME ." where ord_id=".$order_id;
                $res = $dbObj->get_result($sql);

            }
            
            $this->id = $res["id"];	
            $this->user_id = $res["user_id"];	
            $this->ord_id = $res["ord_id"];	
            $this->status_list = $res["status_list"];	
            $this->is_delivered = $res["is_delivered"];

        }
        else{
            $this->genrate($user_id, $order_id);
            $this->user_id = $user_id;	
            $this->ord_id = $order_id;	
            $this->status_list = serialize(array());	
            $this->is_delivered = false;
        }
        
    }

    function genrate($user_id = -1, $order_id = -1){
        
        $sql = "INSERT INTO ".Delivery::$TABLE_NAME." (user_id, ord_id, status_list, is_delivered) VALUES ($user_id, $order_id, '".serialize(array())."', 'No');";
        
        $dbObj = Database::getInstance();
        //$res = $dbObj->get_result($sql);

        $this->id = $dbObj->run_query($sql);

    }

    function insert_new_track_detail($key = "", $descritption =""){

        $arr = unserialize($this->status_list);
        
        if($arr == null){
            $arr = array();
        }

        $del_stat = new DeliveryStatus($key, $descritption, date('d-M-Y'));

        array_push($arr, $del_stat->toJson());

        $ser = serialize($arr);

        $sql = "update ".Delivery::$TABLE_NAME." set status_list='".$ser."' where id=".$this->id;
        $dbObj = Database::getInstance();



        $res = $dbObj->run_query($sql);

    }

    function getDeliveryStatus(){

        $arr = array();
        
        $temp_arr = unserialize($this->status_list);

        if(is_array($temp_arr)){
            if(is_null($temp_arr)){
                return $arr;
            }
    
            foreach ($temp_arr as $var) {
                $del_stat = new DeliveryStatus($var['key'], $var['description'], $var['date']);
                array_push($arr, $del_stat);
            }
    
        }
        else
            return $arr;
        
        
        return $arr;
    }

    function print_delivery_status(){

        $arr = unserialize($this->status_list);

        if(is_array($arr)){

            foreach ($arr as $temp) {
                
                echo "Status : ".Delivery::$arrs[$temp["key"]]."<br>";
                echo "Description : ".$temp["description"]."<br>";
                echo "Date : ".$temp["date"]."<br>"."<hr>";

            }


        }   
        else{

            $def = get_default_status();

            echo "Status : ".Delivery::$arrs[$def->key]."<br>";
            echo "Description : ".$def->description."<br>";
            echo "Date : ".$def->date."<br>"."<hr>";
        }


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

function getDeliveryFromOrderID($order_id){

    $dbObj = Database::getInstance();
    $res = $dbObj->get_result("select * from delivery where ord_id=".$order_id);

    $del = new Delivery($order_id, $res["user_id"]);

    return $del;

}

function get_default_status(){
    $del_stat = new DeliveryStatus("1", "Waiting For Approval", "00-00-0000");
    return $del_stat;
}

?>