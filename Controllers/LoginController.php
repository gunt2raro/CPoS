<?php

	require_once( $_SERVER['DOCUMENT_ROOT'].'/Calendar/Models/User.php' );

	class LoginController{

		public static function valLogin( $email, $password ){

			$u = new User;

			$users = json_decode( $u->GetAll_json(), true );

			foreach( $users  as $v ){

				if( $v['email'] == $email ){
					if( $v['password'] == $password ){

						$_SESSION['userid'] = $v['userid'];
						$_SESSION['username'] = $v['username'];
						$_SESSION['email'] = $v['email'];

						return( json_encode( $v ) );

					}else{
						return(  "Password Incorrect" );
					}
				}
			}return( "User Incorrect" );

		}


	}
?>
