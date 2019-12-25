<?php

$title = "Add/Update Address | BangGood";

include("header.php");
include("nevigation.php");


include("model/Address.php");

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

				<input type="hidden" value="<?php echo $_GET["add_id"]; ?>" name="add_id">

				<div class="contact-form1 form-group">
					<label class="col-form-label">Address Line 1 : </label>
					<input type="text" class="form-control" name="adline1" placeholder=""
						value="<?php echo $add->add_line1; ?>" required="">
				</div>
				<div class=" contact-form1 form-group">
					<label class="col-form-label">Address Line 2 : </label>
					<input type="text" class="form-control" name="adline2" placeholder=""
						value="<?php echo $add->add_line2; ?>" required="">
				</div>
				<div class="contact-form1 form-group">
					<label class="col-form-label">Pincode :</label>
					<input type="text" class="form-control" name="pincode" placeholder=""
						value="<?php echo $add->pincode; ?>" required="">
				</div>
				<div class="contact-form1 form-group">
					<label class="col-form-label">City :</label>
					<select class="form-control" name="city" placeholder="" required="">
						<option value="<?php echo $add->city; ?>"><?php echo $add->city; ?></option>
						<option value="Adalaj">Adalaj</option>
						<option value="Ahmedabad">Ahmedabad</option>
						<option value="Amreli">Amreli</option>
						<option value="Anand">Anand</option>
						<option value="Anjar">Anjar</option>
						<option value="Ankleshwar">Ankleshwar</option>
						<option value="Bharuch">Bharuch</option>
						<option value="Bhavnagar">Bhavnagar</option>
						<option value="Bhuj">Bhuj</option>
						<option value="Chhapra">Chhapra</option>
						<option value="Deesa">Deesa</option>
						<option value="Dhoraji">Dhoraji</option>
						<option value="Gandhinagar">Gandhinagar</option>
						<option value="Godhra">Godhra</option>
						<option value="Jamnagar">Jamnagar</option>
						<option value="Kadi">Kadi</option>
						<option value="Kapadvanj">Kapadvanj</option>
						<option value="Keshod">Keshod</option>
						<option value="Khambhat">Khambhat</option>
						<option value="Lathi">Lathi</option>
						<option value="Limbdi">Limbdi</option>
						<option value="Lunawada">Lunawada</option>
						<option value="Mahemdabad">Mahemdabad</option>
						<option value="Mahesana">Mahesana</option>
						<option value="Mahuva">Mahuva</option>
						<option value="Manavadar">Manavadar</option>
						<option value="Mandvi">Mandvi</option>
						<option value="Mangrol">Mangrol</option>
						<option value="Mansa">Mansa</option>
						<option value="Modasa">Modasa</option>
						<option value="Morvi">Morvi</option>
						<option value="Nadiad">Nadiad</option>
						<option value="Navsari">Navsari</option>
						<option value="Padra">Padra</option>
						<option value="Palanpur">Palanpur</option>
						<option value="Palitana">Palitana</option>
						<option value="Pardi">Pardi</option>
						<option value="Patan">Patan</option>
						<option value="Petlad">Petlad</option>
						<option value="Porbandar">Porbandar</option>
						<option value="Radhanpur">Radhanpur</option>
						<option value="Rajkot">Rajkot</option>
						<option value="Rajpipla">Rajpipla</option>
						<option value="Rajula">Rajula</option>
						<option value="Ranavav">Ranavav</option>
						<option value="Rapar">Rapar</option>
						<option value="Salaya">Salaya</option>
						<option value="Sanand">Sanand</option>
						<option value="Savarkundla">Savarkundla</option>
						<option value="Sidhpur">Sidhpur</option>
						<option value="Sihor">Sihor</option>
						<option value="Songadh">Songadh</option>
						<option value="Surat">Surat</option>
						<option value="Talaja">Talaja</option>
						<option value="Thangadh">Thangadh</option>
						<option value="Tharad">Tharad</option>
						<option value="Umbergaon">Umbergaon</option>
						<option value="Umreth">Umreth</option>
						<option value="Una">Una</option>
						<option value="Unjha">Unjha</option>
						<option value="Upleta">Upleta</option>
						<option value="Vadnagar">Vadnagar</option>
						<option value="Vadodara">Vadodara</option>
						<option value="Valsad">Valsad</option>
						<option value="Vapi">Vapi</option>
						<option value="Vapi">Vapi</option>
						<option value="Veraval">Veraval</option>
						<option value="Vijapur">Vijapur</option>
						<option value="Viramgam">Viramgam</option>
						<option value="Visnagar">Visnagar</option>
						<option value="Vyara">Vyara</option>
						<option value="Wadhwan">Wadhwan</option>
						<option value="Wankaner">Wankaner</option>
					</select>
				</div>
				<div class="contact-form1 form-group">
					
					
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
				<select class="form-control" name="city" placeholder="" required="">

					<option value="Adalaj">Adalaj</option>
					<option value="Ahmedabad">Ahmedabad</option>
					<option value="Amreli">Amreli</option>
					<option value="Anand">Anand</option>
					<option value="Anjar">Anjar</option>
					<option value="Ankleshwar">Ankleshwar</option>
					<option value="Bharuch">Bharuch</option>
					<option value="Bhavnagar">Bhavnagar</option>
					<option value="Bhuj">Bhuj</option>
					<option value="Chhapra">Chhapra</option>
					<option value="Deesa">Deesa</option>
					<option value="Dhoraji">Dhoraji</option>
					<option value="Gandhinagar">Gandhinagar</option>
					<option value="Godhra">Godhra</option>
					<option value="Jamnagar">Jamnagar</option>
					<option value="Kadi">Kadi</option>
					<option value="Kapadvanj">Kapadvanj</option>
					<option value="Keshod">Keshod</option>
					<option value="Khambhat">Khambhat</option>
					<option value="Lathi">Lathi</option>
					<option value="Limbdi">Limbdi</option>
					<option value="Lunawada">Lunawada</option>
					<option value="Mahemdabad">Mahemdabad</option>
					<option value="Mahesana">Mahesana</option>
					<option value="Mahuva">Mahuva</option>
					<option value="Manavadar">Manavadar</option>
					<option value="Mandvi">Mandvi</option>
					<option value="Mangrol">Mangrol</option>
					<option value="Mansa">Mansa</option>
					<option value="Modasa">Modasa</option>
					<option value="Morvi">Morvi</option>
					<option value="Nadiad">Nadiad</option>
					<option value="Navsari">Navsari</option>
					<option value="Padra">Padra</option>
					<option value="Palanpur">Palanpur</option>
					<option value="Palitana">Palitana</option>
					<option value="Pardi">Pardi</option>
					<option value="Patan">Patan</option>
					<option value="Petlad">Petlad</option>
					<option value="Porbandar">Porbandar</option>
					<option value="Radhanpur">Radhanpur</option>
					<option value="Rajkot">Rajkot</option>
					<option value="Rajpipla">Rajpipla</option>
					<option value="Rajula">Rajula</option>
					<option value="Ranavav">Ranavav</option>
					<option value="Rapar">Rapar</option>
					<option value="Salaya">Salaya</option>
					<option value="Sanand">Sanand</option>
					<option value="Savarkundla">Savarkundla</option>
					<option value="Sidhpur">Sidhpur</option>
					<option value="Sihor">Sihor</option>
					<option value="Songadh">Songadh</option>
					<option value="Surat">Surat</option>
					<option value="Talaja">Talaja</option>
					<option value="Thangadh">Thangadh</option>
					<option value="Tharad">Tharad</option>
					<option value="Umbergaon">Umbergaon</option>
					<option value="Umreth">Umreth</option>
					<option value="Una">Una</option>
					<option value="Unjha">Unjha</option>
					<option value="Upleta">Upleta</option>
					<option value="Vadnagar">Vadnagar</option>
					<option value="Vadodara">Vadodara</option>
					<option value="Valsad">Valsad</option>
					<option value="Vapi">Vapi</option>
					<option value="Vapi">Vapi</option>
					<option value="Veraval">Veraval</option>
					<option value="Vijapur">Vijapur</option>
					<option value="Viramgam">Viramgam</option>
					<option value="Visnagar">Visnagar</option>
					<option value="Vyara">Vyara</option>
					<option value="Wadhwan">Wadhwan</option>
					<option value="Wankaner">Wankaner</option>
				</select>
			</div>
			<div class="contact-form1 form-group">
				<input type="hidden" class="form-control" name="state" value="Gujarat">
				
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