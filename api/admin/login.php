<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/admin.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new Admin($db);
 
// set $user property values
$user->email = $_POST['email'];
$user->password = base64_encode($_POST['password']);


if($user->validate()){
    $user_arr=array(
        "status"=> true,
        "message" => "Successfully Login!",
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Entered details of the admin are wrong"
    );
}
print_r(json_encode($user_arr));
?>