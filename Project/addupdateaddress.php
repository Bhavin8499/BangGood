<?php

$title = "Add/Update Address | BangGood";

include("header.php");
include("nevigation.php");


include("model\Address.php");

$user_id = $_SESSION["user_id"];

if(!isset($user_id)){
	echo "<script>alert('Please Login First'); window.location='index.php';</script>";
}

if(isset($_GET["add_id"])){
	$add = new Address($_GET["add_id"]);
}

if(isset($_POST["submit"])){

	$addLine1 = $_POST["adline1"];
	$addLine2 = $_POST["adline2"];
	$pincode = $_POST["pincode"];
	$city = $_POST["city"];
	$state = $_POST["state"];

	

	//$args = array();
	$args = array(
		"user_id" => $user_id,
		"add_line1" => $addLine1,
		"add_line2" => $addLine2,
		"pincode" => $pincode,
		"city" => $city,
		"state" => $state
	);
	if(isset($_POST["add_id"])){
		$add = updateAddress($args, $_POST["add_id"]);
		if(isset($add)){
			echo "<script>alert('Address Details Updated Successfully.'); window.location='alladdress.php';</script>";
		}
	}
	else{
		$add = createNewAddress($args);
		if(isset($add)){
			echo "<script>alert('New Address Details Are Inserted.'); window.location='alladdress.php';</script>";
		}
	}
	
	

}

?>

<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>N</span>ew
				<span>A</span>ddress
			<!-- //tittle heading -->
        </div>

		<div style="margin-left: auto; margin-right: auto;" class="col-md-10">

<?php 

if(isset($add)){
?>

<form action="" method="post">
				<div class="contact-grids1 w3agile-6">
					
						<input type="hidden" value="<?php echo $_GET["add_id"]; ?>" name="add_id" >

						<div class="contact-form1 form-group">
							<label class="col-form-label">Address Line 1 : </label>
							<input type="text" class="form-control" name="adline1" placeholder="" value="<?php echo $add->add_line1; ?>" required="">
						</div>
						<div class=" contact-form1 form-group">
							<label class="col-form-label">Address Line 2 : </label>
							<input type="text" class="form-control" name="adline2" placeholder="" value="<?php echo $add->add_line2; ?>" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">Pincode :</label>
							<input type="text" class="form-control" name="pincode" placeholder="" value="<?php echo $add->pincode; ?>" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">City :</label>
							<input type="text" class="form-control" name="city" placeholder="" value="<?php echo $add->city; ?>" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">State :</label>
							<input type="text" class="form-control" name="state" placeholder="" value="<?php echo $add->state; ?>" required="">
						</div>

						<div class="contact-form">
							<input type="submit" name='submit' id='submit' value="Add New Address">
						</div>

				</div>
				<div style="margin-top:30px;"></div>
</form>


</div>

<?php
}
else{
?>

<form action="" method="post">
				<div class="contact-grids1 w3agile-6">
					
						<div class="contact-form1 form-group">
							<label class="col-form-label">Address Line 1 : </label>
							<input type="text" class="form-control" name="adline1" placeholder="" required="">
						</div>
						<div class=" contact-form1 form-group">
							<label class="col-form-label">Address Line 2 : </label>
							<input type="text" class="form-control" name="adline2" placeholder="" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">Pincode :</label>
							<input type="text" class="form-control" name="pincode" placeholder="" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">City :</label>
							<input type="text" class="form-control" name="city" placeholder="" required="">
						</div>
						<div class="contact-form1 form-group">
							<label class="col-form-label">State :</label>
							<input type="text" class="form-control" name="state" placeholder="" required="">
						</div>

						<div class="contact-form">
							<input type="submit" name='submit' id='submit' value="Add New Address">
						</div>

				</div>
				<div style="margin-top:30px;"></div>
</form>


</div>

<?php
}
?>

<?php

include("footer.php");

?>