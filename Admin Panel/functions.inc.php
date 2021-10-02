<?php
function pr($arr){
    echo '<pre>';
    // print_r() function prints the information about a variable in a more human-readable way
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con,$str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    } 
}
?>