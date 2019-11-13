<!DOCTYPE html>
<html lang="en">
	
	<?php    $title = "All Orders"; ?>

	<!-- header -->
    
    <?php require_once('header.php');?>
    <!-- //header -->
    
    <!-- navigation -->
    <?php require_once('nevigation.php');
    
    $id = $_GET['id'];

    include("model/Cart/Order.php");
    $order = getOrderByID($id);

    //print_r($order);

    ?>
	<!-- //navigation -->
    <?php $status="c1";?>

    <div class="ads-grid col-md-12 col-xs-12">
		<div class="container-fluid">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center col-md-12 col-xs-12">
				<span>T</span>rack
				<span>O</span>rder</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="wrapper col-md-12 col-xs-12">
                <div class="product-sec1 px-sm-4 px-3 py-3 mb-4">
                   <div class="row shop-tracking-status">
                   <div class="col-md-12">
                        <div class="well">
                            <div class="order-status">
                            <div class="order-status-timeline">
                                <!-- class names: c0 c1 c2 c3 and c4 -->
                                <div class="order-status-timeline-completion <?php echo $status;?>"></div>
                            </div>

                            <div class="image-order-status image-order-status-new active img-circle">
                                <span class="status">Accepted</span>
                                <div class="icon"></div>
                            </div>
                            <div class="image-order-status image-order-status-active active img-circle">
                                <span class="status">In progress</span>
                                <div class="icon"></div>
                            </div>
                            <div class="image-order-status image-order-status-intransit active img-circle">
                                <span class="status">Out For Shipping</span>
                                <div class="icon"></div>
                            </div>
                            <div class="image-order-status image-order-status-delivered active img-circle">
                                <span class="status">Delivered</span>
                                <div class="icon"></div>
                            </div>
                            <div class="image-order-status image-order-status-completed active img-circle">
                                <span class="status">Completed</span>
                                <div class="icon"></div>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>  
                    <p class="text-info">
                        Oreder Number :<span class="text-dark"><?php echo $order->order_id; ?></span>
                    </p>
                    <hr />
                    <p class="text-secondary">
                        Number Of Items:<span class="text-dark"><?php echo $order->getOrderProductCount(); ?></span>  </p>
                    <div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
                        <?php 

                        $result_set = $order->getProducts();
                        if (!empty($result_set))
                        {
                          for($i=0;$i<count($result_set);$i++)
                           {
                               $p[$i] = new Product($result_set[$i]->pro_id);
                               ?>
                                        <tr class="rem1">
                                        <td class="invert"><?php echo $i+1;?></td>
                                        <td class="invert-image" >
                                            <a href="single.php?pro_id=<?php echo $p[$i]->pro_id;?>">
                                                <?php $image = Unserialize($p[$i]->images);?>
                                                <img src="<?php echo $image[0]; ?>" alt=" " class="img-responsive" style="max-height:200px; width:auto;">
                                            </a>
                                        </td>
                                        <td class="invert">
                                            <?php echo $result_set[$i]->qty; ?><br>
                                            <input type='hidden' name='pro_id' value='<?php echo $result_set[$i]->pro_id; ?>' onclick='this' class='pro_id' />
                                        </td>
                                        <td class="invert"><?php echo $p[$i]->name; ?></td>
                                        <td class="invert"><?php echo $p[$i]->mrp; ?></td>
                                        <td class="invert"> <p><span id="tot_mrp<?php echo $p[$i]->pro_id;?>"> <?php echo $p[$i]->mrp*$result_set[$i]->qty; ?> </span></p></td>
                                       
                                        </td>
                                        </tr>
                                <?php } ?>
                                
                                <?php }?>
                        </tbody>
					</table>
                </div>
                </div>
                </diV>
            </diV>
        </diV>
    </diV>

    <!-- footer -->
    <?php require_once('footer.php');?>
    <!-- footer -->
    <style>
        .shop-tracking-status .form-horizontal{margin-bottom:50px}
        .shop-tracking-status .order-status{margin-top:80px;position:relative;margin-bottom:80px}
        .shop-tracking-status .order-status-timeline{height:12px;border:1px solid #aaa;border-radius:7px;background:#eee;box-shadow:0px 0px 5px 0px #C2C2C2 inset}.shop-tracking-status .order-status-timeline .order-status-timeline-completion{height:8px;margin:1px;border-radius:7px;background:#cf7400;width:0px}
        .shop-tracking-status .order-status-timeline .order-status-timeline-completion.c1{width:22%}
        .shop-tracking-status .order-status-timeline .order-status-timeline-completion.c2{width:46%}
        .shop-tracking-status .order-status-timeline .order-status-timeline-completion.c3{width:70%}
        .shop-tracking-status .order-status-timeline .order-status-timeline-completion.c4{width:100%}
        .shop-tracking-status .image-order-status{border:1px solid #ddd;padding:7px;box-shadow:0px 0px 10px 0px #999;background-color:#fdfdfd;position:absolute;margin-top:-35px}.shop-tracking-status .image-order-status.disabled{filter:url("data:image/svg+xml;utf8,<svg%20xmlns='http://www.w3.org/2000/svg'><filter%20id='grayscale'><feColorMatrix%20type='matrix'%20values='0.3333%200.3333%200.3333%200%200%200.3333%200.3333%200.3333%200%200%200.3333%200.3333%200.3333%200%200%200%200%200%201%200'/></filter></svg>#grayscale");filter:grayscale(100%);-webkit-filter:grayscale(100%);-moz-filter:grayscale(100%);-ms-filter:grayscale(100%);-o-filter:grayscale(100%);filter:gray;}
        .shop-tracking-status .image-order-status.active{box-shadow:0px 0px 10px 0px #cf7400}.shop-tracking-status .image-order-status.active .status{color:#cf7400;text-shadow:0px 0px 1px #777}
        .shop-tracking-status .image-order-status .icon{height:40px;width:40px;background-size:contain;background-position:no-repeat;:5px;}
        .shop-tracking-status .image-order-status .status{position:absolute;text-shadow:1px 1px #eee;color:#333;width:180px;top:-20px;left:50px}.shop-tracking-status .image-order-status .status:before{font-family:FontAwesome;content:" -";padding-right:5px}
        .shop-tracking-status .image-order-status-new{left:0}.shop-tracking-status .image-order-status-new .icon{background-image:url('./images/accepted.png');}
        .shop-tracking-status .image-order-status-active{left:22%}.shop-tracking-status .image-order-status-active .icon{background-image:url('./images/inprogress.png');}
        .shop-tracking-status .image-order-status-intransit{left:45%}.shop-tracking-status .image-order-status-intransit .icon{background-image:url('./images/shipping.png') ;}
        .shop-tracking-status .image-order-status-delivered{left:70%}.shop-tracking-status .image-order-status-delivered .icon{background-image: url('./images/delivered.png') ;}
        .shop-tracking-status .image-order-status-delivered .status{top:45px;left:-180px;text-align:right}.shop-tracking-status .image-order-status-delivered .status:before{display:none}
        .shop-tracking-status .image-order-status-delivered .status:after{font-family:FontAwesome;content:"-";padding-left:5px;vertical-align:middle}
        .shop-tracking-status .image-order-status-completed{right:0px}.shop-tracking-status .image-order-status-completed .icon{background-image: url('./images/completed.png');}
        .shop-tracking-status .image-order-status-completed .status{top:45px;left:-180px;text-align:right}.shop-tracking-status .image-order-status-completed .status:before{display:none}
        .shop-tracking-status .image-order-status-completed .status:after{font-family:FontAwesome;content:"-";padding-left:5px;vertical-align:middle}
    </style>
    
    </body>

</html>