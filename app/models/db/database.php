<?php

class dataBase{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $name = 'nti_ecommarce';
    private $con;

    function __construct(){
       $this->con = new mysqli($this-> host, $this -> username , $this -> password , $this -> name );
        //refer to mysql connection//
       
       if($this->con->connect_error){
         die("connection faild :$this->con-> connect__error"); //appear msg and not continue;
    //      else{
    //        echo "connection done";
    //    }
     }
    }
    //DML (insert-update-delete) , return  true/false
    public function runDML($query){
    $result = $this-> con ->query($query);
    
    if($result){
        return TRUE;
    }else{
       return FALSE;
    }
    }

    //DQL(selects) return empty arrey OR data in arrey
    public function runDQL($query){
        $result = $this-> con ->query($query);
    
        if($result->num_rows > 0){
            return $result;
        }else{
           return [];
        }
    } 
}
