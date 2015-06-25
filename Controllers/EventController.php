<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Calendar/Models/Event.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'].'/Calendar/Helpers/ValidateHelper.php' );

	/***
	* EventController
	* Event controller class
	**************************/
	class EventController{

		/***
		* GetAll
		* function that returns all the events by date
		* @param date - the date
		* @return json encoded array
		*************************************/
		public static function GetAll( $date ){

			$e = new Event;

			$all = json_decode( $e->GetAll_json(), true );
			$return_array = array();

			foreach( $all as $v ){

				if( ValidateHelper::validate_event( $v, $date ) ){

					if( $v['status'] == 1 ){

						array_push( $return_array, $v );

					}

				}

			}return( json_encode( $return_array ) );

		}//End of Get All function

		/***
		* get all archived
		* This method returns all the archived events to the service
		* @return json encoded array
		******************************************/
		public static function GetAllArchived(){

			$e = new Event;

			$all = json_decode( $e->GetAll_json(), true );
			$return_array = array();

			foreach( $all as $v ){

				if( $v['status'] == 2 ){

					array_push( $return_array, $v );

				}

			}return( json_encode( $return_array ) );

		}//End of GetAllArchived function

		/***
		* GetEventBy Id
		* This method returns
		**************************************/
		public static function GetEventById(){

			return( json_encode("GETEVENTBYID") );

		}//End of geteventById function

		/***
		* Archive
		* function that archives an event
		* @param eventid - the event id
		* @return string of success
		******************************************/
		public static function Archive( $eventid ){

			$e = new Event;

			$e = $e->getByAttr( 'eventid', $eventid );

			$e->status = 2;

			$e->update();

			return ( "success" );

		}//End of Archive function

		/***
		* UnArchive
		* Functino that un archives an event
		* @param eventid -  the event id
		* @return String of success
		********************************************/
		public static function UnArchive( $eventid ){

			$e = new Event;

			$e = $e->getByAttr( 'eventid', $eventid );

			$e->status = 1;

			$e->update();

			return ( "success" );

		}//End of UnArchive function

		/***
		* AddEvent
		* This is the method that saves the event
		* @param title - the title of the event
 	 	* @param des - the description of the event
 	 	* @param dateini - the initial date of the event
 	 	* @param datefin - the final date of the event
		* @return String of success
		******************************************************************/
		public static function AddEvent( $title, $des, $dateini, $datefin, $path ){

			$e = new Event;

			$e->eventid = 0;
			$e->title = $title;
			$e->description = $des;
			$e->dateini = $dateini;
			$e->datefin = $datefin;
			$e->path = $path;
			$e->status = 1;

			$e->save();

			return( json_encode( $e ) );

		}//End of AddEvent function

		/***
		* EditEvent
		* This is the method that edits an event
		* @param eventid - the id of the event
		* @param title - the title of the event
 	 	* @param des - the description of the event
 	 	* @param dateini - the initial date of the event
 	 	* @param datefin - the final date of the event
		* @return String of success
		******************************************************************/
		public static function EditEvent( $eventid, $title, $dateini, $datefin, $des ){

			$e = new Event;

			$e = $e->getByAttr( 'eventid', $eventid );

			$e->description = $des;
			$e->title = $title;
			$e->dateini = $dateini;
			$e->datefin = $datefin;

			$e->update();

			return( "success" );

		}//End of AddEvent function

	}//End of Event Controller Class
?>
