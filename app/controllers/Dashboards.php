<?php
	class Dashboards extends Controller {
		public function __construct(){
			$this->accountModel = $this->model('Account');
		} 

		/*public function index(){

			// Get posts

			$all_parcel_info = $this->accountModel->getAllParcelInfo($_SESSION['user_email']);

			$user_info = $this->accountModel->getUserInfo($_SESSION['user_email']);

			$data = [
				'all_parcel_info' => $all_parcel_info,				
				'user_info' => $user_info,
				'code' => '',
				'code_err' => '',
				'search_parcel_info' => ''
			];


			$this->view('dashboards/index', $data);
			
		}*/

		public function index(){
			// Check for POST
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				// Process Form

				// Init Data
				$data = [
					'code' => trim($_POST['code']),
					'code_err' => '',
					'search_parcel_info' => '',
					'all_parcel_info' => '',			
					'user_info' =>''
				];

				// Validate Email
				if(empty($data['code'])){
					$data['code_err'] = 'Please enter tracking code';
				}

				// Make sure errors are empty
				if(empty($data['code_err'])){
					// Validate
					// Check and set logged in user
					$search_parcel_info = $this->accountModel->trackParcel($_SESSION['user_email'], $data['code']);

					if($search_parcel_info){
						//$this->populateParcelInfo($search_parcel_info);

						$all_parcel_info = $this->accountModel->getAllParcelInfo($_SESSION['user_email']);

						$user_info = $this->accountModel->getUserInfo($_SESSION['user_email']);

						$data = [
							'all_parcel_info' => $all_parcel_info,				
							'user_info' => $user_info,
							'code' => '',
							'code_err' => '',
							'search_parcel_info' => $search_parcel_info
						];


						$this->view('dashboards/index', $data);
					}
					else{
						$data['code_err'] = 'Data does not exist !!!';

						$this->view('dashboards/index', $data);
					}
				}
				else{
					// Load View With Errors
					$this->view('dashboards/index', $data);
				}
			}
			else{
				// Init Data

				$all_parcel_info = $this->accountModel->getAllParcelInfo($_SESSION['user_email']);

				$user_info = $this->accountModel->getUserInfo($_SESSION['user_email']);

				$data = [
					'all_parcel_info' => $all_parcel_info,				
					'user_info' => $user_info,
					'code' => '',
					'code_err' => '',
					'search_parcel_info' => ''
				];


				$this->view('dashboards/index', $data);
			}
		}


	}
?>