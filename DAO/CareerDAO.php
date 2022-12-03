<?php

namespace DAO;

use DAO\IViews as IViews;
use \Exception as Exception;
use Models\Career;

class CareerDAO implements IViews
{
    private $careerList = array();

    private $connection;
    private $tableName = "career";


    public function retriveData()
    {
        $opt = array(
            "http" => array(
                "method" => "GET",
                "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
            )
        );

        $ctx = stream_context_create($opt);

        $json = file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);

        $valuesArray = json_decode($json, true);


        $this->careerList= $valuesArray;
    }



    public function createCarrer()
    {
        $this->retriveData();
        $career =  $this->careerList;
        $this->Add($career);
    }


    public function Add($career)
    {
       

        try {
            foreach ($career as $key) {
               
                    $query = "INSERT INTO " . $this->tableName . " (careerId, description,activo ) VALUES (:careerId,:description,:activo);";
                    $valuesArray["careerId"] = $key["careerId"];
                    $valuesArray["description"] = $key["description"];
                    $valuesArray["activo"] = $key["active"];

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
            $careerList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $career = new Career();

                $career->setCareerId($valuesArray["careerId"]);
                $career->setDescription($valuesArray["description"]);
                $career->setActivo($valuesArray["activo"]);
                

                array_push($jobList, $career);
            }

            return $careerList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
