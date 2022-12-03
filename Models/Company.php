<?php

namespace Models;

class Company
{
    private $id_company;
    private  $CompanyName;
    private $BusinessName;
    private $CompanyAdress;
    private $cuil;
    private  $telephone;
    private  $email;
    private $web;
    private $password;
function __construct()
{
    
}

    /**
     * Get the value of name
     */ 
    public function getCompanyName()
    {
        return $this->CompanyName;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setCompanyName($CompanyName)
    {
        $this->CompanyName = $CompanyName;

        return $this;
    }

    /**
     * Get the value of BusinessName
     */ 
    public function getBusinessName()
    {
        return $this->BusinessName;
    }

    /**
     * Set the value of BusinessName
     *
     * @return  self
     */ 
    public function setBusinessName($BusinessName)
    {
        $this->BusinessName = $BusinessName;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

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

    /**
     * Get the value of web
     */ 
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set the value of web
     *
     * @return  self
     */ 
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get the value of cuil
     */ 
    public function getCuil()
    {
        return $this->cuil;
    }

    /**
     * Set the value of cuil
     *
     * @return  self
     */ 
    public function setCuil($cuil)
    {
        $this->cuil = $cuil;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getCompanyAdress()
    {
        return $this->CompanyAdress;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setCompanyAdress($CompanyAdress)
    {
        $this->CompanyAdress = $CompanyAdress;

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
}
