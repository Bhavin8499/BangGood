<!doctype html>
<html lang="en">
	<!-- top-header -->
	<?php
		$title = "Admin | Home";
		require_once('header.php');
		?>
	<!-- //top-header -->

<?php 
if(isset($_SESSION['user_id']))
{
	?>
	
    
    
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->

	<!-- top Products -->
	<div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid px-sm-4 px-3 py-sm-5 py-3 mb-4">
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
							<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
								<div class="row d-flex justify-content-center">
									<span > <h3> Welcome to Admin</h3></span>
						</div>
					</div>
							
							<!-- second section -->
				
						<!-- //fourth section -->
						</div>
					</div>
			
				</div>
			</div>
	<!-- //top products -->

			</div>
		</div>
	
	<?php require_once('footer.php');?>
	<!-- //footer -->

</body>

</html>
	<?php } 
	else
		{
			echo "<script>alert('Login First...');window.location ='../index.php';</script>";
		}
?>