<?php

    if(isset($_POST['submit'])){
        $strDesc = $_POST['myEditor'];
        echo htmlspecialchars($strDesc);
        echo "EMJ".$strDesc;

        require('db.php');

        $dbString = mysqli_real_escape_string($conn,$strDesc);

        $sql = "INSERT INTO description (descABC) VALUES ('".$dbString."')";

            if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }

    }

?>

<html>

    <head>
        <title>Demo</title>
        <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
        
    </head>

    <body>


        <form method="post">
            <textarea  name="myEditor" cols="35" rows="20"></textarea>
            <script type="text/javascript"> 
            
                CKEDITOR.replace( 'myEditor',
                    {
                        //fullPage : true,
                        //uiColor : '#efe8ce'
                    });
                    </script>

<input type="submit" value="submit" name="submit"/>

    </form>
    </body>
    

</html>