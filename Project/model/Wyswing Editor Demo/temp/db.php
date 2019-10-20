<?php

$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";


$conn=mysqli_connect("$servername","$username","$password",$dbname) or die("Server Error");

if($conn==true)
{
    echo "Success";
}
else
{
    mysql_close($conn);
}

?>