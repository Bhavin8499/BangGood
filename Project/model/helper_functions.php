<?php

/*function get_queryfrom_assoc($array){

    $qry = "";

    foreach($array as $key => $value){
        $qry = "abc";
    }

}
*/
//echo "<h1>HELLO</h1>";

function generate_insert_query($args, $tbl_name = "")
{

    $keys = array();
    $values = array();

    foreach($args as $key=>$value){
        array_push($keys, $key);
        array_push($values, "'$value'");
    }

    implode(",",$keys)." values ".implode(',', $values);

    return "insert into $tbl_name (".implode(",",$keys).") values (".implode(",", $values).");";
}

function generate_update_query($args)
{
    
    $strItem = "";

    foreach($args as $key=>$value){
        $strItem .= $key.",'".$value."'";
    }

    //implode(",",$keys)." values ".implode(',', $values);

    return $strItem;

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

        $imagesDB=base64_encode(serialize($uploadedFiles));
        return $imagesDB;
    }
    else{
        echo "Please, Select file(s) to upload.";
    }
}



?>