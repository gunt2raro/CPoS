<?php


	require_once( $_SERVER['DOCUMENT_ROOT'] . '/Calendar/Controllers/EventController.php' );

	session_start();

	if( isset( $_GET['action'] ) ){

		if( $_GET['token'] == $_SESSION['token'] ){

			if( $_GET['action'] == 'GetAllArchived' ){

				print_r( EventController::GetAllArchived(  ) );

			}else if( $_GET['action'] == 'GetAll' ){

				print_r( EventController::GetAll( $_GET['date'] ) );

			}

		}

	}else if( isset( $_POST['action'] ) ){

		if( $_POST['token'] == $_SESSION['token'] ){

			if( $_POST['action'] == 'Add' ){

				print_r( EventController::AddEvent( $_POST['title'], $_POST['description'], $_POST['dateini'], $_POST['datefin'] ) );

			}else if( $_POST['action'] == 'Edit' ){

				print_r( "success" );

			}else if( $_POST['action'] == 'Archive' ){

				if( EventController::Archive( intval( $_POST['eventid'] ) ) == "success" ){
					print_r( json_encode( "success" ) );
				}

			}else if( $_POST['action'] == 'UnArchive' ){

				if( EventController::UnArchive( intval( $_POST['eventid'] ) ) == "success" ){
					print_r( json_encode( "success" ) );
				}

			}else if( $_POST['action'] == 'EditEvent' ){

				if( EventController::EditEvent( intval( $_POST['eventid'] ), $_POST['title'], $_POST['dateini'], $_POST['datefin'], $_POST['des'] ) == "success" ){
					print_r( json_encode( "success" ) );
				}

			}

		}
	}
?>
