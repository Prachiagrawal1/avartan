<?php 

	$db_username = 'root';
	$db_password = 'prachi';
	$db_name = 'rss_feed';
	session_start();
	$error_message = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$username = $_POST['username'];
		$password = $_POST['password'];

		try{
			// To connect with the database
			$db = new PDO('mysql:host=localhost;dbname=rss_feed', $db_username, $db_password);

			// Yaha par hamlog SQL query likhe hain user uthanae ke liye aur
			// isme username = :username to basically :username ko fir actual values se replace karenge
			$stmt = $db->prepare('select * from users where username = :username');

			// Yaha oar vo value bind kr rhe sql query se
			$stmt->execute(['username' => $username]);

			// ab execute karenge vo
			// ab apan ek user entry krte db me
			$response = $stmt->fetch();

			if($response['password'] === md5($password)){
				$_SESSION['username'] = $username;
				// yaha se dashboard me redirect karenge
			}else{
				$error_message = 'Please check your username and password once again';
			}

		} catch (PDOException $e){
			print($e);
			print ("Sorry an error occured please try again later!");
			die();
		}
		
		// Now some database part

		// Connection with the database using PDO
		// kuchh krna hai yaha par else ye page dikhega
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title></title>

		<!-- Bootstrap core CSS -->
		<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Custom fonts for this template -->
		<link href="assets/plugins/themify/css/themify.css" rel="stylesheet" type="text/css">

		<!-- Angular Tooltip Css -->
		<link href="assets/plugins/angular-tooltip/angular-tooltips.css" rel="stylesheet">

		<!-- Page level plugin CSS -->
		<link href="css/animate.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/glovia.css" rel="stylesheet">
		<link href="css/glovia-responsive.css" rel="stylesheet">
		
		<!-- Custom styles for Color -->
		<link href="css/skins/default.css" rel="stylesheet">
	</head>

	<body>
	
		<div class="container-fluid">
			<div class="row">
				<div class="hidden-xs hidden-sm col-lg-6 col-md-6 theme-bg">
					<div class="clearfix">
						<div class="logo-title-container text-center">
							<h3 class="cl-white text-upper">RSS Feed</h3>
						
							 <div class="copy animated fadeIn">
								<p class="cl-white"></p>
							</div>
						</div> <!-- .logo-title-container -->
					</div>
				</div>

				<div class="col-12 col-sm-12 col-md-6 col-lg-6 login-sidebar animated fadeInRightBig">

					<div class="login-container animated fadeInRightBig">

						<h2 class="text-center text-upper">Login</h2>
						<form class="form-horizontal" method="POST">
							<div class="form-group">
								<input type="email" name="username" class="form-control" id="inputEmail3" placeholder="Email or Username">
								<i class="fa fa-user"></i>
							</div>
							<div class="form-group help">
								<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
								<i class="fa fa-lock"></i>
								<a href="#" class="pass-view fa fa-eye"></a>
							</div>
							
							<div class="form-group">
								<div class="flexbox align-items-center">
									<span class="custom-checkbox">
										<input type="checkbox" id="checkbox1" name="options[]" value="1">
										<label for="checkbox1">Remember me</label>
									</span>
									<a href="#" data-toggle="tooltip" class="theme-cl" data-original-title="Forgot Password">Forgot Password?</a>
								</div>
							</div>
							
							<div class="form-group">
								<div class="flexbox align-items-center">
									<button type="submit" class="btn theme-bg" style="text-align:center" name="login">Log in</button>
								</div>
							</div>
						
						</form>
					</div> 
					<!-- .login-container -->
					
				</div> <!-- .login-sidebar -->
			</div> <!-- .row -->
		</div>
		

		<!-- Bootstrap core JavaScript-->
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		
		<!-- Core plugin JavaScript-->
		<script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>
		
		 <!-- Slick Slider Js -->
		<script src="assets/plugins/slick-slider/slick.js"></script>
		
		<!-- Slim Scroll -->
		<script src="assets/plugins/slim-scroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom scripts for all pages-->
		<script src="js/glovia.js"></script>
		
		<script>
		  $('.dropdown-toggle').dropdown()
		</script>
	  
	</body>
</html>
