<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);
 
// set $user property values
$user->name = $_POST['name'];
$user->email = $_POST['email'];
$user->password = base64_encode($_POST['password']);
$user->user = $_POST['user'];
$user->created_time = date('Y-m-d H:i:s');


// create the user
if($user->create()){
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $user->id,
        "name" => $user->name,
        "email" => $user->email,
        "user" => $user->user
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Please check the details entered"
    );
}
print_r(json_encode($user_arr));
?>