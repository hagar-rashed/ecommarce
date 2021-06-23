<?php

include_once "../operations.php";
include_once "../database.php";
class regions extends database implements opertions{
    private $id;
    private $name;
    private $status;
    private $long;
    private $lat;
    private $rad;
    private $city_id;
    private $created_at;
    private $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of long
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Set the value of long
     *
     * @return  self
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get the value of lat
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @return  self
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get the value of rad
     */
    public function getRad()
    {
        return $this->rad;
    }

    /**
     * Set the value of rad
     *
     * @return  self
     */
    public function setRad($rad)
    {
        $this->rad = $rad;

        return $this;
    }

    /**
     * Get the value of city_id
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * Set the value of city_id
     *
     * @return  self
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


    ///////////////////////
    public function insertData(){
        $query = "INSERT INTO `users` (`users`.`name` ,`users`.`phone` , `users`.`email` , `users`.`password` , `users` )
         VALUES('$this->name' , '$this->phone' , '$this->email ', '$this->password')" //--->value exists in propertise;
      };
      public function updateData(){
         
      };   
      public function deleteData(){
  
      };
      public function selectAllData(){
          
      };

}


?>