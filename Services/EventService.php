<?php


	require_once( $_SERVER['DOCUMENT_ROOT'] . '/Calendar/Controllers/EventController.php' );


	if( isset( $_GET['action'] ) ){

		if( $_GET['action'] == 'GetEventById' ){

			print_r( EventController::GetEventById( ) );

		}else if( $_GET['action'] == 'GetAll' ){

			print_r( EventController::GetAll( ) );

		}


	}
?>
