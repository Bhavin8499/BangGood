<?php

include("../model/Database/Database.php");

if(isset($_POST["order_id"])){

    $sql = "select * from orders where oid=".$_POST["order_id"];

    $dbObj = Database::getInstance();

    $result = $dbObj->get_result($sql);

    $sql = "insert into payment values (".$_POST["order_id"].",".$result["user_id"].",'COD','Done')";

    $dbObj->run_query($sql);


    $sql = "update orders set payment_status='Done' where oid=".$_POST["order_id"];
    $dbObj->run_query($sql);



}

?>