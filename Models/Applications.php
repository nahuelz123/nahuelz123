<?php

namespace Models;

class Applications {
  
   
    private $studentId;
    private $id_JobOfert; 


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
     * Get the value of id_JobOfert
     */ 
    public function getId_JobOfert()
    {
        return $this->id_JobOfert;
    }

    /**
     * Set the value of id_JobOfert
     *
     * @return  self
     */ 
    public function setId_JobOfert($id_JobOfert)
    {
        $this->id_JobOfert = $id_JobOfert;

        return $this;
    }
}
?>