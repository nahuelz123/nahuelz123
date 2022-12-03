<?php

namespace Models;

class JobOfert
{
 private $id_JobOfert;
  private $id_company;
  private $jobPositionId;
  private $cargaHoraria;
  private $activo;
  private $titulo;
  private $descripcion;
  private $puesto;
 private $imagen;



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
   * Get the value of cargaHoraria
   */ 
  public function getCargaHoraria()
  {
    return $this->cargaHoraria;
  }

  /**
   * Set the value of cargaHoraria
   *
   * @return  self
   */ 
  public function setCargaHoraria($cargaHoraria)
  {
    $this->cargaHoraria = $cargaHoraria;

    return $this;
  }

  /**
   * Get the value of activo
   */ 
  public function getActivo()
  {
    return $this->activo;
  }

  /**
   * Set the value of activo
   *
   * @return  self
   */ 
  public function setActivo($activo)
  {
    $this->activo = $activo;

    return $this;
  }

  /**
   * Get the value of titulo
   */ 
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Set the value of titulo
   *
   * @return  self
   */ 
  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;

    return $this;
  }

  /**
   * Get the value of descripcion
   */ 
  public function getDescripcion()
  {
    return $this->descripcion;
  }

  /**
   * Set the value of descripcion
   *
   * @return  self
   */ 
  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;

    return $this;
  }

  /**
   * Get the value of puesto
   */ 
  public function getPuesto()
  {
    return $this->puesto;
  }

  /**
   * Set the value of puesto
   *
   * @return  self
   */ 
  public function setPuesto($puesto)
  {
    $this->puesto = $puesto;

    return $this;
  }

/**
 * Get the value of imagen
 */ 
public function getImagen()
{
return $this->imagen;
}

/**
 * Set the value of imagen
 *
 * @return  self
 */ 
public function setImagen($imagen)
{
$this->imagen = $imagen;

return $this;
}
}
?>