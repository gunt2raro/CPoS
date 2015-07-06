<?php
	session_start();

	if( isset( $_SESSION['username'] ) ){

		$token = uniqid(mt_rand(), true);

		$_SESSION['token'] = $token;

		require_once( $_SERVER['DOCUMENT_ROOT'] . '/Calendar/Controllers/EventController.php' );

		if( isset( $_FILES['image'] ) ){

			move_uploaded_file($_FILES['image']['tmp_name'], '/var/www/Calendar/uploads/' . $_FILES['image']['name']);
			EventController::AddEvent( $_POST['title'], $_POST['description'], $_POST['start'], $_POST['end'],  'http://localhost' . '/Calendar/uploads/' . $_FILES['image']['name'] );
		}

	}else{

		header('Location: ../login');

	}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/style_event.css"/>
    <link rel="stylesheet" href="../../bootstrap-datepicker/css/bootstrap-datepicker.css"/>

    <title>CPoS-New Event</title>

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
        <div class="col-md-2"><a id="close_session"> Log Out </a></div>
      </div>
    </header>

    <div class="container">
	<h2>Add New Event</h2>
	<hr/>
        <div class="row">

          <div class="col-md-4">

		<div id="errors" class="errors"></div>

	  </div>
          <div class="md-col-8">

		<div class="new-event" style="width:500px;margin-left:200px;">

			<div class="row">
				<form id="data" method="POST" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF'];?>">
					<p>
						<input type="text" placeholder="Title" id="title" name="title" class="form-control" >
					</p>

					<div class="input-daterange input-group" id="multiple_datepicker">
						<input type="text" class="input-sm form-control" name="start" id="dateini"/>
						<span class="input-group-addon">to</span>
						<input type="text" class="input-sm form-control" name="end" id="datefin" />
					</div>
						<br />
					<p>
					      	<input id="txtFiles" type="file" name="image" class="form-control" />
					</p>
						<br />
					<p>
						<textarea name="description" class='form-control' style='width:100%;height:200px;' maxlength='500' id="description" ></textarea>
					</p>
					<button id="save_event" type="submit" class="btn btn-primary btn-lg btn-save" >
						<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save
					</button>
				</form>

			</div>
			<div class="tools row">


				<a href="../">
					<button type="button" class="btn btn-danger btn-lg btn-cancel" >
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Cancel
					</button>
				</a>
			</div>

		</div>


	  </div>

        </div>
    </div>

    <footer class="footer">
      <center>
        <span> Stoke Travel ® <br/>All rights reserved.</span>
      </center>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../../bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../../js/script_event.js"></script>

  </body>

</html>
