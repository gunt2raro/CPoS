<?php


	require_once( $_SERVER['DOCUMENT_ROOT'] . '/Calendar/Controllers/LoginController.php' );

	session_start();

	if( isset( $_GET['action'] ) ){

		if( $_GET['sec'] == $_SESSION['token'] ){


		}

	}else if( isset( $_POST['action'] ) ){

		if( $_POST['sec'] == $_SESSION['token'] ){

			if( $_POST['action'] == 'val_login' ){

				print_r( LoginController::valLogin( $_POST['email'], $_POST['pass'] ) );

			}  else if( $_POST['action'] == 'close_session' ) {

				session_destroy();
				print( json_encode( "true" ) );

			}

		}

	}
?>
