<?php
    
    if(isset($_POST["btn"])){
        require_once("helper_functions.php");

        echo upload_image($_FILES["tmpfile"],"product");

    }

?>

<html>

<form enctype="multipart/form-data" method="post">

    <input type="file" name="tmpfile">
    <input type="submit" name="btn" value="button">

</form>

</html>