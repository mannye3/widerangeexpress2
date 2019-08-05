<?php
	class Admins extends Controller {
		public function __construct(){
			$this->adminModel = $this->model('Admin');
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

			$listing_num_users = $this->adminModel->GetTotalUsers();
			$listing_num_parcel = $this->adminModel->GetTotalParcel();
			// $all_users = $this->adminModel->getAllUsers();

			// Init Data
			$data = [
				'listing_num_users' => $listing_num_users,
				'listing_num_parcel' => $listing_num_parcel
			];

			// Load View
			$this->view('admins/dashboard', $data);

		}


		public function users(){

			$all_users = $this->adminModel->getAllUsers();

			// Init Data
			$data = [
				'all_users' => $all_users
			];

			// Load View
			$this->view('admins/users', $data);

		}



		public function parcel(){

			$all_parcel = $this->adminModel->getAllParcel();

			// Init Data
			$data = [
				'all_parcel' => $all_parcel
			];

			// Load View
			$this->view('admins/parcel', $data);

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

				if(empty($data['time2'])){
					$data['time2_err'] = 'Please enter present location time';
				}

				// Make sure errors are empty
				if(empty($data['present_location_err']) && empty($data['date2_err']) && empty($data['time2_err'])){
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





		public function uploadpics(){

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Sanitize POST Data
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				if (isset($_POST['submit'])) {
					 


					if (!empty($_FILES['user_pics']['name'])) {

			         
				      $orignalfile = $_FILES['user_pics']['name'];   
				      $imagefile = str_replace(" ", "_", $orignalfile);
				      $imagefile_type = $_FILES['user_pics']['type'];
				      $imagefile_size = $_FILES['user_pics']['size'];

				      if ((($imagefile_type == 'image/gif') || ($imagefile_type == 'image/jpeg') || ($imagefile_type == 'image/pjpeg') || 
				        ($imagefile_type == 'image/png')) && ($imagefile_size > 0) && ($imagefile_size <= PIC_MAXFILESIZE)) {

				        if ($_FILES['user_pics']['error'] == 0) {



				        	// Init Data
							$data = [						
								'user_pics' => $imagefile,		
								'user_pics_err' => ''
							];

							// Validate Email
							if(empty($data['user_pics'])){
								$data['user_pics_err'] = 'Select user image for upload';
							}
							
							// Make sure errors are empty
							if(empty($data['user_pics_err'])){
													
								// Check for User/Email
								if($this->adminModel->checkUserPictureExist($_SESSION['user_email'])){
									// User found
									$data['user_pics_err'] = 'Picture already registered for user !!!';

									// Load View With Errors
									$this->view('admins/uploadpics', $data);

								}
								else{

									// Move the file to the target upload folder
						          	$target = PIC_ROOT_PATH . $imagefile;

					          		if (move_uploaded_file($_FILES['user_pics']['tmp_name'], $target)){
						            
							            // create image dimension for 400 x 300
							            //create_image_dimenion($target, $width_1500, $height_1001, $target_thumb_1500); 

							            // User not found
										// Register Vehicle
										if($this->adminModel->updateUserPicture($data)){
											flash_success('register_success', 'User picture is successfully uploaded !');
											redirect('admins/dashboard');
										}
										else{
											die('Something went wrong');
										} 

						          	}

									
								}
								
							}
							else{
								// Load View With Errors
								$this->view('admins/uploadpics', $data);
							}

				          


				        }
				        else{
				          $data['user_pics_err'] = 'Sorry, there was a problem uploading your image.';

				          // Load View With Errors
						  $this->view('admins/uploadpics', $data);
				        }
				      }
				      else {
				      	// wrong image format
				        $data['user_pics_err'] = 'Make sure image is gif, jpeg or png and check the size (100 kb or less)!!!';

			          	// Load View With Errors
					  	$this->view('admins/uploadpics', $data);
				      }           
				    }
				    else {
				      // no image was uploaded
				      $data['user_pics_err'] = 'Please upload an image !!!';

			          // Load View With Errors
					  $this->view('admins/uploadpics', $data);
				    }
					// Try to delete the temporary document file
					@unlink($_FILES['user_pics']['tmp_name']);



				}

				


				
				

				
			}
			else{
				// Init Data
				$data = [					
				'user_pics' => '',			
				'user_pics_err' => ''
				];

				// Load View
				$this->view('admins/uploadpics', $data);
			}
		}

		public function transaction($email){

			$_SESSION['selected_user_email'] = $email;

			// Init Data
			$data = [
				'email' => $email,
				'trans_date' => '',
				'depositor_name' => '',
				'currency' => '',
				'trans_amount' => '',
				'email_err' => '',
				'trans_date_err' => '',
				'depositor_name_err' => '',
				'trans_amount_err' => ''
			];

			// Load View
			$this->view('admins/transaction', $data);

		}


		public function addtransaction($email){

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'email' => trim($_POST['txtEmail']),
					'trans_date' => trim($_POST['txtTransDate']),
					'depositor_name' => trim($_POST['txtDepositorName']),
					'currency' => trim($_POST['currency']),	
					'trans_amount' => trim($_POST['txtTransAmount']),
					'email_err' => '',
					'trans_date_err' => '',
					'depositor_name_err' => '',
					'trans_amount_err' => ''
				];

				// Validate Email
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}

				// Validate Password
				if(empty($data['trans_date'])){
					$data['trans_date_err'] = 'Please enter date';
				}

				// Validate Email
				if(empty($data['depositor_name'])){
					$data['depositor_name_err'] = 'Please enter depositor name';
				}

				// Validate Password
				if(empty($data['trans_amount'])){
					$data['trans_amount_err'] = 'Please enter amount';
				}

				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['trans_date_err']) && empty($data['depositor_name_err']) && empty($data['trans_amount_err'])){
					// Validate
					// Check for User/Email
					if($this->adminModel->checkTransactionExist($data['email'], $data['trans_date'], $data['depositor_name'], $data['trans_amount'])){
						// User found
						//$data['email_err'] = 'Vehicle profile already registered for user !!!';
						flash_error('register_failure', 'Transaction already exist for user !!!');

						// Load View With Errors
						$this->view('admins/transaction/' . $_SESSION['selected_user_email'], $data);

					}
					else{
						// User not found
						// Register Vehicle
						if($this->adminModel->createTransaction($data)){

							flash_success('register_success', 'Transaction is successfully created !');
							redirect('admins/transaction/' . $_SESSION['selected_user_email']);
						}
						else{
							die('Something went wrong');
						}
					}
				}
				else{
					// Load View With Errors
					$this->view('admins/transaction/' . $_SESSION['selected_user_email'], $data);
				}
			}
			else{
				// Init Data
				$data = [
					'email' => $email,
					'trans_date' => '',
					'depositor_name' => '',
					'currency' => '',
					'trans_amount' => '',
					'email_err' => '',
					'trans_date_err' => '',
					'depositor_name_err' => '',
					'trans_amount_err' => ''
				];

				// Load View
				$this->view('admins/transaction/' . $_SESSION['selected_user_email'], $data);
			}

		}

		public function generatecode($email){

			$_SESSION['selected_user_email'] = $email;

			$transcodes = $this->adminModel->getTransactionCodes($_SESSION['selected_user_email']);

			// Init Data
			$data = [
				'transcodes' => $transcodes
			];

			// Load View
			$this->view('admins/generatecode', $data);

		}

		public function createcode($email){

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'email' => $_SESSION['selected_user_email'],
					'ccc' => $this->codegeneratorCCC(),
					'cot' => $this->codegeneratorCOT(),
					'itc' => $this->codegeneratorITC(),
					'imf' => $this->codegeneratorIMF()
				];
				
				if($this->adminModel->createCodes($data)){

					flash_success('register_success', 'Transaction codes successfully created !');
					redirect('admins/generatecode/' . $_SESSION['selected_user_email']);
				}
				else{
					die('Something went wrong');
				}
			}
			else{
				
				// Load View
				$this->view('admins/generatecode/' . $_SESSION['selected_user_email']);
			}

		}

		public function codegeneratorCCC(){
			$serial1 = (rand(100, 999)%10000);
			$serial2 = (rand(100, 999)%10000);
			  
			$GenPin = $serial1.$serial2;
			
			$GenPin = str_pad($GenPin, 6, '0', STR_PAD_LEFT);

			return 'CCC' . $GenPin;
		}

		public function codegeneratorCOT(){
			$serial1 = (rand(100, 999)%10000);
			$serial2 = (rand(100, 999)%10000);
			  
			$GenPin = $serial1.$serial2;
			
			$GenPin = str_pad($GenPin, 6, '0', STR_PAD_LEFT);

			return 'COT' . $GenPin;
		}

		public function codegeneratorITC(){
			$serial1 = (rand(100, 999)%10000);
			$serial2 = (rand(100, 999)%10000);
			  
			$GenPin = $serial1.$serial2;
			
			$GenPin = str_pad($GenPin, 6, '0', STR_PAD_LEFT);

			return 'ITC' . $GenPin;
		}

		public function codegeneratorIMF(){
			$serial1 = (rand(100, 999)%10000);
			$serial2 = (rand(100, 999)%10000);
			  
			$GenPin = $serial1.$serial2;
			
			$GenPin = str_pad($GenPin, 6, '0', STR_PAD_LEFT);

			return 'IMF' . $GenPin;
		}

		public function edituser($email){

			$_SESSION['selected_user_email'] = $email;

			$all_user_info = $this->adminModel->getAllUserInfo($_SESSION['selected_user_email']);

			// Init Data
			$data = [
				'all_user_info' => $all_user_info,
				'email_err' => '',
				'phone_err' => '',
				'homeaddress_err' => '',
				'accname_err' => '',
				'accnumber_err' => '',
				'accpin_err' => '',
				'ledgerbalance_err' => '',
				'availablebalance_err' => '',
				'lastdeposit_err' => ''
			];

			// Load View
			$this->view('admins/edituser', $data);

		}

		public function updateuser($email){

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'email' => trim($_POST['txtEmail']),
					'phone' => trim($_POST['txtPhone']),
					'homeaddress' => trim($_POST['txtHomeAddress']),
					'accname' => trim($_POST['txtAccountName']),
					'accnumber' => trim($_POST['txtAccountNumber']),
					'accpin' => trim($_POST['txtAccountPin']),
					'currency' => trim($_POST['currency']),	
					'ledgerbalance' => trim($_POST['txtLedgerBalance']),
					'availablebalance' => trim($_POST['txtAvailableBalance']),
					'lastdeposit' => trim($_POST['txtLastDeposit']),
					'email_err' => '',
					'phone_err' => '',
					'homeaddress_err' => '',
					'accname_err' => '',
					'accnumber_err' => '',
					'accpin_err' => '',
					'ledgerbalance_err' => '',
					'availablebalance_err' => '',
					'lastdeposit_err' => ''
				];

				// Validate Email
				if(empty($data['email'])){
					$data['email_err'] = 'Please enter email';
				}

				// Validate Email
				if(empty($data['phone'])){
					$data['phone_err'] = 'Please enter mobile number';
				}

				// Validate Password
				if(empty($data['homeaddress'])){
					$data['homeaddress_err'] = 'Please enter home address';
				}

				// Validate Email
				if(empty($data['accname'])){
					$data['accname_err'] = 'Please enter account name';
				}

				// Validate Password
				if(empty($data['accnumber'])){
					$data['accnumber_err'] = 'Please enter account number';
				}

				// Validate Email
				if(empty($data['accpin'])){
					$data['accpin_err'] = 'Please enter account pin';
				}

				// Validate Password
				if(empty($data['ledgerbalance'])){
					$data['ledgerbalance_err'] = 'Please enter ledger balance';
				}

				// Validate Email
				if(empty($data['availablebalance'])){
					$data['availablebalance_err'] = 'Please enter available balance';
				}

				// Validate Password
				if(empty($data['lastdeposit'])){
					$data['lastdeposit_err'] = 'Please enter last deposit';
				}

				// Make sure errors are empty
				if(empty($data['email_err']) && empty($data['phone_err']) && empty($data['homeaddress_err']) && empty($data['accname_err']) && empty($data['accnumber_err']) && empty($data['accpin_err']) && empty($data['ledgerbalance_err']) && empty($data['availablebalance_err']) && empty($data['lastdeposit_err'])){
					// Validate
					if($this->adminModel->updateProfile($data)){

						$_SESSION['user_email'] = $data['email'];

						flash_success('register_success', 'Profile is successfully updated !');
						redirect('admins/dashboard');
					}
					else{
						die('Something went wrong');
					}
				}
				else{
					// Load View With Errors
					$this->view('admins/edituser', $data);
				}
			}
			else{				

				$data = [
					'email_err' => '',
					'phone_err' => '',
					'homeaddress_err' => '',
					'accname_err' => '',
					'accnumber_err' => '',
					'accpin_err' => '',
					'ledgerbalance_err' => '',
					'availablebalance_err' => '',
					'lastdeposit_err' => ''
				];

				// Load View
				$this->view('admins/edituser', $data);
			}

		}

		public function logout(){
			unset($_SESSION['adm_user_email']);
			unset($_SESSION['adm_user_role']);
			session_destroy();
			redirect_home();
		}

	}
?>