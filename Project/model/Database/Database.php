<?php

    class Database{

        private $username = "root";
        private $password = "";
        private $host = "localhost";
        private $database_name = "bh_banggood";
        private $conn;

        function __construct(){
            // Create connection
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database_name);

            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        function run_query($query = ""){
            return $this->conn->query($query,MYSQLI_USE_RESULT);

        }

        function get_results($query = ""){

            $result = $this->conn->query($query, MYSQLI_USE_RESULT);

            for ($set = array (); $row = $result->fetch_assoc(); $set[] = $row);

            if ($set == null){
                return false;
            }
            return $set;

        }

        function get_result($query = ""){

            $result = $this->conn->query($query, MYSQLI_USE_RESULT);
            $arr = $result->fetch_assoc();

            if($arr != null){
                return $arr;
            }

            return false;
            
        }

    }

?>