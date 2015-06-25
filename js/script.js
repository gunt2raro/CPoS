var imported = document.createElement('script');
imported.src = 'js/Helpers/HtmlHelper.js';
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

	$( '.day' ).unbind( "click" );
	$( '.day' ).click( day_action );

	$( '.event-CPoS' ).unbind( "click" );
	$( '.event-CPoS' ).click( event_action );

	$( '.today' ).unbind( "click" );
	$( '.today' ).click( get_whats_happening_today );

} //End of startRefresh function


$(document).ready(function(){

	$('.datepicker').datepicker({

		todayBtn: true

	});

	get_whats_happening_today( );

});

function event_action(){

	var event =  $( this ).parent();
	if( !event.children( '.element-des' ).is(":visible") ){
		event.children( '.element-des' ).show();
	}else{
		event.children( '.element-des' ).hide();
	}

}//End of event_action function

/***
* day _action
* action for days buttons
**********************/
function day_action(){

	$( '.e-content' ).html( '<legend id="events-box-info" style="color:#205766;font-weight:bold;"></legend>' );

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


	$( '#events-box-info' ).html( '<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> T Happening On ' + month + ' ' + day + ' ' + year );

	$.ajax({

		url : 'Services/EventService',
		dataType : 'json',
		type : 'GET',
		data : { 'action' : 'GetAll', 'date' : date, 'token' : token },
		success : function( response ){
			$.each(response, function(index, value){
				$( '.e-content' ).append( create_event_preview( value ) );
			});
			console.log( response );
		},
		error : function( error ){
			console.log( error );
		}

	});

}//End of day_action function

function get_whats_happening_today(){

	$( '.e-content' ).html( '<legend id="events-box-info" style="color:#205766;font-weight:bold;"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Today</legend>' );
	$( '#din_title' ).html( '<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> What\'s Happening Today??!! <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>' );
	$( '.e-happening-now' ).html( '' );
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth();
	var yyyy = today.getFullYear();
	var token = $('#token').val();

	if(dd < 10) {
	    dd = '0' + dd;
	}

	if(mm < 10) {
	    mm = '0' + mm;
	}

	today = dd + '/' + mm + '/' + yyyy;

	$.ajax({

		url : 'Services/EventService',
		dataType : 'json',
		type : 'GET',
		data : { 'action' : 'GetAll', 'date' : today, 'token' : token },
		success : function( response ){
			$.each(response, function(index, value){
				$( '.e-content' ).append( create_event_preview( value ) );
				$( '.e-happening-now' ).append( create_event_preview_box( value ) );
			});
			console.log( response );
		},
		error : function( error ){
			console.log( error );
		}

	});

}//Emnd of get_whats_happening_today function

/***
* create_event_preview_admin
* function that works for creating the event html on the admin view of the system
* @param evento -  an event json object
* @return String
***********************************************/
function create_event_preview( evento ){

	var html = [];

	html.push(
		"<div class='element' id='",
			evento['eventid'],
		"' >",
			"<button type='button' class='btn btn-primary btn-lg event-CPoS'>",
				"<span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span> ",
					evento['title'],
			"</button>",
			"<div class='element-des'><p>",
				'<span class="label label-success"> Starts at :',
					evento['dateini'],
				'</span><br />',
				'<span class="label label-danger"> Ends on : ',
					evento['datefin'],
				'</span><br />',
				'<div class="alert alert-info">',
					evento['description'],
				'</div>',
			"</p></div>",
		"</div><br />"
	);

	return html.join("");

}//End create_event_preview

/***
* create_event_preview_admin
* function that works for creating the event html on the admin view of the system
* @param evento -  an event json object
* @return String
***********************************************/
function create_event_preview_box( evento ){

	var html = [];

	html.push(
		'<div class="col-sm-4 col-lg-4 col-md-4">',
			'<div class="thumbnail">',
                            '<img src="',
				evento['path'],
                            '" alt="">',
                            '<div class="caption">',
                                '<h4 class="pull-right">',
				'</h4>',
                                '<h4><a href="#">',
					evento['title'],
				'</a></h4>',
                                '<p>',
                                	evento['description'].substr(0, 175),'...',
                                '</p>',
                            '</div>',
			    '<div class="ratings">',
                                '<p class="pull-right">',
					evento['datefin'],
				'</p>',
                                '<p>',
                                    evento['dateini'],
                                '</p>',
                            '</div>',
                        '</div>',
                    '</div>'
	);

	return html.join("");

}//End create_event_preview
