<?php

if(!class_exists('Database'))
{
     require_once(dirname(__FILE__)."/../Database/Database.php");
}
if(!function_exists('generate_insert_query'))
{
    require_once(dirname(__FILE__)."/../helper_functions.php");
}
class Contact{

        public $cid = 0;
        public $name = "";
        public $email = "";
        public $contact_no = "";
        public $subject = "";
        public $message= "";
        public $dbObj;
        public $connection;

        public static $table_name = "contact_us";



        public function __construct($args = array()){
        
            $this->name    = $args["name"];
            $this->email   = $args["email"];
            $this->contact_no  = $args["contact_no"];
            $this->subject = $args["subject"];
            $this->message = $args["message"];

            $this->dbObj=Database::getInstance();
            $this->connection=$this->dbObj->conn;

        }

        function addContact()
        {

            $args = [
                "name" => $this->name,
                "email" => $this->email,
                "contact_no" => $this->contact_no,
                "subject" => $this->subject,
                "message" => $this->message
            ];
        

            $query = generate_insert_query($args, Contact::$table_name);

            $insert_id = $this->dbObj->run_query($query);

            return $insert_id;
         }

        function getAllContact($columns='*')
        {
        	$sql = "SELECT ".$columns." FROM contact_us";
        	$result_set = $this->dbObj->get_results($sql);

			if($this->connection->errno) {
				die("Error while getting concact details : ".$this->connection->errno);
			}
			return $result_set;
        }

        function deleteContact($cid){

        	$sql = "DELETE FROM contact_us WHERE cid = ?";

        	if(!($preparedStatement = $this->connection->prepare($sql)))
                die($this->connection->error);

            $preparedStatement->bind_param("i",$cid);

            if($preparedStatement->execute())
            	return "true";
            else
                die("ERROR WHILE DELETING CONTACT: ".$this->connection->error);
        }

    }

    function getAllContact($columns='*')
    {
        
        $dbObj=Database::getInstance();

        $sql = "SELECT ".$columns." FROM contact_us ORDER BY cid DESC LIMIT 20";

        $result_set = $dbObj->get_results($sql);

        return $result_set;
    }
    //$arr=array('name'=>'Harsh','email'=>'hchhatbar86@gmail.com','contact_no'=>'90000099999','subject'=>'Order','message'=>'temp');
    //$cont=new Contact($arr);
    
    // $result_set=$cont->addContact();

    // echo $result_set;
    //$result_set=$cont->getAllContact();
    //print_r($result_set);
    /*$result_set=$cont->getAllContact();
    print_r($result_set);*/
    // echo $_SERVER['DOCUMENT_ROOT'];

    /*$result_set=$cont->deleteContact(1);*/
?>