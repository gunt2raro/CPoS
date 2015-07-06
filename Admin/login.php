<?php

	session_start();

	if( isset( $_SESSION['username'] ) ){

		header( 'Location: dashboard' );
	}else{
		$token = uniqid(mt_rand(), true);
		$_SESSION['token'] = $token;

	}

?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<title>CPoS Login</title>
	    	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../css/style_login.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="../js/jquery.js"></script>
		<script src="../js/script_login.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div class="container">

			<div class="row" id="pwd-container">

				<div class="col-md-4"></div>

				<div class="col-md-4">
					<section class="login-form">
						<form method="post" action="#" role="login">

							<input style="display:none" id="sec"  type="text" value="<?php print($_SESSION['token']);?>"/>

							<img src="http://shop.stoketravel.com/img/store-name-1433500747.jpg" class="img-responsive logo" alt="" />

							<input type="email" name="email" placeholder="Email" required class="form-control input-lg"  id="email"/>
							<input type="password" class="form-control input-lg" id="password" placeholder="Password" required=""  id="password" />

							<button type="submit" name="go" class="btn btn-lg btn-primary btn-block" id="submit" >Sign in</button>
							<div id="errors"></div>

						</form>

						<div class="form-links">
							<a href="http://stoketravel.com">stoketravel.com</a>
						</div>

					</section>
				</div>

				<div class="col-md-4"></div>


			</div>

		</div>
	</body>
</html>
