<?php
	session_start();
?>
<head>
	<title> <?php echo $title; ?> </title>
	
	<link rel = "icon" type = "image/png" href = "../images/logo2.png">
    
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
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="../css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="../css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<script src="../plugin/ckeditor/ckeditor.js"></script>
	<!--<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    wyswing editor-->    
	<!-- //Custom-Files -->

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
				<div class="col-md-4 header-most-top">
					<p class="text-white text-lg-left text-center">B a n g G o o d s - 
						<i class="fas fa-shopping-cart ml-1"></i> - D E L I V E R Y
					</p>
				</div>
				<div class="col-md-8 header-right mt-lg-0 mt-2">
					<ul>
						<li class="text-center text-white">
						</li>
						<li class="text-center text-white">
						</li>
						<li class="text-center text-white">
						</li>
						<li class="text-center text-white">
						</li>
						<li class="text-center border-right text-white">
							<a href="logout.php" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i> Log Out </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>