<?php

if(!class_exists("Database")){
    include("../Database/Database.php");
}

class Profile{

    public $user_id;
    public $name = "";
    public $profile_img = "";
    public $gender = 0;
    public static $table_name = "profile";

    function __construct(){
            #need to define
    }
    
    //setter Methods
    function update_profile(){

    }

    function update_profile_img(){

    }

    function update_cover_img(){
        
    }

    // Getter Methods
    function get_profile_image(){
        
        $dbObj = Database::getInstance();

        $qry = "select profile_img from $this->tablename where user_id = $this->user_id";

        $arr = $dbObj->get_result($qry);

        if($arr != null)
            return $arr['profile_img'];
        else
            return "Default Image Path";

    }

    function get_cover_image(){
        
        $dbObj = Database::getInstance();

        $qry = "select cover_img from $this->tablename where user_id = $this->user_id";

        $arr = $dbObj->get_result($qry);

        if($arr != null)
            return $arr['profile_img'];
        else
            return "Default Image Path";

    }

}


?>