<?php
class uservalidation{
    private $password;
    private $confirm;
    private $email;




    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of confirm
     */
    public function getConfirm()
    {
        return $this->confirm;
    }

    /**
     * Set the value of confirm
     *
     * @return  self
     */
    public function setConfirm($confirm)
    {
        $this->confirm = $confirm;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    //password validation
    public function passwordValidation()
    {
        $errors=[];
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $patternErrMsg ="<div class='alert alert-danger'>Password Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</div> ";
        if(!$this->password){
            $errors['password']= "<div class='alert alert-danger'> password is required </div>";
        }
        if(!$this->confirm){
            $errors['confirm']= "<div class='alert alert-danger'> confirm password is required </div>";
        }
        if(empty($errors)){
            if(!preg_match($pattern , $this->password)){  //method to equal password with pattern
            $errors['pattern'] = $patternErrMsg;
          }
        }
        if($this->password != $this->confirm){
            $errors['confirm'] = "<div class='alert alert-danger'> confirm doesn't match </div>"; 
        }
        return $errors;
    }

    //email validation
    public function emailValidation()
    {
       $errors =[];
       $pattern="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
       if(!$this->email){
        $errors['email']= "<div class='alert alert-danger'> email is required </div>";
       }else{
        if(!preg_match($pattern , $this->email)) { //method to equal password with pattern
        $errors['pattern'] = "<div class='alert alert-danger'> wrong email formate </div>";
        }
       }
       return $errors; 
    }
    

}
?>