<!DOCTYPE html>
<html lang="en">
	<?php    $title = "Contact Us"; ?>
	
	<!-- top-header -->
	<?php require_once('header.php');
		if(!class_exists("Contact")){
			require_once(dirname(__FILE__)."/model/Contact/Contact.php");
		}
	?>
	<!-- //top-header -->
    
	
	<!-- navigation -->
        <?php require_once('nevigation.php')?>
	<!-- //navigation -->

	<!-- Posting data -->
	<?php 
		if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contact_no'])
		&& !empty($_POST['subject']) && !empty($_POST['message']))
		{
			$args = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "contact_no" => $_POST['contact_no'],
                "subject" => $_POST['subject'],
                "message" => $_POST['message']
			];
			
			$contact = new Contact($args);

			$result_set = '';

			$result_set = $contact->addContact();

			if($result_set != '')
			{
				echo "<script class='alert alert-info'>alert('Thank You...!');</script>";
			}
			
		}


	?>
	<!-- //Posting data -->
	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>ontact
				<span>U</span>s
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Address</h4>
						<p>1PO Box 8568954 Melbourne
							<label>Australia.</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Call Us</h4>
						<p>+(0121) 121 121</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
						<p>
							<a href="mailto:info@example.com">info@example1.com</a>
							
						</p>
					</div>
				</div>
			</div>
			<!-- form -->
			<form action="contact.php" method="POST">
				<div class="contact-grids1 w3agile-6">
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Name</label>
							<input type="text" class="form-control" name="name" placeholder="" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">E-mail</label>
							<input type="email" class="form-control" name="email" placeholder="" required="">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Mobile</label>
							<input type="tel" class="form-control" name="contact_no" placeholder="" required="true" onKeyPress="return isnumkey(this);" maxlength="10">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Subject</label>
							<input type="text" class="form-control" name="subject" placeholder="" required="">
						</div>
					</div>
					<div class="contact-me animated wow slideInUp form-group">
						<label class="col-form-label">Message</label>
						<textarea name="message" class="form-control" placeholder="" required=""> </textarea>
					</div>
					<div class="contact-form">
						<input type="submit" name="submit" value="Submit">
					</div>
				</div>
			</form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->

    <!-- footer -->
	<?php require_once('footer.php')?>
	<!-- //footer -->
</body>

</html>