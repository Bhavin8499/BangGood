<?php

$title = "Edit Profile | Banggood";
include("header.php"); 
    if(!in_array("user_id", array_keys($_SESSION))){
        echo "<script>alert('You Are not logged in.'); location='index.php';</script>";
    }

	if(!class_exists('User')){
		include("model/User/User.php");
	}

	if(!function_exists('get_user_profile_by_id')){
		include("model/User/Profile.php");
	}

	$user = get_user_by_id($_SESSION['user_id']);
	$profile = get_user_profile_by_id($_SESSION['user_id']);

	

	if(isset($_POST['btn_prof_update'])){
		$args = [
			"name" => $_POST["name"],
			"birth_date" => $_POST["birthdate"],
			"gender" => $_POST["Gender"],
		];
		
		
		if(isset($_FILES["profile_img"])){
			$img = upload_image($_FILES["profile_img"],"profile_image");
			$args["profile_img"] = $img;
		}
		$profile->update_profile($args);
	}


?>
<div class="faqs-w3l py-sm-5 py-4">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>E</span>dit
                <span>P</span>rofile
			</h3>
<div class="modal-body" style="margin:30px;">
					                    <form action="#" method="post" enctype="multipart/form-data">
						                    
						                    <div class="form-group">
							                    <label class="col-form-label">Your Name</label>
							                    <input type="text" class="form-control" name="name" required="" value="<?php echo $profile->name; ?>">
											</div>
											
						                   
						                    <div class="form-group">
							                    <label class="col-form-label">Mobile Number</label>
							                    <input type="text" maxlength="10" onkeypress='validate(event)' readonly class="form-control" name="Mobile" value="<?php echo $user->mobile_no; ?>" required="">
											</div>
											
						                    <div class="form-group">
							                    <label class="col-form-label">Email</label>
							                    <input type="email" class="form-control" name="Email" readonly="" value="<?php echo $user->email; ?>">
											</div>
											
											<div>
												<label class="col-form-label">Birth date</label>
							                    <input type="date" class="form-control" name="birthdate" value="<?php echo $profile->birthdate; ?>">
												
											</div>

						                    <div class="form-group">
							                    <label class="col-form-label">Gender</label><br />
						                        <input type="radio" value="Male" name="Gender" <?php echo $profile->gender == "Male" ? "checked" : ""; ?>  /><label class="col-form-label">Male</label>
						                        <input type="radio" value="Female" name="Gender" <?php echo $profile->gender == "Female" ? "checked" : ""; ?>  /><label class="col-form-label">Female</label>
						                    </div>		
						                    <div>
												      <label class="file">
                                                              <input type="file" id="file" name="profile_img" aria-label="File browser example" accept="image/*" onchange="loadFile(event)" class="form-input">
                                                              <span class="file-custom"></span>
                                                            </label>
						                                    	<div align="center">
						                                        <img id="output"  style="margin:5px; border-radius:10%;"/>
																</div>
						                                        <script>
						                                        var loadFile = function(event)
						                                        {
						                                          var width = document.getElementById('file').offsetWidth;
																  document.getElementById('output').style.height = 300;
                                                                  var output = document.getElementById('output');
                                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                                  output.style.width = "auto";
                                                                };
                                                                </script>
                                                        </div>
                                                        <div class="right-w3l">
							 <input type="submit" class="form-control" id="btnSubmit" name="btn_prof_update" value="Update Profile" />
						</div>
						
					</form>
				</div>
			</div>

</div>

<?php include("footer.php"); ?>