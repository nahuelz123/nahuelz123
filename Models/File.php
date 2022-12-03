<?php

namespace Models;

class File
{
    private $idFiles;
    private $nameFiles;
    private $ruta;
    private $tipo;
    private $size;



    public function getIdFiles()
    {
        return $this->idFiles;
    }


    public function setIdFiles($idFiles)
    {
        $this->idFiles = $idFiles;

        return $this;
    }


    public function getNameFiles()
    {
        return $this->nameFiles;
    }


    public function setNameFiles($nameFiles)
    {
        $this->nameFiles = $nameFiles;

        return $this;
    }


    public function getRuta()
    {
        return $this->ruta;
    }


    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }


    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }


    public function getSize()
    {
        return $this->size;
    }


    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }
}
