<?php

/*function get_queryfrom_assoc($array){

    $qry = "";

    foreach($array as $key => $value){
        $qry = "abc";
    }

}
*/

function generate_insert_query($args, $tbl_name = ""){

    $keys = array();
    $values = array();

    foreach($args as $key=>$value){
        array_push($keys, $key);
        array_push($values, "'$value'");
    }

    implode(",",$keys)." values ".implode(',', $values);

    return "insert into $tbl_name (".implode(",",$keys).") values (".implode(",", $values).");";
}

function generate_update_query($args){
    
    $strItem = "";

    foreach($args as $key=>$value){
        $strItem .= $key.",'".$value."'";
    }

    //implode(",",$keys)." values ".implode(',', $values);

    return $strItem;

}

?>