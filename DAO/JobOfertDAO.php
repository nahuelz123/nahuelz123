<?php
/*
namespace DAO;

use DAO\IViews as IViews;
use DAO\Connection as Connection;
use \Exception as Exception;
use Models\JobOfert as JobOfert;

class JobOfertDAO implements IViews
{
    private $jobOfertList = array();

    private $connection;
    private $tableName = "job_ofert";


    public function Add($jobOfert)
    {

        try {


            $query = "INSERT INTO " . $this->tableName . " (id_company, jobPositionId,cargaHoraria,activo,titulo,descripcion,puesto) VALUES (:id_company, :jobPositionId,:cargaHoraria,:activo,:titulo,:descripcion,:puesto);";

            $valuesArray["id_company"] = $jobOfert->getId_company();
            $valuesArray["jobPositionId"] = $jobOfert->getJobPositionId();
            $valuesArray["cargaHoraria"] = $jobOfert->getCargaHoraria();
            $valuesArray["activo"] = $jobOfert->getActivo();
            $valuesArray["titulo"] = $jobOfert->getTitulo();
            $valuesArray["descripcion"] = $jobOfert->getDescripcion();
            $valuesArray["puesto"] = $jobOfert->getPuesto();
            
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
                $job = new JobOfert();


                $job->setId_JobOfert($valuesArray["id_JobOfert"]);
                $job->setId_company($valuesArray["id_company"]);
                $job->setJobPositionId($valuesArray["jobPositionId"]);
                $job->setCargaHoraria($valuesArray["cargaHoraria"]);
                $job->setActivo($valuesArray["activo"]);
                $job->setTitulo($valuesArray["titulo"]);
                $job->setDescripcion($valuesArray["descripcion"]);
                $job->setPuesto($valuesArray["puesto"]);
                array_push($jobOfertList, $job);
            }

            return $jobOfertList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $puesto)
    {


        $this->connection = Connection::GetInstance();

        $consulta = "UPDATE job_ofert
        SET id_company = '$id_company', jobPositionId = '$jobPositionId', cargaHoraria  = '$cargaHoraria',activo = '$activo', titulo = '$titulo', descripcion = '$descripcion', puesto = '$puesto'
        WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }

    public function delete($id_JobOfert)
    {
        $this->connection = Connection::GetInstance();
        $aux = "DELETE From applications WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($aux);
        $consulta = "DELETE From job_ofert WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
*/


namespace DAO;

use DAO\IViews as IViews;
use DAO\Connection as Connection;
use \Exception as Exception;
use Models\JobOfert as JobOfert;

class JobOfertDAO implements IViews
{
    private $jobOfertList = array();

    private $connection;
    private $tableName = "job_ofert";


    public function Add($jobOfert)
    {

        try {


            $query = "INSERT INTO " . $this->tableName . " (id_company, jobPositionId,cargaHoraria,activo,titulo,descripcion,puesto,imagen) VALUES (:id_company, :jobPositionId,:cargaHoraria,:activo,:titulo,:descripcion,:puesto, :imagen);";

            $valuesArray["id_company"] = $jobOfert->getId_company();
            $valuesArray["jobPositionId"] = $jobOfert->getJobPositionId();
            $valuesArray["cargaHoraria"] = $jobOfert->getCargaHoraria();
            $valuesArray["activo"] = $jobOfert->getActivo();
            $valuesArray["titulo"] = $jobOfert->getTitulo();
            $valuesArray["descripcion"] = $jobOfert->getDescripcion();
            $valuesArray["puesto"] = $jobOfert->getPuesto();
            $valuesArray["imagen"] = $jobOfert->getImagen();
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
                $job = new JobOfert();


                $job->setId_JobOfert($valuesArray["id_JobOfert"]);
                $job->setId_company($valuesArray["id_company"]);
                $job->setJobPositionId($valuesArray["jobPositionId"]);
                $job->setCargaHoraria($valuesArray["cargaHoraria"]);
                $job->setActivo($valuesArray["activo"]);
                $job->setTitulo($valuesArray["titulo"]);
                $job->setDescripcion($valuesArray["descripcion"]);
                $job->setPuesto($valuesArray["puesto"]);
		$job->setImagen($valuesArray["imagen"]);
                array_push($jobOfertList, $job);
            }

            return $jobOfertList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Modify($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $puesto, $imagen)
    {


        $this->connection = Connection::GetInstance();

        $consulta = "UPDATE job_ofert
        SET id_company = '$id_company', jobPositionId = '$jobPositionId', cargaHoraria  = '$cargaHoraria',activo = '$activo', titulo = '$titulo', descripcion = '$descripcion', puesto = '$puesto', imagen = '$imagen'
        WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }

    public function delete($id_JobOfert)
    {
        $this->connection = Connection::GetInstance();
        $aux = "DELETE From applications WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($aux);
        $consulta = "DELETE From job_ofert WHERE id_JobOfert = '$id_JobOfert'";
        $connection = $this->connection;
        $connection->Execute($consulta);
    }
}
