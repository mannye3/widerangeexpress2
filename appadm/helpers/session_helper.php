<?php
	session_start();

	// Flash message Helper
	// EXAMPLE - flash('register_success', 'You are now registered');
	// DISPLAY IN VIEW - echo flash('register_success');
	function flash_success($name = '', $message = '', $class = 'alert alert-success'){
		if(!empty($name)){
			if(!empty($message) && empty($_SESSION[$name])){
				if(!empty($_SESSION[$name])){
					unset($_SESSION[$name]);
				}

				if(!empty($_SESSION[$name . '_class'])){
					unset($_SESSION[$name . '_class']);
				}

				$_SESSION[$name] = $message;
				$_SESSION[$name . '_class'] = $class;
			}
			else if(empty($message) && !empty($_SESSION[$name])){
				$class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
				echo '<div class="' . $class . '" role="alert" id="msg-flash">' . $_SESSION[$name] . '</div>';
				unset($_SESSION[$name]);
				unset($_SESSION[$name . '_class']);
			}
		}		
	}

	function flash_error($name = '', $message = '', $class = 'alert alert-danger'){
		if(!empty($name)){
			if(!empty($message) && empty($_SESSION[$name])){
				if(!empty($_SESSION[$name])){
					unset($_SESSION[$name]);
				}

				if(!empty($_SESSION[$name . '_class'])){
					unset($_SESSION[$name . '_class']);
				}

				$_SESSION[$name] = $message;
				$_SESSION[$name . '_class'] = $class;
			}
			else if(empty($message) && !empty($_SESSION[$name])){
				$class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
				echo '<div class="' . $class . '" role="alert" id="msg-flash">' . $_SESSION[$name] . '</div>';
				unset($_SESSION[$name]);
				unset($_SESSION[$name . '_class']);
			}
		}		
	}

	function isLoggedIn(){
		if(isset($_SESSION['user_email'])){
			return true;
		}
		else{
			return false;
		}
	}
?>