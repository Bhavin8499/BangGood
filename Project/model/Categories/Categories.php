<?php
class Categories{
    public $cateID = 0;
    public $cateName = "";
    public $cateDesc = "";
    public $cateParent = 0;
    public static $table_name = "bh_categories";

    function __construct(){

    }

    function set_data($args){
        
        $this->cateID = $args["cate_id"];
        $this->cateName = $args["name"];
        $this->cateDesc = $args["parent"];
        $this->cateParent = $args["description"];

    }

    function insert_category(){
        $default = ["cateName"=>"","cateDesc"=>"", "cateParent"=>0];

        $args = array_replace_recursive($default,$args);
        
        
        
        //return $args;
    }

    function update_category(){

    }
}

function get_parent_categories(){
    
    if(!class_exists('Database')){
        require("../Database/Database.php");
    }

    $db = new Database();

    $query = "select * from ".Categories::$table_name." where parent = 0"; 
    
    $arr = $db->get_results($query);

    $arrModel = array();

    foreach ($arr as $row) {
        $model = new Categories();
        $model->set_data($row);
        echo $model->cateID;
        array_push($arrModel,$model);
    }

    return $arrModel;

}

$arr = get_parent_categories();

$model = $arr[0];

?>