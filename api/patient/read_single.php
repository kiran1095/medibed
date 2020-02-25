<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/patient.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare patient object
$patient = new Patient($db);

// set ID property of patient to be edited
$patient->id = isset($_GET['id']) ? $_GET['id'] : die("could not connect");

// read the details of patient to be edited
$stmt = $patient->read_single();

if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $patient_arr=array(
        "id" => $row['id'],
        "name" => $row['name'],
        "email" => $row['email'],
        "phone" => $row['phone'],
        "gender" => $row['gender'],
        "health_issue" => $row['health_issue'],
        "created" => $row['created']
    );
}
// make it json format
print_r(json_encode($patient_arr));
?>