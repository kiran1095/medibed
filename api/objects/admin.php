<?php
class Admin{
 
    // database connection and table name
    private $conn;
    private $table_name = "admin";
 
    // object properties
    public $id;
    public $email;
    public $password;
    //public $created_time;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all users
    function validate(){
            $query = "SELECT `id` FROM ". $this->table_name ." where email= '".$this->email."' and password='".($this->password)."' ";    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
       if( $stmt->execute()){
           //$result=$stmt->execute();
           $stmt->store_result();
           $rowCount=$stmt->num_rows;
           if($rowCount==1){
               return true;
            }
       }
    
        return false;
    }
}