var imported = document.createElement('script');
imported.src = '../js/Helpers/HtmlHelper.js';
document.head.appendChild(imported);

/***
 * Every time!
 ***************/
$(function() {
    startRefresh();
}); //End of always function

/***
 * startRefresh
 * Function that actualizes with delay the actual values of the db
 *************************/
function startRefresh() {

        setTimeout(startRefresh, 1000);

	$( '#thedatepikerbaddass' ).find( '.day' ).unbind( "click" );
	$( '#thedatepikerbaddass' ).find( '.day' ).click( day_action );

	$( '.event-CPoS' ).unbind( "click" );
	$( '.event-CPoS' ).click( event_action );

	$( '.archive-btn' ).unbind( "click" );
	$( '.archive-btn' ).click( archive_btn_action );

	$( '.unarchive-btn' ).unbind( "click" );
	$( '.unarchive-btn' ).click( unarchive_btn_action );

	$( '.datepiker-event-dates' ).unbind( "datepicker" );
	$( '.datepiker-event-dates' ).datepicker({format: "dd/mm/yyyy"});

} //End of startRefresh function

/***
* ready
* function that performs when the docuement loads
************************************************/
$(document).ready(function(){

	$('#thedatepikerbaddass').datepicker({

		todayBtn: true

	});

	$( '#close_session' ).click( close_session_action );
	$( '#get_unarchived' ).click( get_unarchived_action );
	$( '#save-btn' ).click( save_btn_action );

	get_whats_happening_today( );

});//End of ready function

/***
* event_action
* A function that performs the action of the event button
************************/
function event_action(){

	var event =  $( this ).parent();
	if( !event.children( '.element-des' ).is(":visible") ){
		event.children( '.archive-btn' ).show();
		event.children( '.element-des' ).show();
		event.children( '.unarchive-btn' ).show();
		event.children( '.datepiker-event-dates' ).show();
		event.children( '#title' ).show();
	}else{
		event.children( '.archive-btn' ).hide();
		event.children( '.element-des' ).hide();
		event.children( '.unarchive-btn' ).hide();
		event.children( '.datepiker-event-dates' ).hide();
		event.children( '#title' ).hide();
	}

}//End of event_action function

/***
* get_whats_happening_today
* a function that gets the events that are happening today
*************************************/
function get_whats_happening_today(){

	$( '.e-content' ).html( '' );

	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth();
	var yyyy = today.getFullYear();
	var token = $('#token').val();

	if(dd<10) {
	    dd = '0' + dd;
	}

	if(mm<10) {
	    mm ='0' + mm;
	}

	today = dd + '/' + mm + '/' + yyyy;

	$( '#din_title' ).html( "What's Happening Today!!?? ");

	$.ajax({

		url : '../Services/EventService',
		dataType : 'json',
		type : 'GET',
		data : { 'action' : 'GetAll', 'date' : today, 'token' : token },
		success : function( response ){
			$.each(response, function(index, value){
				$( '.e-content' ).append( create_event_preview_admin( value ) );
			});
			console.log( response );
		},
		error : function( error ){
			console.log( error );
		}

	});

}//Emnd of get_whats_happening_today function


/***
* day _action
* action for days buttons
**********************/
function day_action(){

	$( '.e-content' ).html( '' );

	var day;
	var date;

	var month = ($('.datepicker-switch').html()).split( " " )[0];
	var year = ($('.datepicker-switch').html()).split( " " )[1];
	var token = $('#token').val();

	if( parseInt($(this).html()) < 10 ){
		day = "0" + $(this).html();
	} else {
		day = $(this).html();
	}

	if( getMonthNumber(month) < 10 ){
		date = day + "/0" + getMonthNumber(month) + "/" + year;
	} else {
		date = day + "/" + getMonthNumber(month) + "/" + year;
	}


	$( '#din_title' ).html( "What's Happening On " + month + ' ' + day + ' ' + year );

	$.ajax({

		url : '../Services/EventService',
		dataType : 'json',
		type : 'GET',
		data : { 'action' : 'GetAll', 'date' : date, 'token' : token },
		success : function( response ){
			$.each(response, function(index, value){
				$( '.e-content' ).append( create_event_preview_admin( value ) );
			});
			console.log( response );
		},
		error : function( error ){
			console.log( error );
		}

	});

}//End of day_action function

/***
* archive_btn_action
* function that performs the action of the archive_btn
******************************/
function archive_btn_action (){

	var eventid =  $( this ).parent().attr('id');
	var token = $('#token').val();

	$.ajax({

		url : '../Services/EventService',
		dataType : 'json',
		type : 'POST',
		data : { 'action' : 'Archive', 'eventid' : eventid, 'token' : token },
		success : function( response ){

			get_whats_happening_today( );
			console.log( response );

		},
		error : function( error ){
			console.log( error );
		}

	});

}//End of archive_btn_action function

/***
* day _action
* action for days buttons
**********************/
function close_session_action(){

	var token = $('#token').val();

	$.ajax({

		url : '../Services/LoginService',
		dataType : 'json',
		type : 'POST',
		data : { 'action' : 'close_session', 'sec' : token },
		success : function( response ){
			window.location.href = "http://localhost/Calendar/Admin/dashboard"
		}, error : function(error){
			console.log(error);
		}

	});

}//End of day_action function

