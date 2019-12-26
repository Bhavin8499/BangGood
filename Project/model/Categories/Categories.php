<?php
if(!class_exists('Database')){
    require(dirname(__FILE__)."/../Database/Database.php");
    }
if(!function_exists('generate_insert_query'))
    {
        require_once(dirname(__FILE__)."/../helper_functions.php");
    }

class Categories{
    public $cateID = 0;
    public $cateName = "";
    public $cateDesc = "";
    public $cateParent = 0;
    public static $table_name = "categories";

    function __construct(){

    }
    

    function set_data($args){
        
        $this->cateID = $args["cate_id"];
        $this->cateName = $args["name"];
        $this->cateDesc = $args["description"];
        $this->cateParent = $args["parent"];

    }

    function insert_category(){
        $default = ["cateName"=>"","cateDesc"=>"", "cateParent"=>0];

        $args = array_replace_recursive($default,$args);
        
        //return $args;
    }
    

    function update_category(){

    }
}
function addBrand($args=array())
{
    $dbObj = Database::getInstance();

    $def_arr = [
        "name" => 0,
        "parent" => 0,
        "description" => "",  
    ];

    $args = array_replace_recursive($def_arr, $args);

    $query = generate_insert_query($args, Categories::$table_name);

    //echo $query;

    $insert_id = $dbObj->run_query($query);

    return $insert_id;

}
function get_category($cat_id)
{
    $query = "select * from ".Categories::$table_name." where cate_id=".$cat_id; 
    $db = Database::getInstance();
    $arr = $db->get_results($query);
    return $arr;
}
function get_parent_categories(){
    
    
    $db = Database::getInstance();

    $query = "select * from ".Categories::$table_name." where parent = 0"; 
    
    $arr = $db->get_results($query);

    $arrModel = array();
    
    if(is_array($arr)){

        foreach ($arr as $row) {
            $model = new Categories();
            $model->set_data($row);
            //echo $model->cateID;
            array_push($arrModel,$model);
        }

        return $arrModel;

    }

    else $arr;

}

function get_child_category($cateID)
{
    $db = Database::getInstance();

    $query = "select * from ".Categories::$table_name." where parent =".$cateID; 
    
    $arr = $db->get_results($query);

    $arrModel = array();
    
    if(is_array($arr)){

        foreach ($arr as $row) {
            $model = new Categories();
            $model->set_data($row);
            //echo $model->cateID;
            array_push($arrModel,$model);
        }

        return $arrModel;

    }

    else $arr;

}
/*----------------------------------------------------------------------*/
if(isset($_POST['action']))
{
    $arr=array();
    //echo $_POST['cate_id'];
    if(isset($_POST['cate_id']) && !empty($_POST['cate_id']))
    {
        $arr = get_child_category($_POST['cate_id']);
        $ret = "&nbsp;
        <label for='' class='col-form-label'> Brand :</label>
        <select class='form-control form-control-sm-2 custom-select' name='pro_brand' id='' required='true'>
        <option selected>Select Brand</option>
        ";
        for($i=0;$i<count($arr);$i++)
        {
        $ret .="<option value=".$arr[$i]->cateID.">".$arr[$i]->cateName."</option>";
        }
        $ret .="</select>";
        echo $ret;
    }
}

// $arr = get_category(1);
// print_r($arr);
// foreach($arr as $row)
// {
//     echo "<br>";
//     print_r($row);
//     $arr1 = get_child_category($row->cateID);    
//     foreach($arr1 as $row1)
//     {
//         echo "<br><hr>";
//         print_r($row1);
//         echo "<br><hr>";
//     }    
    
//     echo "<br>";
// }


// $model = $arr[0];
// print_r($model);

// if(is_array($model))
//     print_r($model);
// else
//     echo "No Data Found";

?>