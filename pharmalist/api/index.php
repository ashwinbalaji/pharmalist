<?php
//include database configuration file
include_once 'config/db.php';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'uploads/'; // upload directory

if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['myFile']){

$img = $_FILES['myFile']['name'];
$tmp = $_FILES['myFile']['tmp_name'];

if(!isset($_POST['delivery'])){
    $delivery = 'off';
}      

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)){ 
$path = $path.strtolower($final_image); 
$path = $_SERVER['DOCUMENT_ROOT'].'/'.$path;


if(move_uploaded_file($tmp,$path)){
// echo "<img src='$path' />";

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$delivery = ($delivery=='on')?"Yes":"No";
$file_name =$path;


// //insert form data in the database
$insert = $db->query("INSERT pharmacy_list (`pharmacy_name`,`email`,`file_path`,`address`,`delivery`) VALUES ('".$name."','".$email."','".$path."','".$address."','".$delivery."')");

echo $insert?'ok':'err';
}
} 
else 
{
echo 'invalid';
}
}

?>