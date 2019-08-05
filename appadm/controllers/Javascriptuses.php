<?php

class Javascriptuses extends Controller {
	public function __construct(){
		$this->adminModel = $this->model('Admin');
	}
	
	public function getallusersinfo(){

		$all_user_info = $this->adminModel->getAllUsersDetails();

		$data = [
			'all_user_info' => $all_user_info
		];

		/*foreach($data['currency_code'] as $currency_info) :    'currency_code' => $all_user_info,
			'currency_convert' => ''

			$currency_convert = $this->adminModel->getCurrencyConvert($currency_info->currency);

			$data['currency_convert'] = $currency_convert;

		endforeach;	*/

		$this->view('javascriptuses/getallusersinfo', $data);

	}

	public function getallusertrans($email){
			
		$all_user_trans = $this->adminModel->getAllUserTransactions($email);

		$data = [
			'all_user_trans' => $all_user_trans
		];

		/*foreach($data['currency_code'] as $currency_info) :   'currency_code' => $all_user_trans,
			'currency_convert' => ''

			$currency_convert = $this->adminModel->getCurrencyConvert($currency_info->currency);

			$data['currency_convert'] = $currency_convert;
			
		endforeach;	*/

		$this->view('javascriptuses/getallusertrans', $data);

	}

	public function getalluser(){
			
		$all_user_info = $this->adminModel->getAllUsersDetails();

		$data = [
			'all_user_info' => $all_user_info
		];

		$this->view('javascriptuses/getalluser', $data);

	}

	public function getusercardbank($email){
			
		$user_card_details = $this->adminModel->getUserCardDetails($email);
		$user_bank_details = $this->adminModel->getUserBankDetails($email);

		$data = [
			'user_card_details' => $user_card_details,
			'user_bank_details' => $user_bank_details
		];

		$this->view('javascriptuses/getusercardbank', $data);

	}
	
	
}
?>