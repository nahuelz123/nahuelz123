<?php

namespace DAO;

use \Exception as Exception;
use DAO\IViews as IViews;
use Models\File as File;
use DAO\Connection as Connection;

class FileDAO implements IViews
{
    private $fileList = array();

    private $connection;
    private $tableName = "files";



    public function Add($archi)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (nameFiles, ruta, tipo,size ) VALUES (:nameFiles, :ruta, :tipo, :size);";

            $valuesArray["nameFiles"] = $archi->getNameFiles();
            $valuesArray["ruta"] = $archi->getRuta();
            $valuesArray["tipo"] = $archi->getTipo();
            $valuesArray["size"] = $archi->getSize();


            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $valuesArray);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $fileList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $valuesArray) {
                $archi = new File();
                $archi->setIdFiles($valuesArray["idFiles "]);
                $archi->setNameFiles($valuesArray["nameFiles"]);
                $archi->setRuta($valuesArray["ruta"]);
                $archi->setTipo($valuesArray["tipo"]);
                $archi->setSize($valuesArray["size"]);

                array_push($fileList, $archi);
            }

            return $fileList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
