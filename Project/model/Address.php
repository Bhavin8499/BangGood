<?php

include("Database/Database.php");

class Address{

    public static $TABLE_NAME = "address";

    function __construct($args = 0){
       
        
        if(is_array($args)){
            $this->id = $args["id"];
            $this->user_id = $args["user_id"];
            $this->add_line1 = $args["add_line1"];
            $this->add_line2 = $args["add_line2"];
            $this->pincode = $args["pincode"];
            $this->city = $args["city"];
            $this->state = $args["state"];
        }
        else{
            $sql = "select * from ". Address::$TABLE_NAME ." where id=".$args;

            $dbObj = Database::getInstance();
            $result = $dbObj->get_result($sql);
            $this->id = $result["id"];
            $this->user_id = $result["user_id"];
            $this->add_line1 = $result["add_line1"];
            $this->add_line2 = $result["add_line2"];
            $this->pincode = $result["pincode"];
            $this->city = $result["city"];
            $this->state = $result["state"];
        }
    }

}

?>