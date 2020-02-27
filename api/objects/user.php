<?php
session_start();
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $password;
    public $user;
    public $created_time;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read all users
    function read(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `user`, `created_time`
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

    // get single user data
    function read_single(){
    
        // select all query
        $query = "SELECT
                    `id`, `name`, `email`, `password`, `user`, `created_time`
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

    // create user
    function create(){
    
        if($this->isAlreadyExist()){
            return false;
        }
        
        // query to insert record
        $query = "INSERT INTO  ". $this->table_name ." 
                        (`name`, `email`, `password`, `user`, `created_time`)
                  VALUES
                        ('".$this->name."', '".$this->email."', '".$this->password."', '".$this->user."', '".$this->created_time."')";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }
/*
    // update user 
    function update(){
    
        // query to insert record
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    name='".$this->name."', email='".$this->email."', password='".$this->password."', user='".$this->user."', gender='".$this->gender."', specialist='".$this->specialist."'
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
*/
    // delete user
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

    //function for checking whether the user credentials are right or not

    function check(){
        $query= "SELECT `id`,`user` FROM ".$this->table_name." WHERE email= '".$this->email."' and password= '".base64_encode($this->password)."'";
        $stmt=$this->conn->prepare($query);
        if($stmt->execute())
        {
            $stmt->store_result();
            $rowCount=$stmt->num_rows;
            if($rowCount==1){
                $user=$stmt->fetch_assoc();
                $_SESSION["id"]=$user["id"];
                return $user["user"];
            }
            else
            {
                return null;
            }
        }
        return null;
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