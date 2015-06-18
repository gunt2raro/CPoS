<?php

 	require_once( $_SERVER['DOCUMENT_ROOT'].'/Warrior/Classes/Model.php' );

	//Class Event Model
	class Event extends Model {

		//Global Variables
		protected $eventid;
		protected $title;
		protected $description;
		protected $dateini;
		protected $datefin;
		protected $path;
		protected $status;
	}
?>