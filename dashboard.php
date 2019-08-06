<?php
	include('function.php');
	login_required();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>RSS-Feed | Dashboard</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="assets/plugins/themify/css/themify.css" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="assets/plugins/angular-tooltip/angular-tooltips.css" rel="stylesheet">
		
		<!-- Morris Charts CSS -->
		<link href="assets/plugins/morris.js/morris.css" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/glovia.css" rel="stylesheet">
		<link href="css/glovia-responsive.css" rel="stylesheet">

		<!-- Custom styles for Color -->
		<link href="css/skins/default.css" rel="stylesheet">
	</head>

	<body class="fixed-nav sticky-footer red-skin" id="page-top">
	
		<!-- ===============================
			Navigation Start
		====================================-->
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
			
			<!-- Start Header -->
			<header class="header-logo">
				<a class="nav-link text-center mr-lg-3 hidden-xs" id="sidenavToggler"><i class="ti-align-left"></i></a>
				<a class="navbar-brand" href="index.html">RSS-FEED</a>
			</header>
			<!-- End Header -->
			
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="ti-align-left"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarResponsive">
				 
				<!-- =============== Start Side Menu ============== -->
				<div class="navbar-side">
				  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				  
				    <!-- Start Dashboard-->
					<li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
					  <a class="nav-link nav-link-collapse" data-toggle="collapse" href="#Dashboard" data-parent="#exampleAccordion">
						<i class="ti ti-dashboard"></i>
						<span class="nav-link-text">Dashboard</span>
					  </a>
					  <ul class="sidenav-second-level collapse" id="Dashboard">
						<li>
						  <a href="all_post.php">All Posts</a>
						</li>
						<li>
						  <a href="published_post.php">Published Posts</a>
						</li>
						<li>
						  <a href="saved_post.php">Saved Posts</a>
						</li>
						<li>
						  <a href="declined_post.php">Declined Posts</a>
						</li>
						<li>
						  <a href="url.php">URLS</a>
						</li>
						<li>
						  <a href="keyword.php">Keywords</a>
						</li>
					  </ul>
					</li>
					<!-- End Dashboard -->

				  </ul>
			  </div>
			 <!-- =============== End Side Menu ============== -->
			  
			  <!-- =============== Search Bar ============== -->
			  <ul class="navbar-nav ml-left">
				<li class="nav-item">
				  <form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="button">
							  <i class="ti-search"></i>
							</button>
						</span>
					  <input class="form-control" type="text" placeholder="Type In TO Search">
					</div>
				  </form>
				</li>
			  </ul>
			  <!-- =============== End Search Bar ============== -->
			  
			  <!-- =============== Header Rightside Menu ============== -->
			  <ul class="navbar-nav ml-auto">
			  </ul>
			  <!-- =============== End Header Rightside Menu ============== -->
			</div>
			<a class="w3-button" href="logout.php">Logout </a>
			<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
		</nav>
		<!-- =====================================================
		                    End Navigations
		======================================================= -->
	  
		<!-- ================================================
				Start Main Container Wrapper
		================================================== -->
		<div class="content-wrapper">
			<div class="container-fluid">
			
				<!-- Title & Breadcrumbs-->
				<div class="row page-titles">
					<div class="col-md-12 align-self-center">
						<h4 class="theme-cl">Dashboard</h4>
					</div>
				</div>
				<!-- Title & Breadcrumbs-->
				
				<!-- row -->
				<div class="row">
					
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="float-right">
									<i class="icon ti-user gredient-cl font-30"></i>
								</div>
								<div class="widget-detail">
									<h4 class="mb-1"><?php echo total_post_count() ?></h4>
									<span>All Posts</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="float-right">
									<i class="ti-shopping-cart-full gredient-cl font-30"></i>
								</div>
								<div class="widget-detail">
									<h4 class="mb-1"><?php echo published_post_count() ?></h4>
									<span>Published Posts</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="float-right">
									<i class="icon ti-medall gredient-cl font-30"></i>
								</div>
								<div class="widget-detail">
									<h4 class="mb-1"><?php echo declined_post_count() ?></h4>
									<span>Declined Posts</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-6">
						<div class="card">
							<div class="card-body">
								<div class="float-right">
									<i class="icon ti-briefcase gredient-cl font-30"></i>
								</div>
								<div class="widget-detail">
									<h4 class="mb-1"><?php echo saved_post_count() ?></h4>
									<span>Saved Posts</span>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- /row -->
				
				<!-- row -->
				<!-- /.row -->
				
				<!-- row -->
				<div class="row">
				
					<!-- Order Status -->
					<div class="col-md-4 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">RSS Feeds</h4>
								<a href="#add_url" class="btn-modal" data-toggle="modal" data-target="#add_url"><i class="ti-plus"></i></a>							</div>
							<div class="card-body padd-0">
								<div class="table-responsive">
									<table class="table table-lg table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>Link</th>
												<th>Created At</th>
											</tr>
										</thead>
										
										<tbody>
											<?php
												$feeds = get_latest_feeds();
												foreach($feeds as $feed){
											?>
											<tr>
												<td><?php echo $feed['id'] ?></td>
												<td><?php echo $feed['url']?> </td>
												<td><?php echo $feed['created_at'] ?></td>   
											</tr>
											<?php 
												}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Posts</h4>
								<a href="create_post.php" class="btn" ><i class="ti-plus"></i></a>

							</div>
							<div class="card-body padd-0">
								<div class="table-responsive">
									<table class="table table-lg table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>URL</th>
												<th>Status</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td><a href="#"><img src="http://via.placeholder.com/180x180" class="avatar" alt="Avatar">Livka Lice</a></td>
												<td>#258475</td>
												<td><div class="label cl-success bg-success-light">Paid</div></td>   
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Browser Stats -->
					<div class="col-md-2 col-sm-12">
						<div class="card">
							<div class="card-header">
								<h6>Keywords</h6>
								<a href="#add_keyword" class="btn-modal" data-toggle="modal" data-target="#add_keyword"><i class="ti-plus"></i></a>
							</div>

							<?php 
								$keywords = get_latest_keywords();
								foreach($keywords as $keyword){
							?>
							<div class="ground-list todo-browser ground-list-hove">
								<div class="ground ground-single-list padd-0">
									<a class="todo todo-default" href="#">
									  <span class="ct-title">
										<?php echo $keyword['word'] ?>
									  </span>
									</a>
								</div>
							</div>
							<?php

								}
							 ?>
						</div>	
					</div>
					
				</div>
				<!-- /.row -->
				

			</div>  
			<!-- /.content-wrapper -->
			
			<!-- Footer -->
			<footer class="sticky-footer">
			  <div class="container">
				<div class="text-center">
				  <small class="font-15">Copyright © Glovia Made With <i class="fa fa-heart cl-danger"></i> In India</small>
				</div>
			  </div>
			</footer>
			<!-- /Footer -->
			
			<!-- Switcher Start -->
			<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
				<div class="rightMenu-scroll">
				
					<button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large theme-bg">Setting Pannel <i class="ti-close"></i></button>
					<div class="right-sidebar" id="side-scroll">
						<div class="user-box">
						
							<div class="profile-img">
								<img src="https://via.placeholder.com/120x120" alt="user">
								<!-- this is blinking heartbit-->
								<div class="notify setp"> <span class="heartbit"></span> <span class="point"></span> </div>
							</div>
							<div class="profile-text">
								<h4>Daniel Dax</h4>
								 <a href="#" class="bg-info-light"><i class="ti-settings"></i></a>
								 <a href="#" class="bg-warning-light"><i class="ti-email"></i></a>
								 <a href="#" class="bg-success-light"><i class="ti-headphone"></i></a>
								 <a href="#" class="bg-danger-light"><i class="ti-power-off"></i></a>
							</div>
							
							<div class="tabbable-line">
							
								<ul class="nav nav-tabs ">
								
									<li class="active">
										<a class="bg-primary-light" href="#options" data-toggle="tab">
										<i class="ti-palette"></i> </a>
									</li>
									
									<li>
										<a class="bg-danger-light" href="#notification" data-toggle="tab">
										<i class="ti-bell"></i> </a>
									</li>
									
									<li>
										<a class="bg-success-light" href="#all-messages" data-toggle="tab">
										<i class="ti-comment-alt"></i> </a>
									</li>
									
								</ul>
								
								<div class="tab-content">
								
									<!-- Option Tab -->
									<div class="tab-pane active" id="options">
										
										<ul id="themecolors" class="m-t-20">
											<li><a href="javascript:void(0)" data-skin="red-skin" class="default-theme">1</a></li>
											<li><a href="javascript:void(0)" data-skin="green-skin" class="green-theme">2</a></li>
											<li><a href="javascript:void(0)" data-skin="blue-skin" class="blue-theme">3</a></li>
											<li><a href="javascript:void(0)" data-skin="yellow-skin" class="yellow-theme">4</a></li>
											<li><a href="javascript:void(0)" data-skin="purple-skin" class="purple-theme">5</a></li>
											<li><a href="javascript:void(0)" data-skin="cyan-skin" class="cyan-theme">6</a></li>
										</ul>
										<ul id="themecolors" class="m-t-20">
											<li><a href="javascript:void(0)" data-skin="red-skin-light" class="default-light-theme working">7</a></li>
											<li><a href="javascript:void(0)" data-skin="green-skin-light" class="green-light-theme">8</a></li>
											<li><a href="javascript:void(0)" data-skin="blue-skin-light" class="blue-light-theme">9</a></li>
											<li><a href="javascript:void(0)" data-skin="yellow-skin-light" class="yellow-light-theme">10</a></li>
											<li><a href="javascript:void(0)" data-skin="purple-skin-light" class="purple-light-theme">11</a></li>
											<li><a href="javascript:void(0)" data-skin="cyan-skin-light" class="cyan-light-theme ">12</a></li>
										</ul>
										
									</div>
									
									<!-- Active User -->
									<div class="tab-pane" id="notification">
									
										<div class="ground-list ground-list-hove">
											<div class="ground ground-single-list">
												<a href="#">
													<div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Check New Admin Dashboard..</small>
													<span class="small">Just Now</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">You can Customize..</small>
													<span class="small">02 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Need Responsive Business Tem...</small>
													<span class="small">10 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Next Meeting on Tuesday..</small>
													<span class="small">15 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<div class="btn-circle-40 btn-purple"><i class="ti-calendar"></i></div>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">You can Change Your Pass..</small>
													<span class="small">18 Min Ago</span>
												</div>
											</div>
										</div>
										
									</div>
									
									<!-- All Messages -->
									<div class="tab-pane" id="all-messages">
									
										<div class="ground-list ground-list-hove">
											<div class="ground ground-single-list">
												<a href="#">
													<img class="ground-avatar" src="https://via.placeholder.com/80x80" alt="...">
													<span class="profile-status bg-online pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">Online</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<img class="ground-avatar" src="https://via.placeholder.com/80x80" alt="...">
													<span class="profile-status bg-offline pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">10 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<img class="ground-avatar" src="https://via.placeholder.com/80x80" alt="...">
													<span class="profile-status bg-working pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">20 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<img class="ground-avatar" src="https://via.placeholder.com/80x80" alt="...">
													<span class="profile-status bg-busy pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">18 Min Ago</span>
												</div>
											</div>
											
											<div class="ground ground-single-list">
												<a href="#">
													<img class="ground-avatar" src="https://via.placeholder.com/80x80" alt="...">
													<span class="profile-status bg-online pull-right"></span>
												</a>

												<div class="ground-content">
													<h6><a href="#">Maryam Amiri</a></h6>
													<small class="text-fade">Co-Founder</small>
												</div>

												<div class="ground-right">
													<span class="small">Online</span>
												</div>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
			<!-- /Switcher -->
			<div class="modal modal-box-2 fade" id="add_url" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content" id="myModalLabel">
						<div class="modal-header theme-bg">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<h3>Add a <span>Feed URL</span></h3>
							
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" id="feeds_modal_input" class="form-control" placeholder="url" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 text-center">
										<div id="success-msg">The url has been added successfully</div>
										<button type="submit" onclick="addFeed()" class="btn modal-btn">Add</button>
									</div>
								</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="modal modal-box-2 fade" id="add_keyword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content" id="myModalLabel">
						<div class="modal-header theme-bg">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<h3>Add a <span>Keyword</span></h3>
							
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" id="keyword_box_modal" class="form-control" placeholder="Keyword" >
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 text-center">
										<div id="success-msg">The keyword has been added successfully</div>
										<button type="submit" onclick="addKeyword()" class="btn modal-btn">Add</button>
									</div>
								</div>
							
						</div>
					</div>
				</div>
			</div>


			<div class="modal modal-box-2 fade" id="add_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				 <div class="modal-dialog">
					<div class="modal-content" id="myModalLabel">
						<div class="modal-header theme-bg">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<h3>Add a <span>Post</span></h3>
							
								<div class="row">
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<select class="custom-select mb-1">
												<option selected>Select any feed</option>
												<?php 
													$feeds = get_all_feeds();
													foreach($feeds as $feed){
												?>
													<option value="<?php  echo $feed['id'] ?>"><?php echo $feed['url'] ?></option>
												<?php 
													}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6 col-sm-12">
										<div class="form-group">
											<?php 
													$keywords = get_all_keywords();
													foreach($keywords as $keyword){
												?>
													<label class="custom-control custom-checkbox">
														<input type="checkbox" name="keywords" value="<?php echo $keyword['id'] ?>" class="custom-control-input">
														<span class="custom-control-indicator"></span>
														<span class="custom-control-description"><?php echo $keyword['word'] ?></span>
													</label>
												<?php 
													}
												?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="clearfix"></div>
									<div class="col-lg-12 text-center">
										<div id="success-msg">The url has been added successfully</div>
										<button type="submit" onclick="addFeed()" class="btn modal-btn">Add</button>
									</div>
								</div>
							
						</div>
					</div>
				</div>
			</div>
			
			
			<!-- Scroll to Top Button-->  
			<a class="scroll-to-top rounded cl-white gredient-bg" href="#page-top">
			  <i class="ti-angle-double-up"></i>
			</a>

			<!-- Bootstrap core JavaScript-->
			<script src="assets/plugins/jquery/jquery.min.js"></script>
			<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			
			<!-- Core plugin JavaScript-->
			<script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>
			
			 <!-- Slick Slider Js -->
			<script src="assets/plugins/slick-slider/slick.js"></script>
			
			<!-- Slim Scroll -->
			<script src="assets/plugins/slim-scroll/jquery.slimscroll.min.js"></script>
			
			<!-- Angular Tooltip -->
			<script src="assets/plugins/angular-tooltip/angular.js"></script>
			<script src="assets/plugins/angular-tooltip/angular-tooltips.js"></script>
			<script src="assets/plugins/angular-tooltip/index.js"></script>
			
			<!-- Morris.js charts -->
		    <script src="assets/plugins/raphael/raphael.min.js"></script>
		    <script src="assets/plugins/morris.js/morris.min.js"></script>
			
			<!-- Custom Chart JavaScript -->
		    <script src="js/custom/dashboard/dashboard.js"></script>
			
			<!-- Custom scripts for all pages -->
			<script src="js/glovia.js"></script>
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}
				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
				$(document).ready(function(){
					$('.dropdown-toggle').dropdown();
				});
				function addKeyword() {
					var keywords = $('#keyword_box_modal').val();
					$.ajax({
						method: 'POST',
						url: 'add_keyword.php',
						data: {'keywords': keywords},
						cache: false,
						success: function(response){
							console.log(response);
							window.location.reload();
						},
						error: function(response){
							console.log(response);
							window.location.reload();

						}	
					});
				}

				function addFeed(){
					var feeds = $('#feeds_modal_input').val();
					$.ajax({
						method: 'POST',
						url: 'add_feeds.php',
						data: {'feeds': feeds},
						cache: false,
						success: function(response){
							console.log(response);
							window.location.reload();


						},
						error: function(response){
							console.log(response);
							window.location.reload();


						}	
					});
				}
			</script>
			
	  </div>
	  <!-- Wrapper -->
	  
	</body>
</html>
