<?php

if(!class_exists("Database"))
    include("../model/Database/Database.php");

if(isset($_POST["address_id"])){

    $aid = $_POST["address_id"];

    $sql = "delete from address where id=".$aid;

    $dbObj = Database::getInstance();

    $affected = $dbObj->run_query($sql);

    if($affected > 0){
        echo true;
        return;
    }

    echo false;
}

?>