<?php

namespace DAO;

use DAO\IViews as IViews;
use Models\Applications as Applications;
use Models\Company as Company;
use \Exception as Exception;
use Models\JobOfert as JobOfert;

class ApplicationsDAO implements IViews
{
    private $Applicationslist ;

    private $connection;
    private $tableName = "applications";

    /*
    public function createJob()
    {
        $this->retriveData();
        $jobs =  $this->jobList;
        $this->Add($jobs);
    }*/


    public function Add($application)
    {
       
       
        try {


            $query = "INSERT INTO " . $this->tableName . " (studentId, id_JobOfert) VALUES (:studentId, :id_JobOfert);";
    
            $valuesArray["studentId"] = $application->getStudentId();  
            $valuesArray["id_JobOfert"] = $application->getId_JobOfert();
      
            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $jobOfertList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $application = new Applications();

                $application->setStudentId($valuesArray["studentId"]);
                $application->setId_JobOfert($valuesArray["id_JobOfert"]);
                
               
             
                array_push($jobOfertList, $application);
            }

            return $jobOfertList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
   
 
    public function delete($studentId,$id_JobOfert)
    {
        $this->connection = Connection::GetInstance();
        $consulta= "DELETE From applications WHERE studentId = '$studentId' and id_JobOfert='$id_JobOfert' ";
      $connection = $this->connection;
        $connection->Execute($consulta);
    }

    public function deleteFromComp($id_JobOfert)
    {
        $this->connection = Connection::GetInstance();
        $consulta= "DELETE From applications WHERE  id_JobOfert='$id_JobOfert' ";
      $connection = $this->connection;
        $connection->Execute($consulta);
    }

/*
    public function listarApplication()
    {
        $query="SELECT  
        job.cargaHoraria,
         job.activo, 
       job.titulo,
         job.descripcion,
         job.puesto  
         FROM applications AS a  INNER JOIN student AS s ON a.studentId= s.studentId 
       INNER JOIN job_ofert AS job ON a.id_JobOfert= job.id_JobOfert
       GROUP BY  job.cargaHoraria,
         job.activo, 
         job.titulo,
         job.descripcion,
         job.puesto 
        ";
        
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        var_dump($resultSet);


    } 
*/
}
