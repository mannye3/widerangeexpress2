<?php
	class Admin {
		private $db;

		public function __construct(){
			$this->db = new Database();
		}
		
		// Find User by Email
		public function login($email, $password){
			$this->db->query('SELECT email,role FROM admusers WHERE email = :email AND password = :password');

			// Bind Values
			$this->db->bind(':email', $email);
			$this->db->bind(':password', $password);

			$row = $this->db->single();			
			
			// Check row
			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
		}

		public function getAllParcel(){
			$this->db->query('SELECT * FROM parcel_info ');

			$results = $this->db->resultSet();

			return $results;
		}



		public function getAllUsers(){
			$this->db->query('SELECT email, firstname, lastname FROM registration');

			$results = $this->db->resultSet();

			return $results;
		}


		 public function GetTotalUsers(){
      $this->db->query('SELECT COUNT(id) AS TotalCountUsers FROM registration  ');

      // Bind Values
     

      $row = $this->db->single();
      
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return 0;
      }
    }


     public function GetTotalParcel(){
      $this->db->query('SELECT COUNT(id) AS TotalCountParcels FROM parcel_info  ');

      // Bind Values
     

      $row = $this->db->single();
      
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return 0;
      }
    }

		public function createParcelInfo($data){

			$this->db->query('INSERT INTO parcel_info (email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status) VALUES(:email, :description, :source_location, :destination_location, :present_location, :present_location_date, :present_location_time, :tracking_code, :status)');
			
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':description', $data['parcel_desc']);
			$this->db->bind(':source_location', $data['source_location']);
			$this->db->bind(':destination_location', $data['destination_location']);
			$this->db->bind(':present_location', $data['source_location']);
			$this->db->bind(':present_location_date', $data['date2']);
			$this->db->bind(':present_location_time', $data['time2']);
			$this->db->bind(':tracking_code', $data['tracking_code']);
			$this->db->bind(':status', '0');

			// Execute
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
						
		}

		public function getAllParcelInfo($email){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status FROM parcel_info WHERE email = :email');

			// Bind Values
			$this->db->bind(':email', $email);

			$results = $this->db->resultSet();

			return $results;
		}

		public function getUserInfo($email){
			$this->db->query('SELECT email, firstname, lastname FROM registration WHERE email = :email');

			// Bind Values
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
		}

		public function getParcelInfo($email, $id){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status FROM parcel_info WHERE email = :email AND id = :id');

			// Bind Values
			$this->db->bind(':email', $email);
			$this->db->bind(':id', $id);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
		}

		public function updateParcelInfo($data){
			
			$this->db->query('UPDATE parcel_info SET present_location = :present_location, present_location_date = :present_location_date, present_location_time = :present_location_time, status = :status WHERE email = :email AND id = :id');
		
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':present_location', $data['present_location']);
			$this->db->bind(':present_location_date', $data['date2']);
			$this->db->bind(':present_location_time', $data['time2']);
			$this->db->bind(':status', $data['status']);

			// Execute
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}			
						
		}





		// Find User by Email
		public function checkProfileExist($email){
			$this->db->query('SELECT * FROM users WHERE email = :email');

			// Bind Values
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){
				return true;
			}
			else{
				return false;
			}
		}

		// Register User
		public function createProfile($data){

			$this->db->query('INSERT INTO users (email, password, status) VALUES(:email, :password, :status)');
			
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':status', '1');

			// Execute
			if($this->db->execute()){

				$this->db->query('INSERT INTO registration (email, phone, home_address, pics) VALUES(:email, :phone, :home_address, :pics)');
			
				// Bind Values			
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':phone', $data['phone']);
				$this->db->bind(':home_address', $data['homeaddress']);
				$this->db->bind(':pics', '');

				// Execute
				if($this->db->execute()){

					$this->db->query('INSERT INTO account_info (email, account_name, account_number, account_pin, currency, ledger_balance, available_balance, last_deposit) VALUES(:email, :account_name, :account_number, :account_pin, :currency, :ledger_balance, :available_balance, :last_deposit)');
		
					// Bind Values			
					$this->db->bind(':email', $data['email']);
					$this->db->bind(':account_name', $data['accname']);
					$this->db->bind(':account_number', $data['accnumber']);
					$this->db->bind(':account_pin', $data['accpin']);
					$this->db->bind(':currency', $data['currency']);
					$this->db->bind(':ledger_balance', $data['ledgerbalance']);
					$this->db->bind(':available_balance', $data['availablebalance']);
					$this->db->bind(':last_deposit', $data['lastdeposit']);

					// Execute
					if($this->db->execute()){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
				
			}
			else{
				return false;
			}
						
		}

		// Find User by Email
		public function checkUserPictureExist($email){
			$this->db->query('SELECT pics FROM registration WHERE email = :email');

			// Bind Values
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0 && !empty($row->pics)){
				return true;
			}
			else{
				return false;
			}
		}

		// Update Vehicle License
		public function updateUserPicture($data){
			
			$this->db->query('UPDATE registration SET pics = :pics WHERE email = :email');
		
			// Bind Values			
			$this->db->bind(':email', $_SESSION['user_email']);
			$this->db->bind(':pics', $data['user_pics']);

			// Execute
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}			
						
		}

		public function getAllUsersDetails(){
			$this->db->query('SELECT account_info.email, account_info.account_name, account_info.account_number, account_info.account_pin, account_info.currency, account_info.ledger_balance, account_info.available_balance, account_info.last_deposit, registration.phone FROM account_info INNER JOIN registration ON  account_info.email = registration.email');

			$results = $this->db->resultSet();

			return $results;
		}

		public function getCurrencyConvert($currency_code){
			$this->db->query('SELECT html_code_name FROM currency_map WHERE iso_code_name = :iso_code_name');

			// Bind Values			
			$this->db->bind(':iso_code_name', $currency_code);

			$row = $this->db->single();

			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
		}

		public function getAllUserTransactions($email){
			$this->db->query('SELECT email, depositor_name, currency, amount, trans_date FROM transaction WHERE email = :email');

			// Bind Values			
			$this->db->bind(':email', $email);

			$results = $this->db->resultSet();

			return $results;
		}

		// Find User by Email
		public function checkTransactionExist($email, $trans_date, $depositor_name, $amount){
			$this->db->query('SELECT email, depositor_name, amount, trans_date FROM transaction WHERE email = :email AND depositor_name = :depositor_name AND amount = :amount AND trans_date = :trans_date');

			// Bind Values
			$this->db->bind(':email', $email);
			$this->db->bind(':depositor_name', $depositor_name);
			$this->db->bind(':amount', $amount);
			$this->db->bind(':trans_date', $trans_date);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0 && !empty($row->pics)){
				return true;
			}
			else{
				return false;
			}
		}

		// Register User
		public function createTransaction($data){

			$this->db->query('INSERT INTO transaction (email, depositor_name, currency, amount, trans_date) VALUES(:email, :depositor_name, :currency, :amount, :trans_date)');
			
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':depositor_name', $data['depositor_name']);
			$this->db->bind(':currency', $data['currency']);
			$this->db->bind(':amount', $data['trans_amount']);
			$this->db->bind(':trans_date', $data['trans_date']);

			// Execute
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
						
		}

		public function getTransactionCodes($email){
			$this->db->query('SELECT email, ccc, cot, itc, imf FROM transfer_codes WHERE email = :email');

			// Bind Values			
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
			
		}

		public function createCodes($data){

			$this->db->query('SELECT * FROM transfer_codes WHERE email = :email');

			// Bind Values
			$this->db->bind(':email', $data['email']);

			$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){

				$this->db->query('UPDATE transfer_codes SET ccc = :ccc, cot = :cot, itc = :itc, imf = :imf WHERE email = :email');
		
				// Bind Values			
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':ccc', $data['ccc']);
				$this->db->bind(':cot', $data['cot']);
				$this->db->bind(':itc', $data['itc']);
				$this->db->bind(':imf', $data['imf']);

				// Execute
				if($this->db->execute()){
					return true;
				}
				else{
					return false;
				}			
			}
			else{

				$this->db->query('INSERT INTO transfer_codes (email, ccc, cot, itc, imf) VALUES(:email, :ccc, :cot, :itc, :imf)');
			
				// Bind Values			
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':ccc', $data['ccc']);
				$this->db->bind(':cot', $data['cot']);
				$this->db->bind(':itc', $data['itc']);
				$this->db->bind(':imf', $data['imf']);

				// Execute
				if($this->db->execute()){
					return true;
				}
				else{
					return false;
				}
			}			
						
		}

		public function getAllUserInfo($email){
			$this->db->query('SELECT account_info.email, account_info.account_name, account_info.account_number, account_info.account_pin, account_info.currency, account_info.ledger_balance, account_info.available_balance, account_info.last_deposit, registration.phone, registration.home_address FROM account_info INNER JOIN registration ON  account_info.email = registration.email WHERE account_info.email = :email');

			// Bind Values			
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}
		}

		// Update Vehicle License
		public function updateProfile($data){
			
			$this->db->query('UPDATE account_info SET account_name = :account_name, account_number = :account_number, account_pin = :account_pin, currency = :currency, ledger_balance = :ledger_balance, available_balance = :available_balance, last_deposit = :last_deposit WHERE email = :email');
		
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':account_name', $data['accname']);
			$this->db->bind(':account_number', $data['accnumber']);
			$this->db->bind(':account_pin', $data['accpin']);
			$this->db->bind(':currency', $data['currency']);
			$this->db->bind(':ledger_balance', $data['ledgerbalance']);
			$this->db->bind(':available_balance', $data['availablebalance']);
			$this->db->bind(':last_deposit', $data['lastdeposit']);

			// Execute
			if($this->db->execute()){

				$this->db->query('UPDATE registration SET phone = :phone, home_address = :home_address WHERE email = :email');
		
				// Bind Values			
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':phone', $data['phone']);
				$this->db->bind(':home_address', $data['homeaddress']);

				// Execute
				if($this->db->execute()){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}			
						
		}

		
		
	}
?>