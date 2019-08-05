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

		public function getAllUsers(){
			$this->db->query('SELECT email, firstname, lastname, usercode FROM registration');

			$results = $this->db->resultSet();

			return $results;
		}

		public function createParcelInfo($data)
        {

            $this->db->query('INSERT INTO parcel_info (email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status, delivery_date,status_tag) VALUES(:email, :description, :source_location, :destination_location, :present_location, :present_location_date, :present_location_time, :tracking_code, :status, :delivery_date, :status_tag)');

            /*$dateObj = explode('-',$data['delivery_date']);
            $newDate = $dateObj[2].'-'.$dateObj[1].'-'.$dateObj['0'];*/
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
            $this->db->bind(':delivery_date', $data['delivery_date']);
            $this->db->bind(':status_tag', 'Despatched');

            // Execute
            if ($this->db->execute()) {
                // Second insert
                $this->db->query('INSERT INTO parcel_box (receiver_name, receiver_address, item_total, weight, wrx_reference) VALUES(:receiver_name, :receiver_address, :item_total, :weight, :wrx_reference)');
                // Bind Values
                $this->db->bind(':receiver_name', $data['receiver']);
                $this->db->bind(':receiver_address', $data['receiver_address']);
                $this->db->bind(':item_total', $data['total_parcel']);
                $this->db->bind(':weight', $data['weight']);
                $this->db->bind(':wrx_reference', $data['tracking_code']);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }

            } else {
                return false;
            }

		}


		public function getAllParcelInfo($email){
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status,delivery_date FROM parcel_info WHERE email = :email');

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
			$this->db->query('SELECT id, email, description, source_location, destination_location, present_location, present_location_date, present_location_time, tracking_code, status, status_tag  FROM parcel_info WHERE email = :email AND id = :id');

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
			
			$this->db->query('UPDATE parcel_info SET description = :description, source_location = :source_location, destination_location = :destination_location, present_location = :present_location, present_location_date = :present_location_date, present_location_time = :present_location_time, status = :status, status_tag = :status_tag WHERE email = :email AND id = :id');
		
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':id', $data['id']);
			$this->db->bind(':description', $data['parcel_desc']);
			$this->db->bind(':source_location', $data['source_location']);
			$this->db->bind(':destination_location', $data['destination_location']);
			$this->db->bind(':present_location', $data['present_location']);
			$this->db->bind(':present_location_date', $data['date2']);
			$this->db->bind(':present_location_time', $data['time2']);
			$this->db->bind(':status', $data['status']);
            $this->db->bind(':status_tag', $data['shipment']);

			// Execute
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}			
						
		}

		public function deleteParcelInfo($ref){
			
			$this->db->query('DELETE FROM parcel_info WHERE tracking_code = :tracking_code');
		
			// Bind Values			
			$this->db->bind(':tracking_code', $ref);

			// Execute
			if($this->db->execute()){
				$this->db->query('DELETE FROM parcel_box WHERE wrx_reference = :wrx_reference');
		
				// Bind Values			
				$this->db->bind(':wrx_reference', $ref);

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

		public function deleteUserInfo($usercode){
			
			$this->db->query('DELETE FROM registration WHERE usercode = :usercode');
		
			// Bind Values			
			$this->db->bind(':usercode', $usercode);

			// Execute
			if($this->db->execute()){
				$this->db->query('DELETE FROM users WHERE usercode = :usercode');
		
				// Bind Values			
				$this->db->bind(':usercode', $usercode);

				// Execute
				if($this->db->execute()){
					$this->db->query('DELETE FROM upd WHERE usercode = :usercode');
		
					// Bind Values			
					$this->db->bind(':usercode', $usercode);

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



		
		
	}
?>