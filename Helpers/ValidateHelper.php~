<?php


	class ValidateHelper{

		public static function validate_event( $event, $date ){

			list( $day1, $month1, $year1 ) = explode( "/", $event['dateini'] );
			list( $day2, $month2, $year2 ) = explode( "/", $event['datefin'] );
			list( $r_day, $r_month, $r_year ) = explode( "/", $date );

			$realDate = date( 'Ymd', strtotime( "$r_year-".(intval($r_month)+1)."-$r_day" ) );
			$beginDate = date( 'Ymd', strtotime( "$year1-$month1-$day1" ) );
    			$endDate = date( 'Ymd', strtotime( "$year2-$month2-$day2" ) );

			if( intval( $realDate ) >= intval( $beginDate ) && intval( $realDate ) <= intval( $endDate ) ){

				return true;

			}return false;

		}

	}
?>
