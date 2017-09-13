<?php
namespace Rest;
	class USER 
	{
		public $db_user_con;



		function __construct() 
		{
			
			$this->db_user_con = Database::connect();
		
		}
		
		public function register($email, $password, $name = '') {
			try 
			{
				$password_hashed = password_hash($password, PASSWORD_DEFAULT);

				$req = $this->db_user_con->prepare("INSERT INTO users(email,name,password) VALUES (?,?,?) ");
				$req->execute([$email, $name, $password_hashed]);

				return $req;
			} 
			catch(PDOException $e) 
			{
				echo $e->getMessage();
			}
		}

	        public function login($email,$pass)
		    {
		       try
		       {
		          $req = $this->db_user_con->prepare("SELECT * FROM users WHERE email =:email LIMIT 1");
		          $req->execute([':email'=>$email]);
		          $userRow=$req->fetch(PDO::FETCH_ASSOC);
		          if($req->rowCount() > 0)
		          {
		             if(password_verify($pass, $userRow['password']))
		             {
		                $_SESSION['user_id'] = $userRow['pk_id'];
		                $_SESSION['name'] = $userRow['name'];
		                $req->closeCursor();
		                $req = $this->db_user_con->prepare("UPDATE users SET logged = 1 WHERE users.pk_id ='". $_SESSION['user_id']."'");
		                $req->execute();
		                $_SESSION['logged'] = $userRow['logged'];
		                return true;
		             }
		             else
		             {
		                return false;
		             }
		          }
		       }
		       catch(PDOException $e)
		       {
		           echo $e->getMessage();
		       }
		    }


	    public function is_loggedin()
	    {
	       // if(isset($_SESSION['user_id']))
	       // {
	       //    return true;
	       // }
	       // //Si return true le code s'arrête donc cette ligne ne s'active pas 
	       // return false;

	    	//Ceci return true or false en une ligne.
	       return isset($_SESSION['user_id']);
	    }

		public function redirect($url) {
			header("Location: $url");
		}
		
		public function logout() {
			// unset($_SESSION['user_id']);
			//Fait la même chose mais efface toutes les variables sessions.
			$req = $this->db_user_con->prepare("UPDATE `users` SET logged = 0 WHERE users.pk_id='".$_SESSION['user_id']."'");
			$req->execute();
			$req->closeCursor();
			session_destroy();
			$_SESSION = [];
			return true;
		}
		
		public function setNewName($newName){
			$req = $this->db_user_con->prepare("UPDATE `users` SET name = '" .$newName. "' WHERE users.pk_id='".$_SESSION['user_id']."'");
			$req->execute([$newName]);
			$req->closeCursor();
		}

		public function setNewEmail($newEmail){
			$req = $this->db_user_con->prepare("UPDATE `users` SET email = '" .$newEmail. "' WHERE users.pk_id='".$_SESSION['user_id']."'");
			$req->execute([$newEmail]);
			$req->closeCursor();
		}
		
		public function deleteUser() {
			$req = $this->db_user_con->prepare("DELETE FROM `users` WHERE users.pk_id='".$_SESSION['user_id']."'");
			$req->execute();
			$req->closeCursor();
		}
	}

	$user = new User();
/*	$user->register('test@test.com', 'pass', 'Paul');
*/	$user->login('test@test.com', 'pass');
	

?>
