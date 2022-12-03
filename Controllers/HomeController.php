<?php
    namespace Controllers;

    use DAO\AdminDAO as AdminDAO;
use DAO\StudentDAO as StudentDAO;
use DAO\CompanyDAO as CompanyDAO;
class HomeController
    {
        public function __construct()
  {
    $this->studentDAO = new StudentDAO();
    $this->adminDAO = new AdminDAO();
    $this->companyDAO = new CompanyDAO();
  }
        public function Index()
        {
            $adminList=$this->adminDAO->GetAll();
            $studentList=$this->studentDAO->GetAll();
            $companytList=$this->companyDAO->GetAll();
           
            foreach($adminList as $admin)
            {
                if($_SESSION["email"]==$admin->getEmail())
                {
                    $companytList;
                 require_once(VIEWS_PATH."listCompany.php");
                }
            }
            foreach($studentList as $student)
            {
                if($_SESSION["email"]==$student->getEmail())
                {
                    $studentList;
                 require_once(VIEWS_PATH."student-profile.php");
                }
            }
            foreach($companytList as $company)
            {
                if($_SESSION["email"]==$company->getEmail())
                {
                    $companytList;
                 require_once(VIEWS_PATH."companyProfile.php");
                }
            }

        if(is_null($_SESSION["email"])) {
            require_once(VIEWS_PATH."login.php");
           }
        }        
    }
?>