<?php

namespace DAO;
use \Exception as Exception;
use DAO\IViews as IViews;
use Models\Company as Company;
use DAO\Connection as Connection;
class CompanyDAO implements IViews
{
    private $companytList = array();
  
    private $connection;
    private $tableName = "company";


public function Add($company)
{    
    try
    {
        $query = "INSERT INTO ".$this->tableName." (CompanyName, BusinessName, CompanyAdress,cuil,telephone,email,web,password ) VALUES (:CompanyName, :BusinessName, :CompanyAdress,:cuil,:telephone,:email,:web,:password);";
    
        $valuesArray["CompanyName"] = $company->getCompanyName();
        $valuesArray["BusinessName"] = $company->getBusinessName();
        $valuesArray["CompanyAdress"] = $company->getCompanyAdress();
        $valuesArray["cuil"]=$company->getCuil();
        $valuesArray["telephone"] = $company->getTelephone();
        $valuesArray["email"] = $company->getEmail();
        $valuesArray["web"] = $company->getWeb();
        $valuesArray["password"]= $company->getPassword();
     
    $this->connection = Connection::GetInstance();
   $this->connection->ExecuteNonQuery($query, $valuesArray);
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
}
    
  public function GetAll()
{
    try
    {
        $companytList = array();

        $query = "SELECT * FROM ".$this->tableName;

        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        
        foreach ($resultSet as $valuesArray)
        {                
            $company = new Company();
            $company->setId_company($valuesArray["id_company"]);
            $company->setCompanyName($valuesArray["CompanyName"]);
            $company->setBusinessName($valuesArray["BusinessName"]);
            $company->setCompanyAdress($valuesArray["CompanyAdress"]);
            $company->setCuil($valuesArray["cuil"]);
            $company->setTelephone($valuesArray["telephone"]);
            $company->setEmail($valuesArray["email"]);
            $company->setWeb($valuesArray["web"]);
            $company->setPassword($valuesArray['password']);

            array_push($companytList, $company);
        }

        return $companytList;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
}


    public function Modify( $CompanyName, $BusinessName, $CompanyAdress,$id_company, $telephone, $email, $web,$cuil,$password)
    {  
        $this->connection = Connection::GetInstance();
        
        $consulta= "UPDATE company
        SET CompanyName = '$CompanyName', BusinessName = '$BusinessName', CompanyAdress = '$CompanyAdress',cuil = '$cuil', telephone = $telephone, email = '$email', web = '$web', password ='$password'
        WHERE id_company = '$id_company'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    
    }

    public function delete($CompanyName)
    {
        //$this->connection = Connection::GetInstance();
    
        $consulta= "DELETE From company WHERE CompanyName = '$CompanyName'";
      $connection = $this->connection;
        $connection->Execute($consulta);
    }


}
?>