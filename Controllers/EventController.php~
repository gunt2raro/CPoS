<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Calendar/Models/Event.php' );

	class EventController{

		public static function GetAll(){

			$e = new Event;

			return( $e->GetAll_json() );

		}

		public static function GetEventById(){

			return( json_encode("GETEVENTBYID") );

		}

	}
?>
