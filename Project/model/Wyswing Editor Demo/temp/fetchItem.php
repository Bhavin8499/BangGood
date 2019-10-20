<?php

    require('db.php');


    $sql="SELECT * FROM description where id=5";
    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo $row['descABC'];

?>