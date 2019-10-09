<?php 
class User{

    public static $table_name = "bh_users";

    $user_id = 0;
    $fName = "";
    $lName = "";
    $mobile_no = 0000;
    $email = "";
    $access = "";
    
    function __construct( $args = array()) {
        
        $this->user_id = $args['user_id'];
        $this->fName = $args['fName'];
        $this->lName = $args['lName'];
        $this->mobile_no = $args['mobile_no'];
        $this->email = $args['email'];
        $this->access = $args['access'];

    }


    function isValidPassword($password = ''){

        if(count($password) < 1)
            return FALSE;
        else{

            $database = new Database();

            $args = $database->query("select * from "+ $this->table_name + " where id="+$this->user_id);

            if($args["password"] == $password){
                return TRUE;
            }
            else{
                return FALSE;
            }

        }
    }


    function change_password($old_pass = '', $new_password = ''){

        if(isValidPassword( $old_pass )){
            
            $database = new Database();

            $result = $database->query("update "+$this->table_name+" set password='"+ $new_password +"' where user_id ="+$this->user_id);

            if($result){
                return "Passowrd Changed Successfully.";
            }
            else{
                return "Some Error Occured Please Try Again Later..."
            }

        }
        else{
            return "Old Passowrd Doesn't Match.";
        }
    }

}


function login_user($login_type = "username", $name = "", $password = ''){

    if(count($name) < 1 || count($password) < 1){
        return "Name Or Password Is Not Provided";
    }

    if($login_type == "username"){
        $user = get_user_by_username();
    }
    elseif($login_type == "email"){
        $user = get_user_by_email();
    }
    
    if($user == null){
        return "No User Found With Given Name";
    }

    $isValid =  $user->isValidPassword($password);

    if($isValid){
        return $user;
    }
    else{
        return "Password Is Not Valid";
    }

}


function get_user_by_email($email = ''){

    $databse = new Database();

    $result = $database->query("select * from "+ User->table_name + " where email="+$email);

    if(count($result) < 1 ){
        return FALSE;
    }

    $user = new User($result);

    return $user;

}

function get_user_by_username($name = ''){

    $databse = new Database();

    $result = $database->query("select * from "+ User->table_name + " where user_name="+$name);

    if(count($result) < 1 ){
        return FALSE;
    }

    $user = new User($result);

    return $user;

}

function get_user_by_id($id = ''){

    $databse = new Database();

    $result = $database->query("select * from "+ User->table_name + " where user_id="+$id);

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

        $reset_id = "bg"+ rand(100000,99999) + "reset";
        
        $database = new Database();

        $database->query("insert into bg_resetpass (user_id, reset_id, is_reset) values ($user->user_id, $reset_id, 0)");

        $link = "~\resetPassword.php";

        $mail = mail($user->email, "Reset Password - BangGood's", "For Reseting Password Please Visit Following Link : "+$link);

        if($mail){
            return "Reset Password mail sended to your registered email successfully.";
        }
        else{
            return "Some Error Occured While Sending Mail..";
        }
    }

}
?>