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



    $query= "SELECT `id`,`user` FROM user WHERE email= '".$this->email."' and password= '".base64_encode($this->password)."'";
    $stmt=$this->conn->prepare($query);
    try{
        if(!$stmt->execute())
        {
        throw new Exception("Could not be able to execute query");
        }
        else{    
        $stmt->store_result();
        $rowCount=$stmt->num_rows;
        if($rowCount==1){
            $user=$stmt->fetch_assoc();
            $_SESSION["id"]=$user["id"];
           // return $user["user"];
           header('/medibed/Doctor/create.php');
        }
        else
        {
            throw new Exception("could not able to execute");
            //return null;
            //alert("Their is wrong in the connections");
        }
    }
}
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
    //return null;



// create the user
