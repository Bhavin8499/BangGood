<?php

	if(!class_exists('User')){
		include(dirname(__File__)."/model/User/User.php");
	}

	if(isset($_POST['login_user'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$user = null;

		/*$email = filter_var($username, FILTER_SANITIZE_EMAIL);
		$bool = filter_var($email, FILTER_VALIDATE_EMAIL);
		echo $bool;*/
//this is remaining;
		//if(filter_var($email, FILTER_VALIDATE_EMAIL))
	//		$user = login_user($username, $password, "email");
	//	else
	
	if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $user = login_user($username, $password, "email");
    }
    else {
        $user = login_user($username, $password);
    }
	
	$_SESSION["user_id"] = $user->user_id;
	
	unset($_POST['login_user']);

	
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" class="form-control" placeholder=" " name="username" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" name="login_user" class="form-control" value="Log in">
						</div>
						<!--<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>-->
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="register.php">	Register Now</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	