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

    $arr = array();

    foreach($args as $key=>$value){
        $strItem = $key."='".$value."'";
        array_push($arr, $strItem);
    }

    $str = implode(",",$arr);

    //implode(",",$keys)." values ".implode(',', $values);

    return $strItem;

}

function upload_image($img, $image_for = "product")
{
    $dirname = "";
    $filepath = "";

    switch ($image_for){
        case "product" :
            $filepath = "images\product\\";
            $dirname = dirname(__DIR__)."\images\product\\";            
            break;

        case "profile_image" : 
            $filepath = "images\profile\\";
            $dirname = dirname(__DIR__)."\images\profile\\";
            break;

        case "cover_image" :
            $filepath = "images\cover\\";
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
    $KB = 2048;
    $totalBytes = $bytes * $KB;
    $imagesDB="";
	$counter = 0;
   
	$temp = $img["tmp_name"];
	//echo "<br/>".$temp;
	$name = $img["name"];
	//echo "<br/>".$name;
	if(empty($temp)){return false;}

	$UploadOk = true;
	
	if($img["size"] > $totalBytes)
	{
		$UploadOk = false;
		array_push($errors, $name." file size is larger than the 2 MB.");
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

    $str = str_replace('\\', '/', $filepath.$randomfilename);

    return $str;
  
}

function upload_multiple_image($img, $image_for = "product")
{
    $dirname = "";
    $filepath = "";
	$folderpath = "";

    switch ($image_for){
        case "product" :
            $filepath = "images\product\\";
            $dirname = dirname(__DIR__)."\images\product\\";            
            break;

        case "profile_image" : 
            $filepath = "images\profile\\";
            $dirname = dirname(__DIR__)."\images\profile\\";
            break;

        case "cover_image" :
            $filepath = "images\cover\\";
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
    $KB = 2048;
    $totalBytes = $bytes * $KB;
    $imagesDB="";
	$counter = 0;
   
	
	foreach($img["tmp_name"] as $key=>$tmp_name){
                $temp = $img["tmp_name"][$key];
			//echo "<br/>".$temp;
			$name = $img["name"][$key];
			//echo "<br/>".$name;
			if(empty($temp)){ echo "empty Data has shown"; }//return false;}
		
			$UploadOk = true;
			
			if($img["size"][$key] > $totalBytes)
			{
				$UploadOk = false;
				array_push($errors, $name." file size is larger than the 2 MB.");
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
                
                $newName = $str = str_replace('\\', '/', $filepath.$randomfilename);

				array_push($uploadedFiles,$newName);
			}
			
    }

    print_r($uploadedFiles);
  	return $uploadedFiles;
}


?>