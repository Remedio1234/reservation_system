
<?php

	class Users  {

		private $db;
		private $users = "tbl_users";

		function __construct($dbConn){
			$this->db = $dbConn;
		}

		public function customerCheckIsLogin($isLoggedIn){
			if (!isset($isLoggedIn) && $isLoggedIn != true) {
				header("location:?v=home");
			}
		}

	public function customerLogout(){
		unset($_SESSION['customer']);
		return true;
	}

		public function login($post) {
			$query = $this->db->query("SELECT * FROM tbl_customers WHERE username = '" . $post['username'] . "' AND password = '".md5($post['password'])."' ");
			$row = $query->fetch(PDO::FETCH_OBJ);
			if ($query->rowCount() > 0) {
				if($row->status == 'pen') {
					$response = ['response' => 'pending', 'message' => '<div class="alert alert-danger" role="alert">Your registration has not been confirmed.</div>'];
				} else if($row->status == 'na'){
					$response = ['response' => 'pending', 'message' => '<div class="alert alert-danger" role="alert">Your account has been Inactive.Please check and try again.!</div>'];
				} else {
					$response = ['response' => 'success'];
					$_SESSION['customer'] = [
							'customer_id' => $row->customer_id,
							'username'    => $row->username,
							"isLoggedIn" => true
					];
				}
			} else {
				$response = ['response' => 'failed', 'message' => '<div class="alert alert-danger" role="alert">Account not Exist. Please check and try again.!</div>'];
			}
			echo json_encode($response);
		}

		public function register($post) {
			$check_customer = $this->db->query("SELECT * FROM tbl_customers WHERE username = '". $post['username']."' ");
			if($check_customer->rowCount() > 0) {
					$response = ['response' => 'exist', 'message' => '<div class="alert alert-danger" role="alert">Username already taken. Please check and try again.!</div>'];
			} else {
				$register = $this->db->query("INSERT INTO tbl_customers(fullname,username,password,email_address,profile)VALUES('".$post['fullname']."','" . $post['username'] . "','" . md5($post['password']) . "','" . $post['email_address'] . "','default.jpg')");
				if ($register) {
					$response = ['response' => 'success', 'message' => '<div class="alert alert-success" role="alert">You have been successfully registered.</div>'];
				} else {
					$response = ['response' => 'failed'];
				}
			}

			echo json_encode($response);
			
		}

		public static function generate($max = 64) {
			$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
			$i = 0;
			$salt = "";
			while ($i < $max) {
				$salt .= $characterList {
					mt_rand(0, (strlen($characterList) - 1))};
				$i++;
			}
			return $salt;
		}
	
		public function userLogin($username, $password) {
			try {

				$form_username = $_POST['username'];
    			$form_password = $_POST['password'];

				$sql   = $this->db->prepare("SELECT * FROM ".$this->users." WHERE username=:username AND status=:status LIMIT 1");
						  $sql->execute(array(":username" => $username,":status" => 1));
				$getRow = $sql->fetch(PDO::FETCH_ASSOC);
				
				$stored_salt = $getRow['salt'];
			    $stored_hash = $getRow['password'];
			    $check_pass = $stored_salt . $form_password;
			    $check_hash = hash('sha512',$check_pass);

				if($check_hash == $stored_hash){
					$get_session = [
									"user_id"    => $getRow['user_id'],
									"username"   => $getRow['username'],
									"fullname"	 => $getRow['fullname'],
									"email"	 	 => $getRow['email'],	
									"role"   	 => $getRow['role'],
									"isLoggedIn" => true
									];
					Users::set_session($get_session);
					Users::userDateModified(date("Y/m/d H:i:s"), $getRow['user_id']);
					echo json_encode(["response" => "success", "user" => $getRow['role']]);
				
				} else {
					echo json_encode(array("response" => "failed"));
				}

			} catch (PDOException $e) {
				throw new Exception($e->getMessage());
			}
		}

		public function set_session($session) {

			$_SESSION['user'] = $session;
			if(!empty($_SESSION['user'])) {
				return $_SESSION['user'];
			}
		}

		public function userCheckIsLogin($isLoggedIn) {
			if(!isset($isLoggedIn) && $isLoggedIn !=true) {
				header('location:account'); 
			}
		}

		public function userAlreadyLogin($isLoggedIn) {
			if(isset($isLoggedIn) && $isLoggedIn ==true) {
				header('location: ../?v=dashboard'); 
			}
		}


		public function userDateModified($last_login, $user_id) {
			if(isset($user_id)) {
				if(!empty($user_id)) {
					$stmt   = $this->db->prepare("UPDATE ". $this->users . " SET last_login =:last_login WHERE user_id =:user_id ");
					$result = $stmt->execute(array(":last_login" => $last_login, ":user_id" => $user_id));
					if($result) {
						return true;
					}

				}
			}
		}

		public function userLogout() {
			$this->userDateModified(date("Y/m/d H:i:s"), 0, $_SESSION['user']['user_id']);
			unset($_SESSION['user']);
			return true;
		}

	}

	$db = new Users($dbConn);
?>
