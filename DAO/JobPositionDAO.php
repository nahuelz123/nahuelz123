<?php

namespace DAO;

use DAO\IViews as IViews;
use Models\Job as Job;
use \Exception as Exception;

class JobPositionDAO implements IViews
{
    private $jobList;

    private $connection;
    private $tableName = "job";


    private function retriveData()
    {
        $opt = array(
            "http" => array(
                "method" => "GET",
                "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
            )
        );

        $ctx = stream_context_create($opt);

        $json = file_get_contents("https://utn-students-api.herokuapp.com/api/JobPosition", false, $ctx);

        $valuesArray = json_decode($json, true);


        $this->jobList = $valuesArray;
      
    }



    public function createJob()
    {
        $this->retriveData();
        $jobs =  $this->jobList;
        $this->Add($jobs);
    }


    public function Add($jobs)
    {

        try {
            foreach ($jobs as $job) {

                $query = "INSERT INTO " . $this->tableName . " (jobPositionId, careerId,description ) VALUES (:jobPositionId,:careerId,:description);";

                $valuesArray["jobPositionId"] = $job["jobPositionId"];
                $valuesArray["careerId"] = $job["careerId"];
                $valuesArray["description"] = $job["description"];


                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $valuesArray);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $jobList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $job = new Job();


                $job->setJobPositionId($valuesArray["jobPositionId"]);
                $job->setCareerId($valuesArray["careerId"]);
                $job->setDescription($valuesArray["description"]);

                array_push($jobList, $job);
            }

            return $jobList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
