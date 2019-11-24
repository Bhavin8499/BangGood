<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
					<li class="nav-item dropdown mr-lg-5 mb-lg-0 mb-2">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product		
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="addProduct.php">New Product</a>	
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="showallProduct.php">Show All Product</a>
						</div>	
						</li>
						<li class="nav-item dropdown mr-lg-5 mb-lg-0 mb-2">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brand
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" a href="#" data-toggle="modal" data-target="#addBrand" class="dropdown-item">Add New Brand</a>	
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="showallBrand.php">Show All Brand</a>
						</div>	
						</li>
						
						<li class="nav-item mr-lg-5 mb-lg-0 mb-2">
							<a class="nav-link" href="currentorder.php">Show All Order</a>
						</li>
						<li class="nav-item mr-lg-5 mb-lg-0 mb-2">
						</li>
						<li class="nav-item dropdown mr-lg-5 mb-lg-0 mb-2">
							<a class="nav-link" href="showallUser.php">Users</a>
						</li><li class="nav-item mr-lg-5 mb-lg-0 mb-2">
						</li>
						<li class="nav-item mr-lg-5 mb-lg-0 mb-2">
							<a class="nav-link" href="querys.php">Queries</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<?php require_once("addBrand.php");?>