<?php

	$token = uniqid(mt_rand(), true);

	session_start();
	$_SESSION['token'] = $token;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Calendar Piece of Shit">
    <meta name="author" content="RestCont Co">

    <title>Stoke Travel Event Following</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.css"/>
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

    <input style="display:none" id="token"  type="text" value="<?php print($_SESSION['token']);?>"/>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Stoke Travel CPoS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://stoketravel.com">Back to Site</a>
                    </li>
                    <li>
                        <a href="http://stoketravel.com/about-us/">About</a>
                    </li>
                    <li>
                        <a href="http://stoketravel.com/contact/">Contact</a>
                    </li>
		    <li>
                        <a href="Admin/">Admin?</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead din_title"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Chose a date!</p>
		<div class="datepicker"></div><br />
                <div class="list-group e-content">
			<legend id="events-box-info" style="color:#205766;font-weight:bold;">Events On </legend>
		</div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://localhost/Calendar/images/slider_1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://localhost/Calendar/images/slider_2.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div><br />
		<div class="row">
			<h2 id="din_title">Events</h2>
		</div><br/>
                <div class="row e-happening-now"></div>

            </div>

        </div>
	 <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <span> Stoke Travel ® <br/>All rights reserved.</span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
