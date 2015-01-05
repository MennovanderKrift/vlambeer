<?php
	class Database {
		// Properties:
		private $host;
		private $dbname;
		private $user;
		private $pass;

		private $error;
		private $stmt;
		private $con;

		// Methods:
		public function __construct($host, $dbname, $user, $pass) {
			$this->host = $host;
			$this->dbname = $dbname;
			$this->user = $user;
			$this->pass = $pass;

			try {
				$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
				$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				return $this->error;
			}
		} // end "__construct".


		# $query 	= required. $query is the SQL query you want to send off to the database.
		# $bind   = optional. $bind is the associative array for binding parameters to the query.
		
		/*
			EXAMPLE:
			-- To send a query off to the database simply use this:
			$result = $db->query("SELECT * FROM tbl_name");
			
			-- The variable $result will then hold the resultset returned by the database.

			-- To send a query to the database with bound parameters use this:
			$bind = [
				"firstname" => $_POST['firstName'],
				"lastname"  => $_POST['lastName']
			];

			$result = $db->query("SELECT * FROM tbl_name WHERE first_name = :first & last_name = :last", $bind);
			-- The variable $result will then hold the resultset returned by the database.
		*/
		public function query($query, $bind = null) {
			$this->stmt = $this->con->prepare($query);
			
			if ($bind) {
				$this->stmt->execute($bind);
			} else {
				$this->stmt->execute();
			}
			
			$check = explode(" ", $query);

			if ($check[0] == "SELECT") {
				$result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
				
				if (isset($result[0])) {
					return $result;
				} else {
					return false;
				}
			} else {
				return true;
			}
		} // end method "query".
		public function getRows(){
			if($this->stmt->rowCount()){
				return true;
			}
		}
	} // end class.
?>