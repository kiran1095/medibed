<?php
class Patient{
 
    // database connection and table name
    private $conn;
    private $table_name = "patients";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $health_issue;
    public $created_time;
    public $assigned_doctor;
    public $assigned_nurse;
    public $discharged_flag;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all patients
    function read(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `phone`, `gender`, `health_issue`, `assigned_doctor`, `assigned_nurse`, `created_time`
                FROM
                    " . $this->table_name . " where discharged_flag=0
                ORDER BY
                    id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }








    //to read discharge patients

function discharge_read(){
    
    // select all query
    $query = "SELECT `id`, `name`, `email`, `phone`, `gender`, `health_issue`  FROM " . $this->table_name . " WHERE discharged_flag=1 ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
}



    // get single patient data
    function read_single(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `phone`, `gender`, `health_issue`, `assigned_doctor`, `assigned_nurse`, `created_time`
                FROM
                    " . $this->table_name . " 
                WHERE
                    id= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
        return $stmt;
    }

    // create patient record
  /*  function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`name`, `email`, `phone`, `gender`, `health_issue`, `created_time`)
                  VALUES
                        ('".$this->name."', '".$this->email."', '".$this->phone."', '".$this->gender."', '".$this->health_issue."', '".$this->created."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
*/

    function create1(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`name`, `email`, `phone`, `gender`, `health_issue`,`assigned_doctor`, `assigned_nurse`,`discharged_flag`, `created_time`)
                  VALUES
                        ('".$this->name."', '".$this->email."', '".$this->phone."', '".$this->gender."', '".$this->health_issue."', '".$this->assigned_doctor."', '".$this->assigned_nurse."', '".$this->discharged_flag."', '".$this->created."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            $query="UPDATE nurses SET assigned_flag=1 WHERE name='".$this->assigned_nurse."'";
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()){

                window.alert("success");
                 return true;   
                 }
                 else{
                  window.alert("unsuccess");
                    return false;
                 }
            // /$n= new NURSE;
            //$res=$n->assign($this->assigned_nurse);
           return true;
        }

        return false;
    }




    // update patient 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name='".$this->name."', email='".$this->email."', phone='".$this->phone."', gender='".$this->gender."', health_issue='".$this->health_issue."'
                WHERE
                    id='".$this->id."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    //assign doctor and nurse to patient

    function update1(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    assigned_doctor='".$this->doctor_name."', assigned_nurse='".$this->nurse_name."'
                WHERE
                    name='".$this->name."'";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }


    // delete patient
    function delete(){
        
        // query to insert record
      /*  $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id= '".$this->id."'";*/
        
        $query = "UPDATE ". $this->table_name ." SET discharged_flag= 1 WHERE id= '".$this->id."'";
        // prepare query
        $stmt = $this->conn->prepare($query);
        
        // execute query
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                email='".$this->email."'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}