<?php
class Nurse{
 
    // database connection and table name
    private $conn;
    private $table_name = "nurses";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $created;
    public $a_name;
    public $assigned_flag;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all nurses
    function read(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `phone`, `created`
                FROM
                    " . $this->table_name . " 
                ORDER BY
                    id DESC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // read all available nurses
    function available(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `phone`, `created`
                FROM
                    " . $this->table_name . " WHERE assigned_flag =0";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }



    // get single nurse data
    function read_single(){
    
        // select all query
        $query = "SELECT `id`, `name`, `email`, `password`, `phone`, `created` FROM
                    " . $this->table_name . " 
                WHERE
                    id= '".$this->id."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create nurse
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`name`, `email`, `password`, `phone`, `assigned_flag`, `created`)
                  VALUES
                        ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->phone."', '".$this->assigned_flag."', '".$this->created."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

 /*   public function assign($a_name){
            $query="UPDATE nurses SET assigned_flag=1 WHERE name='".$a_name."'"; 
        $stmt = $this->conn->prepare($query);
         // execute query
         if($stmt->execute()){

           window.alert("success");
            return true;   
            }
            else{
              window.alert("unsuccess");
              return false;
            }
    }
*/
    // update nurse 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name='".$this->name."', email='".$this->email."', password='".$this->password."', phone='".$this->phone."'
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

    // delete nurse
    function delete(){
        
        // query to insert record
        $query = "DELETE FROM
                    " . $this->table_name . "
                WHERE
                    id= '".$this->id."'";
        
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