<!doctype html>
<html lang="en">
<?php
	if(!class_exists('User')){
		
		require_once(dirname(__FILE__)."/../model/User/User.php");
	}
	if(!class_exists('Profile')){
		require_once(dirname(__FILE__)."/../model/User/Profile.php");
	}
	
    global  $result_set; 
    $result_set=getAllUser('*');

?>
	<?php  $title = "Show Product"; ?>

	<!-- top-header -->
        <?php	require_once('header.php');// $result_set=getAllProduct();?>
	<!-- //top-header -->

    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->
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

	<!-- Form -->
   <div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
        <h3 class="tittle-w3l text-center col-md-12 col-xs-12">
            <span>S</span>how  
            <span>A</span>ll   
            <span>U</span>ser</h3>
             <div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                   <div class="product-sec1 px-sm-4 px-4 py-sm-4 py-4 mb-4">
                    
                <div class="row" id="product">
                <table style="width:100%;" class="table table-filter">
								<tbody>
									<tr data-status="pagado">
										<th style="width:10%;vertical-align: middle;text-align:center;">PICTURE</th>
										<th  style="width:17%;vertical-align:middle;text-align:center;">USER NAME</th>
                                        <th  style="width:20%;vertical-align:middle;text-align:center;">MOBILE NO</th>
										<th  style="width:20%;vertical-align: middle;text-align:center;">EMAIL</th>
										<th  style="width:20%;vertical-align: middle;text-align:center;">CRE. DATE / ROLE</th>
									</tr>
								</tbody>
							</table>
                <?php for($i=0;$i<count($result_set);$i++){ ?>
                    <table style="width:100%;" class="table table-filter">
								<tbody>
									<tr data-status="pagado">
										<td style="width:10%;vertical-align: middle;text-align:center;">
											<?php $profile_user = get_user_profile_by_id($result_set[$i]['user_id']);?>
											<?php //if(!empty($profile_user)) { echo '..'.$profile_user->get_profile_image(); } else{ echo '../images/user.jpg';} ?>
											<img src= "<?php if(!empty($profile_user)) { echo '../'.$profile_user->get_profile_image(); } else{ echo '../images/user.jpg';} ?>" alt="profile pic" style="height:50px; width:50px;border-radius:35px;" />
										</td>
										<td style="width:17%;vertical-align: middle;text-align:center;">
                                            <?php echo $result_set[$i]['username'];?>
										</td>
                                        <td  style="width:20%;vertical-align: middle;text-align:center;">
											<div >
												<span ><?php echo $result_set[$i]['mobile_no'];?></span>
											</div>
										</td>
										<td  style="width:20%;vertical-align: middle;text-align:center;">
											<div >
												<span class=" pagado"><?php echo $result_set[$i]['email'];?></span>
											</div>
										</td>
										<td  style="width:20%;vertical-align: middle;text-align:center;">
											<div >
												<span class=" pagado"><?php echo $result_set[$i]['creation_date'];?></span>
											</div>
												<hr class="col-sm-8"/>
												<div class="form-group">
												  <select class="col-sm-8 custom-select" name="userRole" id="userrole" onChange="updateRole(this,<?php echo $result_set[$i]['user_id'];?>)">
														<option value="CUSTOMER" <?php echo strtoUpper($result_set[$i]['role'])=='CUSTOMER' ? 'selected' : '';?>>CUSTOMER</option>
														<option value="DELIVERY" <?php echo strtoUpper($result_set[$i]['role'])=='DELIVERY' ? 'selected' : '';?>>DELIVERY</option>
														<option value="ADMIN" <?php echo strtoUpper($result_set[$i]['role'])=='ADMIN' ? 'selected' : '';?>>ADMIN</option>
													</select>
												</div>
										</td>
									</tr>
								</tbody>
							</table>
                       <?php }?>
                   <!-- -->    
                    </div>
                    </div>
                </div>
            </div>
             </div>
        </div>
    </div>  
    </div>
    <!-- //form -->

    <!-- footer -->
    <?php require_once('footer.php');?>
	<!-- //footer -->
	<script>
	function updateRole(roleObj,user_id)
	{
		var role=roleObj.value;
		var action = 'update_role';
		//alert(role+""+user_id);
		$.ajax({
		url:"../model/User/User.php",
		method:"POST",
		data:{action:action,user_id:user_id,role:role},
		success:function(data){
			//alert(data);
			alert("User role is chenged.");
		},
		error: function(errorThrown){
			alert(errorThrown);
			alert("There is an error with AJAX!");
		}
		});	
	}
	</script>
</body>
</html>