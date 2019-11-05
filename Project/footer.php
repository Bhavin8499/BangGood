<footer>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Categories</h3>
						<ul>
							<li class="mb-3">
								<a href="product.html">Mobiles </a>
							</li>
							<li class="mb-3">
								<a href="product.html">Computers</a>
							</li>
							<li class="mb-3">
								<a href="product.html">TV, Audio</a>
							</li>
							<li class="mb-3">
								<a href="product2.html">Smartphones</a>
							</li>
							<li class="mb-3">
								<a href="product.html">Washing Machines</a>
							</li>
							<li>
								<a href="product2.html">Refrigerators</a>
							</li>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="about.php">About Us</a>
							</li>
							<li class="mb-3">
								<a href="contact.php">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="help.php">Help</a>
							</li>
							<li class="mb-3">
								<a href="faqs.php">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="terms.php">Terms of use</a>
							</li>
							<li>
								<a href="privacy.php">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> Morbi Road, Rajkot.</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i> +91 12345 67890 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +0281 11 4444 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> bangGoods@example.com</a>
							</li>
							<li>
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> mail 2@example.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d625.3433910223363!2d70.7957962923297!3d22.366796566612265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c83cf3e28db7%3A0xcf4894ee53eaed62!2sMarwadi%20University!5e0!3m2!1sen!2sin!4v1570713170136!5m2!1sen!2sin" width="110%" height="200" frameborder="0" style="border:0;" allowfullscreen="">
						</iframe>
										
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
				<!-- //payment -->
			</div>
		</div>
		<!-- //footer fourth section (text) -->
	</footer>
		<!-- copyright -->
		<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2019 BangGoods. All rights reserved .
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src = "js/jquery-ui.js"></script>
      
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); 
		//use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 1) {
				alert('The minimum order quantity is 1. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="js/scroll.js"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll
	<script src="js/SmoothScroll.min.js"></script> -->
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->


	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->