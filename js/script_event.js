/***
* ready function
* function that performs actions when the document loads
****************************/
$(document).ready(function(){

	$('#multiple_datepicker').datepicker({
    		format: "dd/mm/yyyy"
	});
	//$( '#save_event' ).click( save_action );

});//End of ready function

/***
* save_action
* action for the save button
**********************/
function save_action( e ){

	e.preventDefault();

	var token = $( '#token' ).val();

	var title = $( '#title' ).val();
	var des = $( '#description' ).val();
	var dateini = $( '#dateini' ).val();
	var datefin = $( '#datefin' ).val();

	var formData = $('form#data').serialize();

	console.log( formData );

	/***
	$.ajax( {

		url : 'http://localhost/Calendar/Services/EventService',
		dataType : 'json',
		type : 'POST',
		data : { 'action' : 'Add', 'title' : title, 'dateini' : dateini, 'datefin' : datefin, 'description' : des, 'token' : token },
		success : function( response ){

			alert( "New Event Saved" );
			window.location.href = "../";

		}, error: function( error ){

			$( '.errors' ).html( "Something went wrong, try again or contact the administrator." );
			console.log( error );

		}

	} );***/

}//end of save_action