/***
* create_event_preview_admin
* function that works for creating the event html on the admin view of the system
* @param evento -  an event json object
* @return String
***********************************************/
function create_event_preview_admin( evento ){

	var html = [];

	html.push(
		"<div class='element' id='",
			evento['eventid'],
		"' >",
			"<button type='button' class='btn btn-primary btn-lg event-CPoS'>",
				"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span> ",
					evento['title'],
				"&nbsp;&nbsp;( Starts on : ",
					evento['dateini'],
				" ) - ( Finishes on : ",
					evento['datefin'],
				" )",
			"</button>",
			"<input type='text' name='title' class='form-control' id='title' placeholder='title' value='", evento['title'] ,"'/>",
			'<div class="input-daterange input-group datepiker-event-dates">',
				'<input type="text" class="input-sm form-control" name="start" id="dateini" value="', evento['dateini'] ,'"/>',
				'<span class="input-group-addon">to</span>',
				'<input type="text" class="input-sm form-control" name="end" id="datefin" value="', evento['datefin'] ,'"/>',
			'</div>',
			"<textarea  class='element-des' style='width:100%;height:200px;' maxlength='500' >",
				evento['description'],
			"</textarea><br/><button class='btn btn-btn-danger archive-btn'><span class='glyphicon glyphicon-trash' aria-hidden='true'>Archive</span></button><br />",
		"</div>"
	);

	return html.join("");

}//End create_event_preview

/***
* create_event_preview_admin
* function that works for creating the event html on the admin view of the system
* @param evento -  an event json object
* @return String
***********************************************/
function create_event_preview_admin_archived( evento ){

	var html = [];

	html.push(
		"<div class='element' id='",
			evento['eventid'],
		"' >",
			"<button type='button' class='btn btn-default btn-lg event-CPoS'>",
				"<span class='glyphicon glyphicon-edit' aria-hidden='true'></span>",
					evento['title'],
				"&nbsp;&nbsp;( Starts on : ",
					evento['dateini'],
				" ) - ( Finishes on : ",
					evento['datefin'],
				" )",
			"</button>",
			"<input type='text' name='title' class='form-control' id='title' placeholder='title' value='", evento['title'] ,"'/>",
			'<div class="input-daterange input-group datepiker-event-dates">',
				'<input type="text" class="input-sm form-control" name="start" id="dateini" value="', evento['dateini'] ,'"/>',
				'<span class="input-group-addon">to</span>',
				'<input type="text" class="input-sm form-control" name="end" id="datefin" value="', evento['datefin'] ,'"/>',
			'</div>',
			"<textarea  class='element-des' style='width:100%;height:200px;' maxlength='500' >",
				evento['description'],
			"</textarea><br/><button class='btn btn-danger unarchive-btn'><span class='glyphicon glyphicon-bookmark' aria-hidden='true'> UnArchive</span></button><br />",
		"</div><br />"
	);

	return html.join( "" );

}//End create_event_preview

/***
* get_unarchived_action
* this gets all the unarchived events
*********************************/
function get_unarchived_action(){

	$( '.e-content' ).html( '' );
	var token = $('#token').val();

	$.ajax({

		url : '../Services/EventService',
		dataType : 'json',
		type : 'GET',
		data : { 'action' : 'GetAllArchived', 'token' : token },
		success : function( response ){
			$.each(response, function(index, value){
				$( '.e-content' ).append( create_event_preview_admin_archived( value ) );
			});
			console.log( response );
		},
		error : function( error ){
			console.log( error );
		}

	});

}//End of get_unarchived_action function

/***
* archived_action
* function for the arcchived events
****************************/
function unarchive_btn_action(){

	var eventid =  $( this ).parent().attr('id');
	var token = $('#token').val();

	$.ajax({

		url : '../Services/EventService',
		dataType : 'json',
		type : 'POST',
		data : { 'action' : 'UnArchive', 'eventid' : eventid, 'token' : token },
		success : function( response ){

			 get_unarchived_action();
			console.log( response );

		},
		error : function( error ){
			console.log( error );
		}

	});

}//En fo archived_action function

/***
* save_btn_action
* function that performs action for save button
*****************/
function save_btn_action(){

	var token = $( '#token' ).val();

	$('.e-content').children('.element').each(function () {

    		var id =  $(this).attr( 'id' ); // "this" is the current element in the loop
		var des = $( this ).children( '.element-des' ).val();
		var tit = $( this ).children( '#title' ).val();
		var dateini = $( this ).children( '.datepiker-event-dates' ).children( '#dateini' ).val();
		var datefin = $( this ).children( '.datepiker-event-dates' ).children( '#datefin' ).val();

		$.ajax({

			url : '../Services/EventService',
			dataType : 'json',
			type : 'POST',
			data : { 'action' : 'EditEvent', 'title' : tit, 'dateini' : dateini, 'datefin' : datefin, 'des' : des, 'eventid' : id, 'token' : token },
			success : function(response){

				console.log( response );
				window.location.href = "http://localhost/Calendar/Admin/dashboard";

			},
			error : function( error ){

				$( '#errors' ).html( error[ 'responseText' ] );

			}

		});


	});
	alert( "Events Updated" );

}//End of save_btn_action function 
