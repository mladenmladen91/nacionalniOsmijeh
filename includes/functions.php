<?php

// function for testing queries
function testQuery($query){
    if(!$query){
        die(mysqli_error($connection));
    }
}
// function for redirecting when user is not logged
function redirect(){
    if(!isset($_SESSION['username'])){
        header('location: index.php');
    }
}

// function for checking if file is an image
function extension($value){
     $ext = substr($value, -4);
    
    if($ext === ".jpg" || $ext === ".png" || $ext === ".svg" || $ext === ".JPG" || $ext === ".PNG" || $ext === ".SVG"){
        return true;
    }
    
    return false;
}

// function for checking if file is a document
function documentRecognizer($value){
     $ext = substr($value, -4);
    
    if($ext === ".pdf" || $ext === ".doc" || $ext === "docx"){
        return true;
    }
    
    return false;
}

// function for cleaning special chars
function clean($string) {
   return preg_replace('/[^a-z \čćšžđĐŠČĆŽ]/i', '', $string); // Removes special chars.
}

// function for cleaning some chars
function productClean($string) {
   return preg_replace('/[^0-9 \-]/i', '', $string); // Removes special chars.
}

// function for cleaning some chars
function proizvodClean($string) {
   return preg_match('/[^0-9 \-]/i', $string); // Removes special chars.
}

// function for cleaning some chars
function clothesClean($string) {
   return preg_replace('/[^a-z0-9 \čćšžđĐŠČĆŽ-]/i', '', $string); // Removes special chars.
}

// function for cleaning some chars
function numberClean($string) {
   return preg_replace('/[^0-9]/', '', $string);
}

// function for clearifying iframe options
function clearify($str){
    $str = str_replace("height=", '', $str);
    $str = str_replace("width=", '', $str);
    return str_replace("\\", '', $str);
}

// function for link validating
function linkValidate($str){
    return filter_var($str, FILTER_VALIDATE_URL);
}

// function for preventing blan space in ckm editor
function clearSpace($str){
    $str = str_replace("<p>", '', $str);
    $str = str_replace("</p>", '', $str);
    $str = str_replace("&nbsp;", '', $str);
    $str = str_replace(' ', '', $str);
    if($str === ''){
        return true;
    }
    return false;
}