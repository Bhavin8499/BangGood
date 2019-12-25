<?php

if(!class_exists("Database"))
    include("Database/Database.php");
if(!function_exists("generate_insert_query"))
    include("helper_functions.php");

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


function createNewAddress($args = array()){

    $def_args = array(
        "user_id" => 0,
        "add_line1" => "",
        "add_line2" => "",
        "pincode" => "000000",
        "city" => "Not Provided",
        "state" => "Not Provided",
    );

    $args= array_replace_recursive($def_args, $args);

    $dbObj = Database::getInstance();

    $sql = generate_insert_query($args, Address::$TABLE_NAME);

    $row = $dbObj->run_query($sql);

    $address = new Address($row);

    return $address;

}

function remove_address($address_id = 0){

    $sql = "delete from ".Address::$TABLE_NAME." where id=".$address_id;

    $dbObj = Database::getInstance();

    $stmt_del = $dbObj->run_query($sql);

    if($stmt_del >= 0){
        return true;
    }

    return false;

}

function updateAddress($args = array(), $add_id = -1){

    $def_args = array(
        "add_line1" => "",
        "add_line2" => "",
        "pincode" => "000000",
        "city" => "Not Provided",
        "state" => "Not Provided",
    );

    $args= array_replace_recursive($def_args, $args);


    $dbObj = Database::getInstance();

    $up_query = generate_update_query($args, Address::$TABLE_NAME);

    $sql = "update ".Address::$TABLE_NAME." set ".$up_query." where id=".$add_id;

    echo $sql;

    $row = $dbObj->run_query($sql);

    $address = new Address($row);

    return $address;

}


function getAllAddress($user_id = -1){

    $arr = array();

    $sql = "select * from ". Address::$TABLE_NAME." where user_id=".$user_id;

    $dbObj = Database::getInstance();

    $result = $dbObj->get_results($sql);

    /*if(count($result) < 2){
        return $arr;
    }*/

    if(is_array($result)){
        foreach ($result as $singleAdd) {
            $add = new Address($singleAdd);
            array_push($arr,$add);
        }
    }

    return $arr;

}

?>