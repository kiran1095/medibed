<?php

class Session
{

 public function __construct($sessionId)
    {
        if (!is_null($sessionId)) {
            session_id($sessionId);
        }
        
        session_start();
    }
    
    
    public function set($id, $val)
    {
        $_SESSION[$id] = $val;
    }
    
    
    public function get($id)
    {
        return (isset($_SESSION[$id])) ? $_SESSION[$id] : false;
    }
}