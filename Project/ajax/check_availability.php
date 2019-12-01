<?php
if(!class_exists('User')){
    include("../model/User/User.php");
}


if(isset($_POST['action']) && $_POST['action']=="username_check")
{
    if(!empty($_POST["username"])) {
        $user=get_user_by_username($_POST["username"]);
        if(empty($user->user_id)) {
          echo "<div id='pass_error' style='margin-top:5px;' class='contact-form1 form-group alert-successful'><label class='col-form-label' style='margin-left: 1%;'>Username Is Available.</label></div>";
        }
        else{
            echo "<div id='pass_error' style='margin-top:5px;' class='contact-form1 form-group alert-danger'><label class='col-form-label' style='margin-left: 1%;'>Username Is Not Available.</label></div>";
        }
    }
}
else if(isset($_POST['action']) && $_POST['action']=="oldPassword_check")
{
    if(!empty($_POST["oldpassword"])) {
    $user=get_user_by_id($_POST["user_id"]);
        if($user->isValidPassword($_POST["oldpassword"])) {
       echo "<div id='pass_error' class='contact-form1 form-group alert-successful' style='margin-top:5px;'><label class='col-form-label' style='margin-left: 1%;'>Correct Password.</label></div>";
        }else{
        echo "<BR/><div id='pass_error' class='contact-form1 form-group alert-danger' style='margin-top:5px;'><label class='col-form-label' style='margin-left: 1%;'>Incorrect Password</label></div>";
        }
    }
}
?>