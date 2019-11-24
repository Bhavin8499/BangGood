<!DOCTYPE html>
<html lang="en">
	<?php    $title = "All Brands"; ?>
	
	<!-- top-header -->
	<?php require_once('header.php');
		if(!class_exists('Categories'))
        {
         require_once(dirname(__FILE__)."/../model/Categories/Categories.php");
        }
	?>
	<!-- //top-header -->
    
	<!-- navigation -->
        <?php require_once('nevigation.php')?>
	<!-- //navigation -->

	<!-- Posting data -->
	<?php 

        $cate=get_parent_categories();
	?>
	<!-- //Posting data -->
	<!-- contact -->
	<div class="ads-grid col-md-12 col-xs-12 py-sm-4 py-4">
		<div class="container-fluid ">
    			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center   mb-3">
				<span>A</span>ll
				<span>B</span>rand
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="wrapper col-md-12 col-lg-12">
                   <div class="product-sec1 px-sm-4  py-sm-4  mb-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i=0;$i<count($cate);$i++)
                        {?>
                            <tr class="table-primary">
                                <td><?php echo $cate[$i]->cateID;?></td>
                                <td><?php echo $cate[$i]->cateName;?></td>
                                <td><?php echo $cate[$i]->cateParent;?></td>
                                <td><?php echo $cate[$i]->cateDesc;?></td>
                            </tr>
                            <?php $brand = get_child_category($cate[$i]->cateID);
                                if(count($brand)>0)
                                { 
                                    for($j=0;$j<count($brand);$j++)
                                    { ?>
                                <tr class="table-light">
                                    <td><?php echo $brand[$j]->cateID;?></td>
                                    <td><?php echo $brand[$j]->cateName;?></td>
                                    <td><?php echo $brand[$j]->cateParent;?></td>
                                    <td><?php echo $brand[$j]->cateDesc;?></td>
                                </tr>

                                    <?php }
                        }
                     } ?>
                        </tbody>
                    </table>
                    </div>
				</div>
			</div>
		</div>
	</div>
	
    <!-- footer -->
           <?php require_once('footer.php')?>
	<!-- //footer -->
</body>

</html>