<?php

    class Database{

        private $username = "root";
        private $password = "";
        private $host = "localhost";
        private $database_name = "bh_banggood";
        public $conn;
        public static $dbObj;


        function __construct()
        {
            // Create connection
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database_name);

            // Check connection
            if ($this->conn->connect_error)
            {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public static function getInstance(){
            if(Database::$dbObj == null){
                Database::$dbObj = new Database();
            }
            
            return Database::$dbObj;
        }

        function run_query($query = ""){
            $this->conn->query($query,MYSQLI_USE_RESULT);

            if($this->conn->error != null)
                return $this->conn->error;

            return $this->conn->insert_id;
        }

        function get_results($query = ""){

            $result = $this->conn->query($query, MYSQLI_USE_RESULT);

            if($result == null || $result == false)
                return false;

            for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row);

            if ($set == null){
                return false;
            }
            return $set;

        }

        function get_result($query = ""){


            $result = $this->conn->query($query, MYSQLI_USE_RESULT);

            if($this->conn->error){
                echo $this->conn->error;
            }

            if($result == null || $result == false)
                return false;

            $arr = $result->fetch_assoc();

            if($arr != null){
                return $arr;
            }

            return false;
            
        }

    }

?>