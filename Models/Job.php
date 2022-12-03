<?php
namespace Models;

class Job {
  private  $jobPositionId;
   private $careerId;
    private $description;
    private $id_company;

  /**
   * Get the value of jobPositionId
   */ 
  public function getJobPositionId()
  {
    return $this->jobPositionId;
  }

  /**
   * Set the value of jobPositionId
   *
   * @return  self
   */ 
  public function setJobPositionId($jobPositionId)
  {
    $this->jobPositionId = $jobPositionId;

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

  

    /**
     * Get the value of id_company
     */ 
    public function getId_company()
    {
        return $this->id_company;
    }

    /**
     * Set the value of id_company
     *
     * @return  self
     */ 
    public function setId_company($id_company)
    {
        $this->id_company = $id_company;

        return $this;
    }



    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}


?>