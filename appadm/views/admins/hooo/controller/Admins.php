<?php

//error_reporting(-1);
//ini_set('display_errors', 1);

//require_once'../../app/model/User.php';
	class Admins extends Controller {
		public function __construct(){
			$this->adminModel = $this->model('Admin');
            $this->userModel = $this->model('User');
		}

		public function index(){

			$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];

			$this->view('admins/index', $data);
		}

		public function login(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

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

				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['password_err'])){
					// Validate
					// Check and set logged in user
					$loggedInUser = $this->adminModel->login($data['email'], $data['password']);

					if($loggedInUser){
						// Create Session
						$this->createUserSession($loggedInUser);
					}
					else{
						$data['password_err'] = 'Password incorrect';

						$this->view('admins/index', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('admins/index', $data);
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
				$this->view('admins/index', $data);
			}
		}

		public function createUserSession($user){
			$_SESSION['adm_user_email'] = $user->email;	
			$_SESSION['adm_user_role'] = $user->role;

			redirect('admins/dashboard');
		}

		public function dashboard(){

			$all_users = $this->adminModel->getAllUsers();

			// Init Data
			$data = [
				'all_users' => $all_users
			];

			// Load View
			$this->view('admins/dashboard_home', $data);

		}

        /**************************************************************
         *  Modifications Work By James
         *
         *************************************************************/

		public function customers(){

            $all_users = $this->adminModel->getAllUsers();

            // Init Data
            $data = [
                'all_users' => $all_users
            ];

            // Load View
            $this->view('admins/dashboard', $data);

        }

         public function addcustomer(){
             // Check for POST
             if($_SERVER['REQUEST_METHOD'] == 'POST'){
                 // Process Form

                 // Sanitize POST Data
                 $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                 // Init Data
                 $data = [
                     'email' => trim($_POST['email']),
                     'email_err' => '',
                     'firstname'=> trim($_POST['firstname']),
                     'firstname_err'=>'',
                     'lastname'=> trim($_POST['lastname']),
                     'lastname_err'=>'',
                     'phone'=> trim($_POST['phone']),
                     'phone_err'=>'',
                     'password'=> trim($_POST['password']),
                     'password_err'=>'',
                     'address'=> trim($_POST['address']),
                     'address_err'=>'',
                     'city'=> trim($_POST['city']),
                     'city_err'=>'',
                     'country'=> trim($_POST['country']),
                     'country_err'=>'',
                 ];

                 // Validate Email
                 if(empty($data['email'])){
                     $data['email_err'] = 'Please enter email';
                 }/*else{
					// Check Email
					if($this->userModel->findUserByEmail($data['email'])){
						$data['email_err'] = 'Email is already taken';
					}
				}*/
                 if(empty($data['firstname'])){
                     $data['firstname_err'] = 'Please enter a Firstname';
                 }
                 if(empty($data['lastname'])){
                     $data['lastname_err'] = 'Please enter a Lastname';
                 }
                 if(empty($data['password'])){
                     $data['password_err'] = 'Please enter your password';
                 }
                 if(empty($data['phone'])){
                     $data['phone_err'] = 'Please enter your phone number';
                 }
                 if(empty($data['address'])){
                     $data['address_err'] = 'Please enter an address';
                 }
                 if(empty($data['city'])){
                     $data['city_err'] = 'Please enter your city of residence';
                 }
                 if(empty($data['country'])){
                     $data['country_err'] = 'Please enter your country of residence';
                 }


                 // Make sure errors are empty
                 if(empty($data['email_err']) && empty($data['firstname_err']) && empty($data['lastname_err'])
                     && empty($data['password_err']) && empty($data['phone_err']) && empty($data['address_err'])
                     && empty($data['city_err']) && empty($data['country_err'])){
                     // Validate

                     // Save User Registration Details
                     // Hash Password
                     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                     // Register User
                     if($this->userModel->registerUser($data)){
                         // Send email
                         $this->sendMail_Registration($data['email']);
                         flash_success('register_success', 'New Customer entry saved successfully!');
                         redirect('public/adm/admins/customers');
                     }
                     else{
                         //die('Something went wrong');
                         flash_error('register_failure', 'Something went wrong with  your registration');
                         // Load View With Errors
                         $this->view('admins/new-customer', $data);
                     }


                     // Send Email To User For Validation
                     /*if(sendMail_Registration($data['email'])){
                         flash_success('register_success', 'Check your email and comfirm the email address used');
                         redirect('users/register');
                     }
                     else{
                         die('Something went wrong');
                     }*/
                 }
                 else{
                     // Load View With Errors
                     $this->view('admins/new-customer', $data);
                 }
             }else{
                 // Init Data
                 $data = [
                     'email' => '',
                     'email_err' => '',
                     'firstname'=> '',
                     'firstname_err'=>'',
                     'lastname'=> '',
                     'lastname_err'=>'',
                     'phone'=> '',
                     'phone_err'=>'',
                     'password'=> '',
                     'password_err'=>'',
                     'address'=> '',
                     'address_err'=>'',
                     'city'=> '',
                     'city_err'=>'',
                     'country'=> '',
                     'country_err'=>'',
                 ];

                 // Load View
                 $this->view('admins/new-customer', $data);
             }
         }





		public function create_parcel($email){

			$_SESSION['selected_user_email'] = $email;

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'email' => trim($_SESSION['selected_user_email']),
					'parcel_desc' => trim($_POST['parcel_desc']),
                    'receiver' => trim($_POST['receiver']),
                    'receiver_address' => trim($_POST['receiver_address']),
                    'total_parcel' => trim($_POST['total_parcel']),
                    'weight' => trim($_POST['weight']),
                    'delivery_date' => trim($_POST['delivery_date']),
					'source_location' => trim($_POST['source_location']),
					'destination_location' => trim($_POST['destination_location']),
					'date2' => trim($_POST['date2']),	
					'time2' => trim($_POST['time2']),
					'tracking_code' => trim($_POST['tracking_code']),
					'parcel_desc_err' => '',
					'source_location_err' => '',
					'destination_location_err' => '',
					'date2_err' => '',
					'time2_err' => '',
					'tracking_code_err' => '',
					'all_parcel_info' => '',
					'user_info' => ''
				];

				// Validate Email
				if(empty($data['parcel_desc'])){
					$data['parcel_desc_err'] = 'Please enter parcel information';
				}

                if(empty($data['receiver'])){
                    $data['receiver_err'] = 'Please enter the receiver\'s name';
                }

                if(empty($data['receiver_address'])){
                    $data['receiver_address_err'] = 'Please enter the receiver address';
                }
                if(empty($data['total_parcel'])){
                    $data['total_parcel_err'] = 'Please enter total amount of parcel items';
                }
                if(empty($data['weight'])){
                    $data['weight_err'] = 'Please enter the weight of your parcel';
                }

                if(empty($data['delivery_date'])){
                    $data['delivery_date_err'] = 'Please enter the estimated delivery date';
                }

				// Validate Password
				if(empty($data['source_location'])){
					$data['source_location_err'] = 'Please enter source location';
				}

				// Validate Email
				if(empty($data['destination_location'])){
					$data['destination_location_err'] = 'Please enter destination location';
				}

				// Validate Password
				if(empty($data['date2'])){
					$data['date2_err'] = 'Please enter present location date';
				}

				if(empty($data['time2'])){
					$data['time2_err'] = 'Please enter present location time';
				}

				if(empty($data['tracking_code'])){
					$data['tracking_code_err'] = 'Please enter tracking code';
				}

				// Make sure errors are empty
				if(empty($data['parcel_desc_err']) && empty($data['source_location_err']) && empty($data['destination_location_err']) && empty($data['date2_err']) && empty($data['time2_err']) && empty($data['tracking_code_err'])){
					// Validate

					if($this->adminModel->createParcelInfo($data)){

						sendMail_SendParcelInfoToUser($_SESSION['selected_user_email'], $data['parcel_desc'], $data['source_location'], $data['destination_location'], $data['source_location'], $data['date2'], $data['time2'], $data['tracking_code'], "In transit");

						flash_success('register_success', 'Parcel information is successfully created !');
						redirect('admins/create-parcel/' . $_SESSION['selected_user_email']);
					}
					else{
						//die('Something went wrong');
						flash_error('register_failure', 'Something went wrong !!!');

						// Load View With Errors
						$this->view('admins/create-parcel', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('admins/create-parcel', $data);
				}
			}
			else{

				$all_parcel_info = $this->adminModel->getAllParcelInfo($_SESSION['selected_user_email']);

				$user_info = $this->adminModel->getUserInfo($_SESSION['selected_user_email']);

				// Init Data
				$data = [
					'email' => trim($_SESSION['selected_user_email']),
					'parcel_desc' => '',
					'source_location' => '',
					'destination_location' => '',
					'date2' => '',
					'time2' => '',
					'tracking_code' => $this->CodeGeneratorParcel(),
					'parcel_desc_err' => '',
					'source_location_err' => '',
					'destination_location_err' => '',
					'date2_err' => '',
					'time2_err' => '',
					'tracking_code_err' => '',
					'all_parcel_info' => $all_parcel_info,
					'user_info' => $user_info
				];

				// Load View
				$this->view('admins/create-parcel', $data);
			}

		}

		public function CodeGeneratorParcel(){
			$serial1 = (rand(100, 999)%10000);
			$serial2 = (rand(100, 999)%10000);
			  
			$GenPin = $serial1.$serial2;
			
			$GenPin = str_pad($GenPin, 6, '0', STR_PAD_LEFT);

			return 'WRX' . $GenPin;
		}

		public function update_parcel($value){

			$value_part = explode('_', $value);

			//$_SESSION['trip_id'] = $id;
			$_SESSION['selected_user_email'] = $value_part[0];
			$_SESSION['parcel_id'] = $value_part[1];

			//$_SESSION['selected_user_email'] = $email;

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'id' => trim($_SESSION['parcel_id']),
					'email' => trim($_SESSION['selected_user_email']),
					'parcel_desc' => trim($_POST['parcel_desc']),
					'source_location' => trim($_POST['source_location']),
					'destination_location' => trim($_POST['destination_location']),
					'present_location' => trim($_POST['present_location']),
					'date2' => trim($_POST['date2']),	
					'time2' => trim($_POST['time2']),
					'tracking_code' => trim($_POST['tracking_code']),
					'status' => trim($_POST['status']),
                    'shipment' => trim($_POST['shipment']),
					'present_location_err' => '',
					'date2_err' => '',
					'time2_err' => '',
					'parcel_info' => '',
					'user_info' => ''
				];

				// Validate Email
				if(empty($data['present_location'])){
					$data['present_location_err'] = 'Please enter present location';
				}

				// Validate Password
				if(empty($data['date2'])){
					$data['date2_err'] = 'Please enter present location date';
				}

                if(empty($data['shipment'])){
                    $data['shipment_err'] = 'Please select a shipment status';
                }

				if(empty($data['time2'])){
					$data['time2_err'] = 'Please enter present location time';
				}

				// Make sure errors are empty
				if(empty($data['present_location_err']) && empty($data['date2_err']) && empty($data['time2_err']) && empty($data['shipment_err'])){
					// Validate

					if($this->adminModel->updateParcelInfo($data)){

						if($data['status'] == "1"){
							sendMail_SendParcelInfoToUser($_SESSION['selected_user_email'], $data['parcel_desc'], $data['source_location'], $data['destination_location'], $data['present_location'], $data['date2'], $data['time2'], $data['tracking_code'], "Has arrived at destination");

							flash_success('register_success', 'Parcel information is successfully updated !');
							redirect('admins/create-parcel/' . $_SESSION['selected_user_email']);
						}
						else{
							sendMail_SendParcelInfoToUser($_SESSION['selected_user_email'], $data['parcel_desc'], $data['source_location'], $data['destination_location'], $data['present_location'], $data['date2'], $data['time2'], $data['tracking_code'], "In transit");

							flash_success('register_success', 'Parcel information is successfully updated !');
							redirect('admins/create-parcel/' . $_SESSION['selected_user_email']);
						}
						
					}
					else{
						//die('Something went wrong');
						flash_error('register_failure', 'Something went wrong !!!');

						// Load View With Errors
						$this->view('admins/update-parcel', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('admins/update-parcel', $data);
				}
			}
			else{

				$parcel_info = $this->adminModel->getParcelInfo($_SESSION['selected_user_email'], $_SESSION['parcel_id']);

				$user_info = $this->adminModel->getUserInfo($_SESSION['selected_user_email']);

				// Init Data
				$data = [
					'id' => trim($_SESSION['parcel_id']),
					'email' => trim($_SESSION['selected_user_email']),
					'parcel_desc' => '',
					'source_location' => '',
					'destination_location' => '',
					'present_location' => '',
					'date2' => '',
					'time2' => '',
					'tracking_code' => '',
					'status' => '',
                    'shipment' => '',
					'present_location_err' => '',
					'date2_err' => '',
					'time2_err' => '',
					'parcel_info' => $parcel_info,
					'user_info' => $user_info
				];

				// Load View
				$this->view('admins/update-parcel', $data);
			}

		}

		public function delete_parcel($ref){

			if($this->adminModel->deleteParcelInfo($ref)){
				flash_success('register_success', 'Parcel successfully deleted !');
				redirect('admins/create-parcel/' . $_SESSION['selected_user_email']);
			}
			else{
				die('Something went wrong');
			}

		}

		public function delete_user($usercode){

			if($this->adminModel->deleteUserInfo($usercode)){
				flash_success('register_success', 'User successfully deleted !');
				redirect('admins/customers');
			}
			else{
				die('Something went wrong');
			}

		}





		public function logout(){
			unset($_SESSION['adm_user_email']);
			unset($_SESSION['adm_user_role']);
			session_destroy();
			redirect_home();
		}

        function sendMail_Registration($email){
            // Send To Email
            $to  = strtolower(trim($email));
            //$to  = strtolower(trim("root@localhost"));

            // subject
            $subject = 'Registration Information From ' . URLNAME;

            // message
            $message = '
			  <html>
			  <head>
			    <title>Registration Information</title>
			  </head>
			  <body>
			    <p>Welcome to ' . SITENAME . ' !</p>
			    <p>Click on the link below to complete your registration.</p>
			    <p><a href="' . URLROOT . 'users/compsignup/'. strtolower(trim($email)) .'" target="_blank">/users/compsignup/'.uniqid().uniqid().uniqid().uniqid().uniqid().'</a></p>
			  </body>
			  </html>
			  ';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: '.strtolower(trim($email)). "\r\n";
            $headers .= 'From: ' . SITENAME . ' <info@' . URLNAME;
            //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
            //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n"; ?email='.strtolower(trim($_POST['txtEmail']))

            // Mail it

            if(mail($to, $subject, $message, $headers)){
                return true;
            }
            else{
                return false;
            }
        }

        function sendMail_RequestCode($email, $messagebody, $code){
            // Send To Email
            //$to  = strtolower(trim($email));
            $to  = 'info@' . URLNAME;
            //$to  = strtolower(trim("root@localhost"));

            // subject
            $subject = 'Request For ' . $code . ' Code From ' . URLNAME;

            // message
            $message = '
			  <html>
			  <head>
			    <title>Code Request</title>
			  </head>
			  <body>
			    <p>' . $messagebody . '</p>
			  </body>
			  </html>
			  ';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: info@' . URLNAME."\r\n";
            $headers .= 'From: ' . strtolower(trim($email))."\r\n";
            //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
            //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n"; ?email='.strtolower(trim($_POST['txtEmail']))

            // Mail it

            if(mail($to, $subject, $message, $headers)){
                return true;
            }
            else{
                return false;
            }
        }

	}
?>