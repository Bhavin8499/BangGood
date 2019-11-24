<!DOCTYPE html>
<html lang="en">
	<?php    $title = "Queries"; ?>
	
	<!-- top-header -->
	<?php require_once('header.php');
		if(!class_exists("Contact")){
			require_once(dirname(__FILE__)."/../model/Contact/Contact.php");
		}
	?>
	<!-- //top-header -->
    
	<!-- navigation -->
        <?php require_once('nevigation.php')?>
	<!-- //navigation -->

	<!-- Posting data -->
	<?php 
		$result_set = getAllContact();
	?>
	<!-- //Posting data -->
	<style>
	/*	--------------------------------------------------
	:: Table Filter
	-------------------------------------------------- */
				.panel {
					border: 1px solid #ddd;
					background-color: #fcfcfc;
				}
				.panel .btn-group {
					margin: 15px 0 30px;
				}
				.panel .btn-group .btn {
					transition: background-color .3s ease;
				}
				.table-filter {
					background-color: #fff;
					border-bottom: 1px solid #eee;
				}
				.table-filter tbody tr:hover {
					cursor: pointer;
					background-color: #eee;
				}
				.table-filter tbody tr td {
					padding: 10px;
					vertical-align: middle;
					border-top-color: #eee;
				}
				.table-filter tbody tr.selected td {
					background-color: #eee;
				}
				.table-filter tr td:first-child {
					width: 38px;
				}
				.table-filter tr td:nth-child(2) {
					width: 35px;
				}
				.table-filter .star {
					color: #ccc;
					text-align: center;
					display: block;
				}
				.table-filter .star.star-checked {
					color: #F0AD4E;
				}
				.table-filter .star:hover {
					color: #ccc;
				}
				.table-filter .star.star-checked:hover {
					color: #F0AD4E;
				}
				.table-filter .media-photo {
					width: 70px;
				}
				.table-filter .media-body {
					display: block;
					/* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
				}
				.table-filter .media-meta {
					font-size: 14px;
					color: #999;
				}
				.table-filter .media .title {
					color: #2BBCDE;
					font-size: 15px;
					font-weight: bold;
					line-height: normal;
					margin: 0;
				}
				.table-filter .media .title span {
					font-size: .8em;
					margin-right: 20px;
				}
				.table-filter .media .title span.pagado {
					color: #5cb85c;
				}
				.table-filter .media .title span.pendiente {
					color: #f0ad4e;
				}
				.table-filter .media .title span.cancelado {
					color: #d9534f;
				}
				.table-filter .media .summary {
					font-size: 20px;
				}
	</style>
	<!-- contact -->
	<div class="ads-grid col-md-12 col-xs-12 py-sm-4 py-4">
		<div class="container-fluid ">
    			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center   mb-3">
				<span>C</span>ontact
				<span>U</span>s 
				<span>M</span>essages
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="wrapper col-md-12 col-lg-12">
                   <div class="product-sec1 px-sm-4  py-sm-4  mb-2">
				   <div align="center">
							   <?php for($i=0;$i<count($result_set);$i++)
							   {
								   ?>
							<table style="width:90%;" class="table table-filter">
								<tbody>
									<tr data-status="pagado">
										<td style="width:10%;vertical-align: middle;">
											<a href="#"  >
												<img src="https://s3.amazonaws.com/uifaces/faces/twitter/fffabs/128.jpg" class="media-photo">
											</a>		
										</td>
										<td style="padding-left:50px;width:70%;vertical-align: middle;">
											<div class="media">
												<div class="media-body">
													<span class="media-meta"><?php echo $result_set[$i]['name'];?></span>
													<h4 class="title">
													<?php echo $result_set[$i]['subject'];?>
														<span class="pagado"></span>
													</h4>
													<p class="summary"><?php echo $result_set[$i]['message'];?></p>
												</div>
											</div>
										</td>
										<td  style="width:20%;vertical-align: middle;">
											<div >
												<span class="media-meta pull-right"><?php echo $result_set[$i]['email'];?></span>
												<br>
												<span class="pull-right pagado"><?php echo $result_set[$i]['contact_no'];?></span>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //contact -->

	<!-- map 
	<div class="map mt-sm-0 mt-4">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805196.5077734194!2d144.49270863101745!3d-37.97015423820711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne+VIC%2C+Australia!5e0!3m2!1sen!2sin!4v1474020956974"
		    allowfullscreen></iframe>
	</div>-->
	<!-- //map -->

    <!-- footer -->
           <?php require_once('footer.php')?>
	<!-- //footer -->
</body>

</html>