<?php

if(!class_exists('Database')){
    include("../model/Database/Database.php");
}


if(isset($_POST['action']))
{
    $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : "ERROR";
   
    if($order_id != null)
    {
        $query = "update orders set order_status='Rejected' where oid=$order_id";
        
        $dbObj = Database::getInstance();
        $dbObj->run_query($query);

        echo true;
    }
}
?>