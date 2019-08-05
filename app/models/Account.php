<?php
	class Account {
		private $db;

		public function __construct(){
			$this->db = new Database();
		}

		public function getAllParcelInfo($email){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status FROM parcel_info WHERE email = :email ORDER BY id DESC');

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

		public function trackParcel($email, $code){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status FROM parcel_info WHERE email = :email AND tracking_code = :tracking_code');

			// Bind Values
			$this->db->bind(':email', $email);
			$this->db->bind(':tracking_code', $code);

			/*$row = $this->db->single();

			// Check row
			if($this->db->rowCount() > 0){
				return $row;
			}
			else{
				return false;
			}*/

			$results = $this->db->resultSet();

			return $results;
		}

		public function trackParcelAnonymous($code){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status FROM parcel_info WHERE tracking_code = :tracking_code');

			// Bind Values
			$this->db->bind(':tracking_code', $code);

			$results = $this->db->resultSet();

			return $results;
		}

		
	}
?>