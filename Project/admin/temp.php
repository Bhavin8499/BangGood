<!doctype html>
<html lang="en">
<body>
<form action="temp.php" method="post" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td>Select Photo (one or multiple):</td>
            <td><input type="file" name="files[]" multiple/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">Note: Supported image format: .jpeg, .jpg, .png, .gif</td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit"/></td>
        </tr>
    </table>
</form>


    <!-- //footer -->
</body>
</html>	
<?php
$img_db=array();
$i=0;
    
    print_r($img_db);
    if(isset($_POST['submit']))
    {
        upload_image();
    }

function upload_image($image_for = "product")
{
    $dirname = "";
    $filepath = "";

    switch ($image_for){
        case "product" :
            $filepath = "\images\product\\";
            $dirname = dirname(__DIR__)."\images\product\\";            
            break;

        case "profile_image" : 
            $filepath = "\images\profile\\";
            $dirname = dirname(__DIR__)."\images\profile\\";
            break;

        case "cover_image" :
            $filepath = "\images\cover\\";
            $dirname = dirname(__DIR__)."\images\cover\\";
            break;

        default :
            $dirname = dirname(__DIR__)."\\";

    }

    $errors = array();
    $uploadedFiles = array();
    $extension = array("jpeg","jpg","png","gif");
    $bytes = 1024;
    $KB = 1024;
    $totalBytes = $bytes * $KB;
    $imagesDB="";
    $counter = 0;
    
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
        $temp = $_FILES["files"]["tmp_name"][$key];
        //echo "<br/>".$temp;
        $name = $_FILES["files"]["name"][$key];
        //echo "<br/>".$name;
        if(empty($temp)){break;}
        
        $counter++;
        $UploadOk = true;
        
        if($_FILES["files"]["size"][$key] > $totalBytes)
        {
            $UploadOk = false;
            array_push($errors, $name." file size is larger than the 1 MB.");
        }
        
        $ext = pathinfo($name, PATHINFO_EXTENSION);

        $randomfilename = $image_for."_".rand(10000,1000000).".".$ext;

        if(in_array($ext, $extension) == false){
            $UploadOk = false;
            array_push($errors, $name." is invalid file type.");
        }
        
        if(file_exists($dirname.$randomfilename) == true){
            $UploadOk = false;
            array_push($errors, $randomfilename." file is already exist.");
        }
        
        if($UploadOk == true){
            ///echo $temp;
            move_uploaded_file($temp,$dirname.$randomfilename);
            array_push($uploadedFiles,$dirname.$randomfilename);
        }

    }
    if($counter>0){
        if(count($errors)>0)
        {
            echo "<b>Errors:</b>";
            echo "<br/><ul>";
            foreach($errors as $error)
            {
                echo "<li>".$error."</li>";
            }
            echo "</ul><br/>";
        }

        //print_r($uploadedFiles);
        $imagesDB=serialize($uploadedFiles);
        //print_r($imagesDB);
        //return $imagesDB;
        //echo "<br>";
        //print_r($imagesDB);
        //$imagesDB=Unserialize($imagesDB);echo "<br>";
        //print_r($imagesDB);
    }
    else{
        echo "Please, Select file(s) to upload.";
    }
}



function upload_image1($file, $image_for = "product"){

    $dirname = "";
    $filepath = "";

    switch ($image_for){
        case "product" :
            $filepath = "\images\product\\";
            $dirname = dirname(__DIR__)."\images\product\\";            
            break;

        case "profile_image" : 
            $filepath = "\images\profile\\";
            $dirname = dirname(__DIR__)."\images\profile\\";
            break;

        case "cover_image" :
            $filepath = "\images\cover\\";
            $dirname = dirname(__DIR__)."\images\cover\\";
            break;

        default :
            $dirname = dirname(__DIR__)."\\";

    }

    if (!file_exists($dirname)) {
        mkdir($dirname, 0777, true);
    }

    

    $errors = array();
    $uploadedFiles = array();
    $extension = array("jpeg","jpg","png","gif");
    $bytes = 1024;
    $KB = 1024;
    $totalBytes = $bytes * $KB;
    $imagesDB="";
    $counter = 0;
    $UploadOk = true;

    $temp = $file["tmp_name"];
    $name = $file["name"];


    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $file_name = pathinfo($name, PATHINFO_FILENAME);

    $randomfilename = $image_for."_".rand(10000,1000000).".".$ext;



        if(in_array($ext, $extension) == false){
            $UploadOk = false;
            array_push($errors, $name." is invalid file type.");
        }
        
        if(file_exists($dirname.$randomfilename) == true){
            $UploadOk = false;
            array_push($errors, $randomfilename." file is already exist.");
        }
        
        if($UploadOk == true){
            echo $temp;
            //move_uploaded_file($temp,$dirname.$randomfilename);
            
        }

        return $filepath.$randomfilename;

}



/*$target_dir = "../images/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$allowTypes = array('jpg','png','jpeg','gif');
    
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
            //$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"][$key]);
            //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
       echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
        }   
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "\nSorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }*/
//////////////////////////////////////////////
/*extract($_POST['submit']);
$error=array();
$extension=array("jpeg","jpg","png","gif");
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);

    if(in_array($ext,$extension)) {
        if(!file_exists("../images/".$txtGalleryName."/".$file_name)) {
            //move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../images/".$txtGalleryName."/".$file_name);
            echo $file_tmp=$_FILES["files"]["tmp_name"][$key],"../images/".$txtGalleryName."/".$file_name;
        }   
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
           // move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../images/".$txtGalleryName."/".$newFileName);
           echo $file_tmp=$_FILES["files"]["tmp_name"][$key],"../images/".$txtGalleryName."/".$file_name;
        }
    }

    else {
        array_push($error,"$file_name, ");
    }
}
*/

?>
                                    