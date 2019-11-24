<?php
if(!class_exists("Database")){
    require_once(dirname(__FILE__)."\..\Database\Database.php");
}
class Adderss{
    public $user_id = 0;
    public $id = 0;
    public $add_line_1 = "";
    public $add_line_2 = "";
    public $pincode = 0;
    public $city = "";
    public $state = "";
    public static $table_name = "profile";

    function __construct($id=0){
        
       $dbObj = Database::getInstance();

       $result = $dbObj->get_result("select * from ".Address::$table_name." where user_id = ".$this->user_id);

            

    }
}
?>
