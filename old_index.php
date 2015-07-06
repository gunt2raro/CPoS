<?php

	$token = uniqid(mt_rand(), true);

	session_start();
	$_SESSION['token'] = $token;

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.css"/>

    <title>CPoS</title>

  </head>

  <body background="http://stoketravel.com/images/body_bg.jpg">
    <input style="display:none" id="token"  type="text" value="<?php print($_SESSION['token']);?>"/>

    	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	      </button>
		<a class="navbar-brand" href="#">
        		<img alt="Brand" src="http://stoketravel.com/images/logo.png" class="img-responsive logo">
      		</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
		<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
		<li><a href="#">Link</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="#">Action</a></li>
		    <li><a href="#">Another action</a></li>
		    <li><a href="#">Something else here</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">Separated link</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">One more separated link</a></li>
		  </ul>
		</li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		<li><a href="#">Link</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="#">Action</a></li>
		    <li><a href="#">Another action</a></li>
		    <li><a href="#">Something else here</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">Separated link</a></li>
		  </ul>
		</li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


    <div class="container">
	<h2 id="din_title">Events</h2>
	<hr />
        <div class="row">

          <div class="col-md-4 date_div"><div class="datepicker"></div></div>
          <div class="md-col-8 e-content">

	  </div>

        </div>
    </div>

    <footer class="footer">
      <center>
        <span> Stoke Travel ® <br/>All rights reserved.</span>
      </center>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="js/script.js"></script>

  </body>

</html>
