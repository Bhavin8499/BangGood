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
                for($i=1;$i<=1;$i++)
                {?>
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                    <div class="product-sec1 px-3  py-3 mb-4">
                                <table style="width:100%;" class="table table-striped table-bordered" data-page-length='10'>
                            <tr style="border-bottom:1px;">
                                <H5 style="font-size:medium; margin:10px; margin-top:20px;">Order ID. :<span class="text-secondary"><?php echo "";?></span></span></H5>
                            </tr>
                            <tr >
                                <td style="width:6%;vertical-align: middle;" >
                                    <div class="text-center"> <?php echo "";?> </div>  
                                </td>
                                <td style="width:22%;vertical-align: middle;">
                                    <p class="text-info">Number Of Items:<span class="text-dark"><?php echo ""; ?></span></p>
                                    <hr />
                                    <b><p class="text-secondary">Price : <span class="item_price "><?php echo ""; ?></span></p></b>
                                </td>
                                <td style="min-width:20%;vertical-align: middle;" >
                                        <b> 
                                            Payment Method : <?php echo ""; ?>
                                         </b> 
                                        <hr/>
                                         <b>
                                             Order Staus : <?php echo ""; ?>
                                         </b>
                                </td>
                                <td style="width:20%;vertical-align: middle;">
                                    <div class="text-center" style="height: 100%;">
                                        <a href="viewOrder.php"><button type="button" class="btn btn-primary" style="width:100%; max-width:150px; " >Track Order</button></a><br />
                                        <button type="button" class="btn btn-danger" style="margin-top:10px; width:100%; max-width:150px;">Cancel</button>
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