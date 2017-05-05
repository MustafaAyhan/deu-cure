<?php 
	class User {
		private $tc;
		private $firstName;
		private $surName;
		private $birthDate;
		private $email;
		private $password;
		private $tel;
		private $address;
		private $gender;
		private $bloodType;
		private $userRole;
		
		function __construct($tc = NULL, $firstName = NULL, $surName = NULL, $birthDate = NULL, $email = NULL, $password = NULL, $tel = NULL, $address = NULL, $gender = NULL, $bloodType = NULL, $userRole = NULL) {
			$this->tc         = $tc;
			$this->firstName  = $firstName;
			$this->surName    = $surName;
            $this->birthDate  = $birthDate;
			$this->email      = $email;
			$this->password   = $password;
            $this->tel        = $tel;
			$this->address    = $address;
			$this->gender     = $gender;
			$this->bloodType  = $bloodType;
			$this->userRole   = $userRole;
        }
		
		public function getTc() {
			return $this->tc;
		}
		
		public function getFirstName() {
			return $this->firstName;
		}
		
		public function getSurName() {
			return $this->surName;	
		}
        
        public function getBirthDate() {
			return $this->birthDate;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getPassword() {
			return $this->password;	
		}
        
        public function getTel() {
			return $this->tel;
		}
        
        public function getAddress() {
			return $this->address;
		}		
        
		public function getGender() {
			return $this->gender;
		}
		
		public function getBloodType() {
			return $this->bloodType;	
		}
        
        public function getUserRole() {
			return $this->userRole;	
		}
	}
?>