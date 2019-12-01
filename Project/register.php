<?php 
$title="Register";
include("header.php");
//include("login.php"); ?>
<?php include("nevigation.php"); ?>
<?php
if(!function_exists("register_new_user")){
	include("model/User/User.php");
}
	if(isset($_POST['submit'])){

		$args = [
			"username" => $_POST["username"],
        	"password" => $_POST["password"],
        	"email" => $_POST["email"],
        	"mobile_no" => $_POST["mobno"]
		];
		
		$args_profile = [
			"name" => $_POST["name"],
        	"birthdate" => $_POST["inlineRadioOptions"],
        	"gender" => $_POST["birthdate"]
		];

		$user = register_new_user($args, $args_profile);
		echo $user->user_id;
	}

?>


<h3 style="margin-top: 1%;" class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>S</span>ign
				<span>U</span>p</h3>

<div style="margin-left: auto; margin-right: auto;" class="col-md-10">


<form action="" method="post">
				<div class="contact-grids1 w3agile-6">
					
						<div class="contact-form1 form-group">
							<label class="col-form-label">Username : </label>
							<input type="text" class="form-control" name="username" id="username" placeholder="" required="" onblur="checkAvailability()">
							<span id="user-availability-status"></span> 
						</div>
						<div class=" contact-form1 form-group">
							<label class="col-form-label">E-mail</label>
							<input type="email" class="form-control" name="email" placeholder="" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">Password :</label>
							<input type="password" class="form-control" id="pass" name="password" placeholder="" required="">
						</div>
						<div class=" contact-form1 form-group" id="cpass_box">
							<label class="col-form-label">Confirm Password : </label>
							<input type="password" class="form-control" id="cpass" onkeyup="isPasswordSame()" name="cpass" placeholder="" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">Mobile No : </label>
							<input type="text" class="form-control" name="mobno" placeholder="" required="true" onKeyPress="return isnumkey(this);" maxlength="10">
						</div>

						<div class="contact-form1 form-group">
							<label class="col-form-label">Name : </label>
							<input type="text" class="form-control" name="name" placeholder="" required="">
						</div>
						<label class="col-form-label" for="gender_title">Gender :</label>
						<div class="form-check form-check-inline">
						
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender_male" value="Male">
							<label class="form-check-label" for="gender_male">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender_female" value="Female">
							<label class="form-check-label" for="gender_female">Female</label>
						</div>

						<div>
							<label class="col-form-label">Birth date</label>
							<input type="date" class="form-control" name="birthdate" >
						</div>

						<div class="contact-form1 form-group">
							
							<label class="col-form-label">Select Profile Picture : </label>
							<input type="file" class="form-control-file" name="profile_img" id="prof_img" onchange="previewImage()" placeholder="" required="">
							<div class="col-md-3" id="profile" onshow="" style="margin:auto;">
								<img src="" id="profile_picture"  alt="No Image Set" style="width:auto; max-height: 250px; border-radius: 10%">
							</div>
						</div>

					<div class="contact-form">
						<input type="submit" name='submit' id='submit' value="Sign Up">
					</div>
				</div>
			</form>
			<!-- //form -->
			<p></p>
		</div>
	</div>
</div>

<script>

function previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("prof_img").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("profile_picture").src = oFREvent.target.result;
        };
    };

function isPasswordSame(){
	var pass = document.getElementById("pass").value;
	var cpass = document.getElementById("cpass").value;
	
	if(pass != cpass){
		//alert(pass + "  " + cpass);
		if(document.getElementById("pass_error") == null)
			$("<div id='pass_error' class='contact-form1 form-group alert-danger' style='margin-top:10px;'><label class='col-form-label' style='margin-left: 1%;'>Both Password Are Not Same </label></div>").insertAfter("#cpass_box");
	}
	else
		$("#pass_error").remove();
}

function checkAvailability() {
	var uname=$("#username").val();
	var action='username_check';
	jQuery.ajax({
	url: "ajax/check_availability.php",
	type: "POST",
	data:{action:action,username:uname},
	success:function(data){
		$("#user-availability-status").html(data);
	},
	error:function (){}
	});
}

</script>

<?php include("footer.php"); ?>

<!--<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " name="Name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="Email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Confirm Password</label>
							<input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Register">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
-->