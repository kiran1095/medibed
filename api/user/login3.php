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
$user->email = $_POST['email'];
$user->password = base64_encode($_POST['password']);

// create the user
$result=$user->check();
if($result!=null){
    $user_arr=array(
        "status"=> $result,
        "message" => "Successfully Signup!",
        "id" => $user->id
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Entered details in the form are wrong"
    );
}
print_r(json_encode($user_arr));
?>