<!DOCTYPE html>
<html lang="en">

	<?php    $title = "About Us"; ?>
	
	<!-- top-header -->
	<?php require_once('header.php');?>
	<!-- //shop locator (popup) -->

    <!-- modals -->
    
    <!-- //top-header -->

  	<!-- shop locator (popup) -->
    
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
.card 
{
    padding-top: 20px;
    margin: 10px 0 20px 0;
    background-color: rgba(214, 224, 226, 0.2);
    border-top-width: 0;
    border-bottom-width: 2px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    min-height: 500px;
     box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.35);
}

.card .card-heading {
    padding: 0 20px;
    margin: 0;
}

.card .card-heading.simple {
    font-size: 20px;
    font-weight: 300;
    color: #777;
    border-bottom: 1px solid #e5e5e5;
}

.card .card-heading.image img {
    display: inline-block;
    width: 46px;
    height: 46px;
    margin-right: 15px;
    vertical-align: top;
    border: 0;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
}

.card .card-heading.image .card-heading-header {
    display: inline-block;
    vertical-align: top;
}

.card .card-heading.image .card-heading-header h3 {
    margin: 0;
    font-size: 14px;
    line-height: 16px;
    color: #262626;
}

.card .card-heading.image .card-heading-header span {
    font-size: 12px;
    color: #999999;
}

.card .card-body {
    padding: 0 20px;
    margin-top: 20px;
}

.card .card-media {
    padding: 0 20px;
    margin: 0 -14px;
}

.card .card-media img {
    max-width: 100%;
    max-height: 100%;
}

.card .card-actions {
    min-height: 30px;
    padding: 0 20px 20px 20px;
    margin: 20px 0 0 0;
}

.card .card-comments {
    padding: 20px;
    margin: 0;
    background-color: #f8f8f8;
}

.card .card-comments .comments-collapse-toggle {
    padding: 0;
    margin: 0 20px 12px 20px;
}

.card .card-comments .comments-collapse-toggle a,
.card .card-comments .comments-collapse-toggle span {
    padding-right: 5px;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.card-comments .media-heading {
    font-size: 13px;
    font-weight: bold;
}

.card.people {
    position: relative;
    display: inline-block;
    width: 170px;
    height: 300px;
    padding-top: 0;
    margin-left: 20px;
    overflow: hidden;
    vertical-align: top;
}

.card.people:first-child {
    margin-left: 0;
}

.card.people .card-top {
    position: absolute;
    top: 0;
    left: 0;
    display: inline-block;
    width: 170px;
    height: 150px;
    background-color: #ffffff;
}

.card.people .card-top.green {
    background-color: #53a93f;
}

.card.people .card-top.blue {
    background-color: #427fed;
}

.card.people .card-info {
    position: absolute;
    top: 150px;
    display: inline-block;
    width: 100%;
    height: 101px;
    overflow: hidden;
    background: #ffffff;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.people .card-info .title {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 16px;
    font-weight: bold;
    line-height: 18px;
    color: #404040;
}

.card.people .card-info .desc {
    display: block;
    margin: 8px 14px 0 14px;
    overflow: hidden;
    font-size: 12px;
    line-height: 16px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.people .card-bottom {
    position: absolute;
    bottom: 0;
    left: 0;
    display: inline-block;
    width: 100%;
    padding: 10px 20px;
    line-height: 29px;
    text-align: center;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: rgba(214, 224, 226, 0.2);
}

.card.hovercard .cardheader {
    background-size: cover;
    height: 175px;
}

.card.hovercard .avatar {
    position: relative;
    top: -75px;
    margin-bottom: -75px;
}

.card.hovercard .avatar img 
{
	
    width: 150px;
    height: 150px;
    max-width: 150px;
    max-height: 150px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255,255,255,0.5);
}

.card.hovercard .info {
    padding: 4px 8px 10px;
}

.card.hovercard .info .title {
    margin-bottom: 4px;
    font-size: 24px;
    line-height: 1;
    color: #262626;
    vertical-align: middle;
}

.card.hovercard .info .desc {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}

.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}

.btn{ border-radius: 10%; width:35px; height:35px; line-height:22px;  }

@fa-stack-overflow: #fe7a15;

</style>

    <!-- navigation -->
    <?php require_once('nevigation.php');?>
	<!-- //navigation -->


	<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>A</span>bout
				<span>U</span>s</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-6 col-sm-6">
 	           <div class="card hovercard">
                <div class="cardheader" style="background-image:url('images/profile background.jpg');">
                </div>
                <div class="avatar">
                    <img alt="" src="images/bhavin.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="https://scripteden.com/">Bhavin Sanchaniya</a>
                    </div><br />
                    <div class="display-5" style="text-align:left; padding-left:16%;"><b>Enrollment Number</b> : 195223693010</div>
                    <div class="display-5" style="text-align:left; padding-left:16%;"><b>College Name</b> : Marwadi Eduction Foundation</div>					
                 <div class="display-5" style="text-align:left; padding-left:16%;"><b>Work At</b> : iFlash apps</div>					
                 <div class="display-5" style="text-align:left; padding-left:16%;"><b>Current Position</b> : Junior iOS Developer</div>					
                </div><br />
                <div class="bottom" style="background-color:#38a4ff; padding:4px;">
                    <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/SanchaniyaBhav1">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/111610564764014992243">
                        <i class="fa fa-google"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://www.facebook.com/bhavin.sanchaniya.5" >
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-sm" rel="publisher" style="background-color:rgb(242, 243, 243);" href="https://stackoverflow.com/users/10429259/bhavin-sanchaniya">
                        <i class="fa fa-stack-overflow" style="color:#fe7a15;"></i>
                    </a>
                    <a class="btn btn-sm" rel="publisher" style="background-color:rgb(242, 243, 243);" href="https://www.youtube.com/channel/UCM_SL_Dd_I-fo8Yrjaj_thw">
                        <i class="fa fa-youtube-play" style="color:#e52d27;"></i>
                    </a>                    
                    <a class="btn btn-sm" rel="publisher" style="background-color:rgb(242, 243, 243);" href="https://github.com/Bhavin8499">
                        <i class="fa fa-github" style="color:Black;"></i>
                    </a>
                </div>
            </div>

        </div>
		<!-- Second Portfolio -->
        <div class="col-lg-6 col-sm-6">
            <div class="card hovercard">
                <div class="cardheader"  style="background-image:url('./images/profile background.jpg');">
                </div>
                <div class="avatar">
                    <img alt="" src="images/harsh.jpeg">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="https://scripteden.com/">Harsh Chhatbar</a>
                    </div><br />
                    <div class="display-5" style="text-align:left; padding-left:16%;"><b>Enrollment Number</b> : 195223693026</div>
                    <div class="display-5" style="text-align:left; padding-left:16%;"><b>College Name</b> : Marwadi Eduction Foundation</div>		
               		<div class="display-5" style="text-align:left; padding-left:16%;"><b>Work At</b> : Freelancer</div>					
                 	<div class="display-5" style="text-align:left; padding-left:16%;"><b>Current Position</b> : Student</div>					
                
                </div><br />
                <div class="bottom" style="background-color:#38a4ff; padding:4px;">
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="https://plus.google.com/+ahmshahnuralam">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="https://plus.google.com/shahnuralam">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
            </div>
		</div>

			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- footer -->
	<?php require_once('footer.php');?>
			<!-- //footer -->
</body>

</html>