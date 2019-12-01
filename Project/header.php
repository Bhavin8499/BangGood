<?php 
	session_start();

	if(isset($_SESSION['user_id'])){
		if(!class_exists('Profile')){
			include("model/User/Profile.php");
		}
		$profile_user = get_user_profile_by_id($_SESSION['user_id']);
	}
?>
<head>

	<title> 
	<?php echo $title; ?>
	 </title>
	
	<link rel = "icon" type = "image/png" href = "./images/logo2.png">
    
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content=""	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<link href = "css/jquery-ui.css" rel="stylesheet" type="text/css" media="all" />
	<!--jquery style-->
	<!-- //Custom-Files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src = "js/jquery-ui.js"></script>  
	<!-- //jquery -->


	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>
<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<?php if(!isset($_SESSION['user_id'])) 	{ ?>
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>

				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
							<a class="play-icon popup-with-zoom-anim text-white" href="#small-dialog1">
							</a>
						</li>
						<li class="text-center border-right text-white">
							<a href="order.php" class="text-white">
								<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 12345 67890
						</li>
					
						<li class="text-center border-right text-white">
							<a href="login.php"  class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
						</li>
						<li class="text-center text-white">
							<a href="register.php" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
				<?php
				}
				else
				{
				?>
				<div class="col-lg-4 header-header-most-top">
					<p class="text-white text-lg-left text-center">Offer Zone Top Deals & Discounts
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						<li class="text-center border-right text-white">
						</li>
						<!-- <li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#resetpass" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Reset Password </a>
						</li> -->
						<li class="text-center border-right text-white">
							<a href="order.php" class="text-white">
							<i class="fas fa-truck mr-2"></i>Track Order</a>
						</li>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 12345 67890
						</li>
						<li class="text-center border-right text-white">
							<a href="logout.php"  class="text-white"><i class="fas fa-sign-in-alt mr-2"></i> Log Out </a>
						</li>
						<li class="text-center text-white nav-item dropdown">
							<a class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?php echo isset($profile_user->profile_img) ? $profile_user->profile_img : 'images/user.jpg'; ?>" alt="profile pic"   style='height:20px; width:20px;border-radius:35px;' />
							</a>
							<div class="dropdown-menu" >
								<div style="margin-left:10%; margin-right:10%;"><?php echo $profile_user->name; ?></div>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="editprofile.php">Edit Profile</a>
								<a class="dropdown-item" href=".php">View Profile</a>
								<div class="dropdown-divider"></div>
								<a href="#" data-toggle="modal" data-target="#resetpass" class="dropdown-item">Reset Password</a>	
								<a class="dropdown-item" href="logout.php">Logout</a>						</div>	
						</li>
					</ul>
					<!-- //header lists -->
				</div>

			<?php 	} ?>
			</div>
		</div>
	</div>


	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-4 logo_agile">
					<h1 class="text-center">
						<a href="index.html" class="font-weight-bold font-italic">
							<img src="images/logo2.png" alt="logo" class="img-fluid">BangGoods
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-8 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search" >
							<form  action="product.php" method="POST" class="form-inline" >
								<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" required>
								<button class="btn my-2 my-sm-0" type="submit"  id="search_button" >Search</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								
									<button class="btn w3view-cart" type="submit" id="submit_cart" name="submit_cart" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once("resetPassword.php");?>