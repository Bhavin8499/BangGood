<!DOCTYPE html>
<html lang="en">
	
	<?php    $title = "All Orders"; ?>

	<!-- header -->
    <?php require_once('header.php');?>
    <!-- //header -->
    <style>
        span {
          margin-left: 10px;
        }
        </style>
    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->
    <div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center col-md-12 col-xs-12">
				<span>A</span>ll
				<span>O</span>rders</h3>
            <!-- //tittle heading -->
            <?php 
                for($i=1;$i<=3;$i++)
                {?>
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                    <div class="product-sec1 px-sm-4 py-3 mb-4">
                        <table class="table table-striped table-bordered" data-page-length='10'>
                                <tr style="border-bottom:1px;">
                                    <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. :</H5><span class="text-secondary">11234</span>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center"> 1
                                        </div>
                                    </td>

                                    <td style="width:200px;"><b>Buyer : </b>Bhavin Sanchaniya<br />
                                        <span style="color:Gray; font-size:x-small;">Number Of Items : 10
                                            <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span><br />
                                        <span style="color:Gray; font-size:x-small;">Price : 1000
                                            <!--<% Response.Write(readerProduct["Type"].ToString()); %>--></span>
                                    </td>

                                    <td style="min-width:200px;"><b>Payment Staus : <?php echo ""; ?><hr/>
                                    Contact Number : <?php echo ""; ?><hr/>Order Staus : <?php echo ""; ?></b>
                                    </td>

                                    <td>
                                        <div class="text-center">
                                            <b>Address</b>
                                            <hr style="margin:2px;">
                                            <p><?php echo " line 1 "; ?></p>
                                            <hr style="margin:2px;">
                                            <p><?php echo " line 1 "; ?></p>
                                            <hr style="margin:2px;">
                                            <p><?php echo " line 1 "; ?></p>
                                            <hr style="margin:2px;">
                                            <p><?php echo " line 1 "; ?></p>
                                        </div>
                                    
                                    </td>

                                    <td>
                                        <div class="text-center" style="height: 100%;">
                                            <button type="button" class="btn btn-primary" style="width:100%; max-width:150px; " >Track Order</button><br />
                                            <button type="button" class="btn btn-success" style="margin-top:10px;width:100%;max-width:150px;">Approve</button><br />
                                            <button type="button" class="btn btn-danger" style="margin-top:10px; width:100%; max-width:150px;">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                    </div >
                    </div>
                </div>    
                <?php } ?>
            </div>
            
        </div>
    </div>     
    <?php require_once('footer.php');?>
    </body>

</html>