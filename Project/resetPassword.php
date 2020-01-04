<?php
    if(isset($_POST['update_pass']))
    {
        if(!class_exists('User')){
            include(dirname(__FILE__)."/model/User/User.php");
        }
        $user = get_user_by_id($_SESSION["user_id"]);
        $result_set = $user->change_password($_POST['oldpass'],$_POST['newpass']);
        if($result_set=="Passowrd Changed Successfully.")
           echo "<script>alert('Passowrd Changed Successfully.');</script>";
        else
        echo "<script>alert('Some Error Occured Please Try Again Later...');</script>";
        unset($_POST['update_pass']);
    }
?>
<div class="modal fade" id="resetpass" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Reset Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="POST">
						<div class="form-group">
							<label class="col-form-label">Old Password</label>
							<input type="password" class="form-control" placeholder="" id="oldpassword" name="oldpass" onblur="checkAvailability()" required=""/>
                            <span id="oldPassword-check"></span> 
						</div>
						<div class="form-group">
							<label class="col-form-label">New Password</label>
							<input type="password" class="form-control" placeholder=" " id="pass1" name="newpass" required=""/>
						</div>
						<div class="form-group" id="cpass_box1">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" placeholder=" " id="cpass1" onkeyup="isPasswordSame()" name="cpass" required=""/>
						</div>
						<div class="right-w3l">
							<input type="submit" name="update_pass" class="form-control"  value="Update Password">
						</div>
                        <p class="text-center dont-do mt-3" > <a href="#" data-dismiss="modal">Cancel</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
<script>
function checkAvailability() {
    var user_id = '<?php if(isset($_SESSION['user_id'])) { echo $_SESSION['user_id'] ;}else{ echo "abc" ;}?>';
    var oldPass=$("#oldpassword").val();
	var action='oldPassword_check';
    //alert(user_id+''+oldPass)
	jQuery.ajax({
	url: "ajax/check_availability.php",
	type: "POST",
	data:{action:action,user_id:user_id,oldpassword:oldPass},
	success:function(data){
	$("#oldPassword-check").html(data);
	},
	error:function (){}
	});
}
function isPasswordSame(){
	var pass = document.getElementById("pass1").value;
	var cpass = document.getElementById("cpass1").value;
	
	if(pass != cpass){
		//alert(pass + "  " + cpass);
		if(document.getElementById("pass_error") == null)
			$("<div id='pass_error' class='contact-form1 form-group alert-danger'><label class='col-form-label' style='margin-left: 1%;'>Both Password Are Not Same </label></div>").insertAfter("#cpass_box1");
	}
	else
		$("#pass_error").remove();
}
</script>