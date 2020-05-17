<?php 
	class Connection
	{
		public $servername;
		public $username;
		public $password;
		public $dbname;

		function __construct($server, $user, $pass, $db)
		{
			$this->servername = $server;
			$this->username = $user;
			$this->password = $pass;
			$this->dbname = $db;
		}

		function Connect()
		{
			$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
			return $conn;
		}
	}
?>