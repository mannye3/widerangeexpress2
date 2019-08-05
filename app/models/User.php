<?php
	class User {
		private $db;

		public function __construct(){
			$this->db = new Database();
		}

		// Register User
		public function compsignup($data){

			$usercode = uniqid().uniqid().uniqid();

			$this->db->query('INSERT INTO users (email, password, usercode, status) VALUES(:email, :password, :usercode, :status)');
		
			// Bind Values			
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':password', $data['password']);
			$this->db->bind(':usercode', $usercode);
			$this->db->bind(':status', '1');

			// Execute
			if($this->db->execute()){

				$this->db->query('INSERT INTO registration (email, firstname, lastname, phone, address, usercode, status, regdate) VALUES(:email, :firstname, :lastname, :phone, :address, :usercode, :status, :regdate)');
			
				// Bind Values			
				$this->db->bind(':email', $data['email']);
				$this->db->bind(':firstname', $data['first_name']);
				$this->db->bind(':lastname', $data['last_name']);
				$this->db->bind(':phone', $data['phone']);
				$this->db->bind(':address', $data['address']);
				$this->db->bind(':usercode', $usercode);
				$this->db->bind(':status', '1');
				$this->db->bind(':regdate', date("d/m/Y H:i a"));

				// Execute
				if($this->db->execute()){

					$this->db->query('INSERT INTO upd (psd, usercode) VALUES(:psd, :usercode)');
		
					// Bind Values			
					$this->db->bind(':psd', $data['orig_pass']);
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

		// Find User by Email
		public function login($email, $password){
			$this->db->query('SELECT users.email,users.password,users.usercode,registration.firstname,registration.lastname FROM users INNER JOIN registration ON users.email = registration.email WHERE users.email = :email');

			// Bind Values
			$this->db->bind(':email', $email);

			$row = $this->db->single();

			$hashed_password = $row->password;

			if(password_verify($password, $hashed_password)){
				return $row;
			}
			else{
				return false;
			}
			
			// Check row
			if($this->db->rowCount() > 0){
				return true;
			}
			else{
				return false;
			}
		}

		// Find User by Email
		public function findUserByEmail($email){
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

		// Get User by ID
		public function getUserById($id){
			$this->db->query('SELECT * FROM users WHERE id = :id');
			// Bind Value
			$this->db->bind(':id', $id);

			$row = $this->db->single();

			return $row;
		}
	}
?>