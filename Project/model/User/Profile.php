<?php

if(!class_exists("Database")){
    include(dirname(__FILE__)."/../Database/Database.php");
}

if(!function_exists('generate_update_query')){
    include(dirname(__FILE__)."/../helper_functions.php");
}

class Profile{

    public $user_id = 0;
    public $name = "";
    public $birthdate = "00-00-0000";
    public $profile_img = "";
    public $gender = 0;
    public static $table_name = "profile";

    function __construct($args = array()){

        if(is_array($args)){

            $this->user_id = $args["user_id"];
            $this->name = $args["name"];
            $this->birthdate = $args["birthdate"];
            $this->profile_img = $args["profile_img"];
            $this->gender = $args["gender"];

        }
        else{
            $dbObj = Database::getInstance();

            $result = $dbObj->get_result("select * from ".Profile::$table_name." where user_id=$this->user_id");

            $this->user_id = $result["user_id"];
            $this->name = $result["name"];
            $this->birthdate = $result["birthdate"];
            $this->profile_img = $result["profile_img"];
            $this->gender = $result["gender"];

        }

    }
    
    //setter Methods
    function update_profile(){

        $args = array();

        $args["user_id"] = $this->user_id;
        $args["name"] = $this->name;
        $args["birthdate"] = $this->birthdate;
        $args["profile_img"] = $this->profile_img;
        $args["gender"] = $this->gender;

        $query = "update ".Profile::$table_name." set ".generate_update_query($args)." where user_id='".$this->user_id."'";

        $dbObj = Database::getInstance();

        $dbObj->run_query($query);

    }

    function update_profile_img($file_to_upload){

        

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

function get_user_profile_by_id($id = ''){
    $dbObj = Database::getInstance();
    $sql = "select * from ".Profile::$table_name." where user_id=".$id;
    $result = $dbObj->get_result($sql);


    if(count($result) < 1 ){
        return FALSE;
    }

    $profile = new Profile($result);

    return $profile;

}

function add_new_profile($user_id = 0, $args = array()){

    $def_arr = [
        "id" => "$user_id",
        "name" => "",
        "birth_date" => "00-00-0000",
        "profile_img" => "def_profile_img.jpg",
        "gender" => "Male"
    ];

    $args = array_replace_recursive($def_arr, $args);

    $query = generate_insert_query($args, Profile::$table_name);


    $dbObj = Database::getInstance();

    $res = $dbObj->run_query($query);
    return true;

}


?>