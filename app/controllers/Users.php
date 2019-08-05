<?php
	class Users extends Controller {
		public function __construct(){
			$this->userModel = $this->model('User');
		}

		public function register(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Sanitize POST Data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				// Init Data
				$data = [
					'email' => trim($_POST['email']),
					'email_err' => ''
				];

				// Validate Email
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}
				else{
					// Check Email
					if($this->userModel->findUserByEmail($data['email'])){
						$data['email_err'] = 'Email is already taken';
					}
				}

				
				// Make sure errors are empty
				if(empty($data['email_err'])){
					// Validate
										
					// Send Email To User For Validation
					if(sendMail_Registration($data['email'])){
						flash_success('register_success', 'Check your email and comfirm the email address used');
						redirect('users/register');
					}
					else{
						die('Something went wrong');
					}
				}
				else{
					// Load View With Errors
					$this->view('users/register', $data);
				}
			}
			else{
				// Init Data
				$data = [
					'email' => '',
					'email_err' => ''
				];

				// Load View
				$this->view('users/register', $data);
			}
		}

		public function compsignup($email){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Sanitize POST Data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				// Init Data
				$data = [						
					'email' => trim($_POST['email']),
					'first_name' => trim($_POST['first_name']),
					'last_name' => trim($_POST['last_name']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'phone' => trim($_POST['phone']),	
					'address' => trim($_POST['address']),
					'orig_pass' => trim($_POST['password']),						
					'email_err' => '',
					'first_name_err' => '',
					'last_name_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phone_err' => '',
					'address_err' => ''
				];

				// Validate Email
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}
				/*else{
					// Check Email
					if($this->userModel->findUserByEmail($data['email'])){
						$data['email_err'] = 'Email is already taken';
					}
				}*/

				// Validate Name
				if(empty($data['first_name'])){
					$data['first_name_err'] = 'Please enter first name';
				}

				// Validate Name
				if(empty($data['last_name'])){
					$data['last_name_err'] = 'Please enter last name';
				}

				// Validate Password
				if(empty($data['password'])){
					$data['password_err'] = 'Please enter password';
				}
				else if(strlen($data['password']) < 6){
					$data['password_err'] = 'Password must be at least 6 characters';
				}

				// Validate Confirm Password
				if(empty($data['confirm_password'])){
					$data['confirm_password_err'] = 'Please confirm password';
				}
				else{
					if($data['password'] != $data['confirm_password']){
						$data['confirm_password_err'] = 'Passwords do not match';
					}
				}

				// Validate Phone
				if(empty($data['phone'])){
					$data['phone_err'] = 'Please enter phone';
				}

				// Validate Address
				if(empty($data['address'])){
					$data['address_err'] = 'Please enter address';
				}

				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['phone_err']) && empty($data['address_err'])){
					// Validate

					/*$response = $_POST["g-recaptcha-response"];

                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $datag = array(
                        'secret' => '6LecZ0sUAAAAAITpS0ZQlZEGlXyC0szZpUijgQiX',
                        'response' => $_POST["g-recaptcha-response"]
                    );
                    $options = array(
                        'http' => array (
                          'method' => 'POST',
                          'content' => http_build_query($datag)
                        )
                    );
                    $context  = stream_context_create($options);
                    $verify = file_get_contents($url, false, $context);
                    $captcha_success=json_decode($verify);

                    if ($captcha_success->success==false) {
                       flash_error('register_failure', 'You are a bot! Go away!');
                       redirect('users/register');
                    } 
                    else if ($captcha_success->success==true) {

                    	// Hash Password
						$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

						// Register User
						if($this->userModel->compsignup($data)){
							flash_success('register_success', 'You are successfully registered !');
							redirect('users/login');
						}
						else{
							//die('Something went wrong');
							flash_error('register_failure', 'Something went wrong');
							// Load View With Errors
							$this->view('users/compsignup', $data);
						}

                    }*/

                    // Hash Password
					$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    if($this->userModel->compsignup($data)){
						flash_success('register_success', 'You are successfully registered !');
						redirect('users/login');
					}
					else{
						//die('Something went wrong');
						flash_error('register_failure', 'Something went wrong');
						// Load View With Errors
						$this->view('users/compsignup', $data);
					}
					
					
				}
				else{
					// Load View With Errors
					$this->view('users/compsignup', $data);
				}

				
			}
			else{
				// Init Data
				$data = [		
					'email' => $email,
					'first_name' => '',
					'last_name' => '',
					'password' => '',
					'confirm_password' => '',
					'phone' => '',
					'address' => '',
					'orig_pass' => '',					
					'email_err' => '',
					'first_name_err' => '',
					'last_name_err' => '',
					'password_err' => '',
					'confirm_password_err' => '',
					'phone_err' => '',
					'address_err' => ''
				];

				// Load View
				$this->view('users/compsignup', $data);
			}
		}

		public function login(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Sanitize POST Data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				// Init Data
				$data = [
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'email_err' => '',
					'password_err' => ''
				];

				// Validate Email
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}

				// Validate Password
				if(empty($data['password'])){
					$data['password_err'] = 'Please enter password';
				}

				// Check for User/Email
				if($this->userModel->findUserByEmail($data['email'])){
					// User found
				}
				else{
					// User not found
					$data['email_err'] = 'No user found';
				}

				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['password_err'])){
					// Validate
					// Check and set logged in user
					$loggedInUser = $this->userModel->login($data['email'], $data['password']);

					if($loggedInUser){
						// Create Session
						$this->createUserSession($loggedInUser);
					}
					else{
						$data['password_err'] = 'Password incorrect';

						$this->view('users/login', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('users/login', $data);
				}
			}
			else{
				// Init Data
				$data = [
					'email' => '',
					'password' => '',
					'email_err' => '',
					'password_err' => ''
				];

				// Load View
				$this->view('users/login', $data);
			}
		}

		public function createUserSession($user){
			$_SESSION['user_email'] = $user->email;	
			$_SESSION['user_first_name'] = $user->firstname;

			redirect('dashboards');

		}

		public function logout(){
			unset($_SESSION['user_email']);
			unset($_SESSION['user_category']);
			unset($_SESSION['user_usercode']);
			session_destroy();
			redirect_home();
		}
	}
?>