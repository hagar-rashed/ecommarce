<?php
include_once "../operations.php"; //include interface 


class address implements operations{
    private $id;
    private $street;
    private $building;
    private $floor;
    private $status;
    private $details;
    private $flat;
    private $regions_id;
    private $users_id;
    private $created_at;
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }
    @return self;
    public function setId($id)
    {
       $this->id = $id;
       return $this;
    }
    public function insertData(){

    };
    public function updateData(){

    };   
    public function deleteData(){

    };
    public function selectAllData(){
        
    };
}