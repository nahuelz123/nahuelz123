<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use DAO\AdminDAO as AdminDAO;
use DAO\CompanyDAO;

class SessionController
{


  public function __construct()
  {
    $this->studentDAO = new StudentDAO();
    $this->adminDAO = new AdminDAO();
    $this->companyDAO= new CompanyDAO();
  }

  public function Login($email, $password)
  {

   
    $studentList = $this->studentDAO->GetAll();
    $adminList = $this->adminDAO->GetAll();
    $companyList = $this->companyDAO->GetAll();

    foreach ($studentList as $student) {
          
      if ($student->getEmail() == $email) {
      
        if ($password == $student->getPassword() && $student->getActivo() == true) {
       
          $_SESSION['email'] = $email;
          $_SESSION["user"]="student";
    
          echo "<script> ";
         echo "window.location = '../index.php'; </script>";
        // header("location: ../Student/Profile");

        } else {
          session_destroy();
         echo "<script> if(confirm('password incorrecta !'));";
          echo "window.location = '../index.php'; </script>";
        
        }
      }
    }

    foreach ($companyList as $company) {

      if ($company->getEmail() == $email) {
        if ($password == $company->getPassword()) {
         
          $_SESSION['email'] = $email;
          $_SESSION["user"]="company";
        
          echo "<script> ";
          echo "window.location = '../index.php'; </script>";
        } else {
          echo "<script> if(confirm('password incorrecta !'));";
          echo "window.location = '../index.php'; </script>";
        }
      }
    }

    foreach ($adminList as $admin) {

      if ($admin->getEmail() == $email) {
      
        if ($password == $admin->getPassword()) {
        
          $_SESSION['email'] = $email;
          $_SESSION["user"]="admin";
        
          echo "<script> ";
          echo "window.location = '../index.php'; </script>";
        } else {
          echo "<script> if(confirm('password incorrecta !'));";
          echo "window.location = '../index.php'; </script>";
        }
      }
 
    }
 
    if (is_null($_SESSION['email'])) {
      $this->comprobarApi($email);
    }


  }


  
  public function comprobarApi($email)
  {

    $students = $this->studentDAO->checkApi();


    foreach ($students as $student) {

      if ($student["email"] == $email) {
        if ($student["active"] == true) {


          $_SESSION['email'] = $email;
        }
      }
    }

    if (is_null($_SESSION['email'])) {
      echo "<script> if(confirm('su datos no son validos o no se encuentra registrado en el sistema  , comuniquese con la facultad!'));";
      echo "window.location = '../index.php'; </script>";
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();
   header("location: ../index.php");
  }

  public function Nav()
  {
    require_once(VIEWS_PATH . "nav.php");
  }
  public function NavAdmin()
  {
    require_once(VIEWS_PATH . "navAdmin.php");
  }



  public function addFromCompany()
  {
    require_once(VIEWS_PATH . "add-fromCompany.php");
  }

public  function comprobacion()
{
  $studentList = $this->studentDAO->GetAll();
  $adminList = $this->adminDAO->GetAll();

  $flag=-1;
  foreach($adminList as $admin)
  {
    if($_SESSION['email']==$admin->getEmail())
    {
     $flag=1;
      //$this->NavAdmin();
      
    }
  }
  if($flag==-1){
  foreach($studentList as $student)
  {
    if($_SESSION['email']==$student->getEmail())
    {
     $flag=2;
      //$this->Nav();
      
    }
  }
  }
  return $flag;
}


}
