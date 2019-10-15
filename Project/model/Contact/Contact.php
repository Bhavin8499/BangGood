<?php

    require_once("C:\\xampp\htdocs\BangGood\Project\model\Database\Database.php");
    class Contact{

        public $cid = 0;
        public $name = "";
        public $email = "";
        public $mobile = "";
        public $subject = "";
        public $message= "";
        public $dbObj;
        public $connection;

        public function __construct($args = array()){
        
            $this->name    = $args["name"];
           // $this->cid     = $args["cid"];
            $this->email   = $args["email"];
            $this->contact_no   = $args["contact_no"];
            $this->subject  = $args["subject"];
            $this->message  = $args["message"];

            $this->dbObj=Database::getInstance();
            $this->connection=$this->dbObj->conn;

        }

        function addContact()
        {
            $sql = "INSERT INTO contact_us(name,email,contact_no,subject ,message ) VALUES(?,?,?,?,?)";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
        		die($this->connection->error);

            $preparedStatement->bind_param("ssiss",$this->name,$this->email, $this->contact_no, $this->subject, $this->message);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE INSERTING CONTACT: ".$this->connection->error);
        }

        function getAllContact($columns='*')
        {
        	$sql = "SELECT ".$columns." FROM contact_us";
        	$result_set = $this->dbObj->get_results($sql);

			if($this->connection->errno) {
				die("Error while getting CONTACT details : ".$this->connection->errno);
			}
			return $result_set;
        }
    }

    //$arr=array('name'=>'Harsh',"email"=>'hchhatbar86@gmail.com','contact_no'=>'90000099999','subject'=>'Check','message'=>'temp');
    //$cont=new Contact($arr);
    //$result_set=$cont->addContact();

    /*$result_set=$cont->getAllContact();
    print_r($result_set);*/
   // echo $_SERVER['DOCUMENT_ROOT'];

?>