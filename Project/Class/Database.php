<?php 
	class Database{
		private $host;
		private $username;
		private $password;
		private $database;
		private $connection;

		function __construct(){
			$this->host = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->database = "banggoods";
			$this->connectDB();
		}
		function connectDB(){
			$this->connection = new mysqli($this->host , $this->username , $this->password);
			if(mysqli_connect_error()){
        		die("Connection Failed: ".mysqli_error());
        	}

        	$db_selected = $this->connection->select_db($this->database);
        	if(!$db_selected)
        		die("There is no such database");
		}
		public function query($sql){
            $result = $this->connection->query($sql);
            if(!$result){
                die("Query Failed: ".$sql);
            }
            return $result;
        }
        public function getConnection(){
            return $this->connection;
        }
        public function escape_string($string){
            $escaped_string = $this->connection->real_escape_string($string);
            return $escaped_string;
        }
        public function __destruct(){
            //This is destructor in php
        }
	}
	$database = new Database(); 
?>s