<?php
	class Pages extends Controller {
		public function __construct(){
			$this->accountModel = $this->model('Account');
		} 

		public function index(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/index');
		}

		public function about_us(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/about-us');
		}

		public function service(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/service');
		}

		public function our_client(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/our-client');
		}

		public function track_trace(){

			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'code' => trim($_POST['code']),
					'code_err' => '',
					'search_parcel_info' => ''
				];

				// Validate Email
				if(empty($data['code'])){
					$data['code_err'] = 'Please enter tracking code';
				}

				// Make sure errors are empty
				if(empty($data['code_err'])){
					// Validate
					// Check and set logged in user
					$search_parcel_info = $this->accountModel->trackParcelAnonymous($data['code']);

					if($search_parcel_info){

						$data = [
							'code' => '',
							'code_err' => '',
							'search_parcel_info' => $search_parcel_info
						];


						$this->view('pages/track-trace', $data);
					}
					else{
						$data['code_err'] = 'Data does not exist !!!';

						$this->view('pages/track-trace', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('pages/track-trace', $data);
				}
			}
			else{
				// Init Data

				$data = [
					'code' => '',
					'code_err' => '',
					'search_parcel_info' => ''
				];


				$this->view('pages/track-trace', $data);
			}

			
		}

		public function faq(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/faq');
		}

		public function contact_us(){

			/*$data = [
				'email' => '',
				'password' => '',
				'email_err' => '',
				'password_err' => ''
			];*/

			$this->view('pages/contact-us');
		}
	}
?>