<?php
    if(!class_exists('Database'))
    {
        include(dirname(__FILE__)."/../Database/Database.php");
    }
    if(!function_exists('generate_insert_query'))
    {
        include(dirname(__FILE__)."/../helper_functions.php");
    }
    
class User{

    public static $table_name = "user";
    public static $table_name_meta = "usermeta";
    public $user_id = 0;
    public $username = "";
    public $mobile_no = "";
    public $email = "";
    public $role = "";
    public $creation_date = "";


    function __construct( $args = array()) {
        
        $this->user_id = $args['user_id'];
        $this->username = $args['username'];
        $this->email = $args['email'];
        $this->mobile_no = $args['mobile_no'];
        $this->creation_date = $args['creation_date'];
        $this->role = $args['role'];

    }

    function set_usermeta($key ="", $value = ""){

        $dbObj = Database::$dbObj;

        $usermeta_id = $this->get_usermeta_id($key);

        if($usermeta_id != 0){

            $query = "update ".User::$table_name_meta." set value='$value' where name='$key' and id='$usermeta_id'";

            $update_id = $dbObj->run_query($query);
            return $update_id;
            
        }
        else{

            $query = "insert into ".User::$table_name_meta." (user_id,name,value) values ('$this->user_id','$key','$value')";

            $insert_id = $dbObj->run_query($query);
            return $insert_id;
            
        }
        //return false;

    }

    function get_usermeta_id($key = ""){

        $dbObj = Database::getInstance();

        $query = "select * from ".User::$table_name_meta." where user_id='$this->user_id' and name='$key'";

        $result = $dbObj->get_result($query);

        if($result != null)
            return $result["id"];

        return 0;
    }

    function get_usermeta($key = ""){

        $dbObj = Database::getInstance();

        $query = "select * from ".User::$table_name_meta." where user_id='$this->user_id' and name='$key'";

        $result = $dbObj->get_result($query);

        if($result != null)
            return $result[$key];

        return false;
    }
    
    function updateRole()
    {
        $sql = "UPDATE user SET role='".$this->role."' WHERE user_id=".$this->user_id;

        $dbObj = Database::getInstance();

        //echo $sql;
        $update_id = $dbObj->run_query($sql);
        
        return $update_id;
    }

    function isValidPassword($password = ''){

        if(count($password) < 1)
            return false;
        else{

            $dbObj = Database::getInstance();
            $args = $dbObj->get_result("select * from ".User::$table_name." where user_id='".$this->user_id."'");

            if($args["password"] == $password){
                return TRUE;
            }
            else{
                return FALSE;
            }

        }
    }


    function change_password($old_pass = '', $new_password = ''){
        
        if($this->isValidPassword( $old_pass )){
            
            $dbObj = Database::getInstance();

            $result = $dbObj->run_query("update ".User::$table_name." set password='".$new_password."' where user_id =".$this->user_id);

            if($result){
                return "Passowrd Changed Successfully.";
            }
            else{
                return "Some Error Occured Please Try Again Later...";
            }

        }
        else{
            return "Old Passowrd Doesn't Match.";
        }
    }

}


function login_user($name = "", $password = '', $login_type = "username"){

    if(count($name) < 1 || count($password) < 1){
        return "Name Or Password Is Not Provided";
    }
    $user = null;    
    if($login_type == "username"){
        $user = get_user_by_username($name);
    }
    elseif($login_type == "email"){
        $user = get_user_by_email($name);
    }
    
    if($user == null || $user == false){
        return "No User Found With Given Name";
    }

    $isValid =  $user->isValidPassword($password);

    if($isValid){
        return $user;
    }
    else{
        return "Password Is Not Valid";
    }

    return "No User Found";

}


function get_user_by_email($email = ''){

    $dbObj = Database::getInstance();

    $result = $dbObj->get_result("select * from ".User::$table_name." where email='".$email."'");

    if(count($result) < 1 || $result == false){
        return false;
    }



    $user = new User($result);

    return $user;

}

function get_user_by_username($name = ''){
    $dbObj = Database::getInstance();
    $result = $dbObj->get_result("select * from ".User::$table_name." where username='".$name."'");


    if(count($result) < 1 ){
        return FALSE;
    }
    $user = new User($result);
    return $user;
}

function get_user_by_id($id = ''){
    $dbObj = Database::getInstance();
    $result = $dbObj->get_result("select * from ". User::$table_name ." where user_id=".$id);


    if(count($result) < 1 ){
        return FALSE;
    }

    $user = new User($result);

    return $user;

}

function forgot_password($username = ''){

    $user = get_user_by_username($username);

    if($user == null){
        return "No User Found With Given User Name";
    }
    else{

        $reset_id = "bg".rand(100000,99999)."reset";
        
        $dbObj = Database::getInstance();

        $dbObj->query("insert into bg_resetpass (user_id, reset_id, is_reset) values ($user->user_id, $reset_id, 0)");

        $link = "~\resetPassword.php";

        $mail = mail($user->email, "Reset Password - BangGood's", "For Reseting Password Please Visit Following Link : ".$link);

        if($mail){
            return "Reset Password mail sended to your registered email successfully.";
        }
        else{
            return "Some Error Occured While Sending Mail..";
        }
    }

}

function register_new_user($args = array(), $args_profile = array()){


    $dbObj = Database::getInstance();
    					

    $def_arr = [
        "username" => "",
        "password" => "",
        "email" => "",
        "mobile_no" => "",
        "creation_date" => date('Y-m-d H:i:s'),
        "role" => "customer",
    ];

    $args = array_replace_recursive($def_arr, $args);


    $query = generate_insert_query($args, Product::$table_name);

    $user_id = $dbObj->run_query($query);

    $user = get_user_by_id($user_id);

    /*$user->set_usermeta("profile_image","Hello/img.png");
    $user->set_usermeta("gender","Hello");
    $user->set_usermeta("cover_image","Hello/img.png");
    */

    require_once("Profile.php");

    add_new_profile($user->user_id, $args_profile);    

    return $user;

}
/**************************************************************************************************/
function getAllUser($columns='*')
{
    $sql = "SELECT ".$columns." FROM user";

    $dbObj = Database::getInstance();

 	$result_set = $dbObj->get_results($sql);
   
	return $result_set;
}
/*-----------------------------------------------------------------------------------------------------------------------*/
if(isset($_POST['action']) && $_POST['action']=="update_role" )
{
    if(!empty($_POST['user_id']) && !empty($_POST['role']))
    {
        $user=get_user_by_id($_POST['user_id']);
        $user->role=$_POST['role'];
        $user->updateRole();
    }
    unset($_POST['action']);
}
/*-----------------------------------------------------------------------------------------------------------------------*/
?>