<?php

namespace Models;

use Models\Usuario as Usuario;

class Student extends Usuario
{


    private $fileNumber;
    private  $phoneNumber;
    private $gender;
   private $studentId;
    private $careerId;
   private $password;
    
    /**
     * Get the value of fileNumber
     */ 
    public function getFileNumber()
    {
        return $this->fileNumber;
    }

    /**
     * Set the value of fileNumber
     *
     * @return  self
     */ 
    public function setFileNumber($fileNumber)
    {
        $this->fileNumber = $fileNumber;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */ 
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */ 
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }


    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

   /**
    * Get the value of studentId
    */ 
   public function getStudentId()
   {
      return $this->studentId;
   }

   /**
    * Set the value of studentId
    *
    * @return  self
    */ 
   public function setStudentId($studentId)
   {
      $this->studentId = $studentId;

      return $this;
   }

    /**
     * Get the value of careerId
     */ 
    public function getCareerId()
    {
        return $this->careerId;
    }

    /**
     * Set the value of careerId
     *
     * @return  self
     */ 
    public function setCareerId($careerId)
    {
        $this->careerId = $careerId;

        return $this;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
}
