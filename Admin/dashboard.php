<?php
	session_start();

	if( isset( $_SESSION['username'] ) ){

		$token = uniqid(mt_rand(), true);

		$_SESSION['token'] = $token;

	}else{

		header('Location: login');

	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/style_dashboard.css"/>
    <link rel="stylesheet" href="../bootstrap-datepicker/css/bootstrap-datepicker.css"/>

    <title>CPoS Admin</title>

  </head>

  <body>
    <input style="display:none" id="token"  type="text" value="<?php print($_SESSION['token']);?>"/>
    <header class="page-header">

      <div class="row iconsAS">

        <div class="col-md-10">
          <div class="col-md-2">
              <img src="http://shop.stoketravel.com/img/store-name-1433500747.jpg" class="img-responsive logo" alt="Stoke Travel">
          </div>
          <div class="col-md-4">
              <h1 class="title">CPoS (Admin)</h1>
          </div>
        </div>
	<div class="col-md-2"><a id="normal_view" href="../"> Normal View </a></div>
        <div class="col-md-2"><a id="close_session"> Log Out </a></div>
      </div>
    </header>

    <div class="container">
	<div class="row din_title">
		<center>
			<h2 id="din_title">Events</h2>
		</center>
	</div>
	<hr />
        <div class="row">

          <div class="col-md-4">
		<div class="inner">
			<center>
				<div class="datepicker" id="thedatepikerbaddass"></div>
				<div class="tools row">
					<a href="Event/New">
					<button id="newB" type="button" class="btn btn-info btn-lg btn-new" >
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Event
					</button></a><br /><br />
					<button id="save-btn" type="button" class="btn btn-primary btn-lg btn-save" >
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save
					</button><br /><br />
					<button id="get_unarchived" type="button" class="btn btn-warning btn-lg btn-archived" >
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Archived
					</button>
					<br /><br />
				</div>
			</center>
		</div>
	  </div>
          <div class="md-col-8 ">

		<center>
		<div class="e-content">
			<!---content goes here-->
		</div>
		</center>
	  </div>

        </div>
    </div>

    <footer class="footer">
      <center>
        <span> Stoke Travel ® <br/>All rights reserved.</span>
      </center>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../js/script_dashboard.js"></script>

  </body>

</html>
