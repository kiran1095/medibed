<?php
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/patient.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare patient object
$patient = new Patient($db);
 
// set patient property values
$patient->name = $_POST['name'];
$patient->email = $_POST['email'];
$patient->phone = $_POST['phone'];
$patient->gender = $_POST['gender'];
$patient->health_issue = $_POST['health_issue'];
$patient->assigned_doctor = $_POST['assigned_doctor'];
$patient->assigned_nurse = $_POST['assigned_nurse'];
$patient->created = date('Y-m-d H:i:s');
$patient->discharged_flag = 0;


// create the patient
if($patient->create1()){
    $patient_arr=array(
        "status" => true,
        "message" => "Successfully Signup!",
        "id" => $patient->id,
        "name" => $patient->name,
        "email" => $patient->email,
        "phone" => $patient->phone,
        "gender" => $patient->gender,
        "health_issue" => $patient->health_issue
    );
}
else{
    $patient_arr=array(
        "status" => false,
        "message" => "Please check the details entered"
    );
}
print_r(json_encode($patient_arr));
?>