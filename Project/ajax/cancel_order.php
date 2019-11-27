<?php

    include("../model/Database/Database.php");

    if(isset($_POST["order_id"])){

        $sql = "update orders set order_status='Canceled' where oid=".$_POST["order_id"];

        $dbObj = Database::getInstance();

        $dbObj->run_query($sql);

    }

?>