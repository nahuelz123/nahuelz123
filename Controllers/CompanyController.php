<?php

namespace Controllers;

use DAO\ApplicationsDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobOfertDAO;
use Models\Company as Company;

class CompanyController
{
    private $companyDAO;


    public function __construct()
    {
        $this->companyDAO = new CompanyDAO();
        $this->jobOfertDAO= new JobOfertDAO();
        $this->applicationDAO= new ApplicationsDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "add-fromCompany.php");
    }
    public function ShowSearchView()
    {
        require_once(VIEWS_PATH . "search.php");
    }

    public function ShowModifyView($id_company,$password)
    {

        require_once(VIEWS_PATH . "modifyDataCompany.php");
    }

    public function ShowListView()
    {
        $companytList = $this->companyDAO->GetAll();

        require_once(VIEWS_PATH . "listCompany.php");
    }
    public function ShowDeleteView()
    {
        require_once(VIEWS_PATH . "deleteCompany.php");
    }
    public function ShowSeeView($value)
    {
        require_once(VIEWS_PATH . "companyData.php");
    }


    public function CompanyData()
    {
        require_once(VIEWS_PATH . "companyData.php");
    }
    public function NewAdd($CompanyName, $BusinessName, $CompanyAdress, $cuil, $telephone, $email, $web,$password)
    {
        $company = new Company();
        $company->setCompanyName($CompanyName);
        $company->setBusinessName($BusinessName);
        $company->setCompanyAdress($CompanyAdress);
        $company->setCuil($cuil);
        $company->setTelephone($telephone);
        $company->setEmail($email);
        $company->setWeb($web);
        $company->setPassword($password);
        return $company;
    }

   
    public function companyNew($CompanyName, $BusinessName, $CompanyAdress, $cuil, $telephone, $email, $web,$password)
    {
        $companytList = $this->companyDAO->GetAll();

        $i = 0;
         
        foreach($companytList as $company)
        {
            if($company->getCompanyName()==$CompanyName)
            {  $i=1;
                
                echo "<script> if(confirm('la compania con ese nombre ya existe !'));";
                echo "window.location = '../index.php'; </script>";
              
            }
            if($company->getBusinessName()==$BusinessName)
            {
                $i=1;
                echo "<script> if(confirm('el  business name ya existe  !'));";
                echo "window.location = '../index.php'; </script>";
               
            }
            if($company->getCuil()==$cuil)
            {  $i=1;
                echo "<script> if(confirm('el cuil ya existe  !'));";
                echo "window.location = '../index.php'; </script>";
            }
            if($company->getTelephone()==$telephone)
            {  $i=1;
                echo "<script> if(confirm('el telephone ya existe  !'));";
                echo "window.location = '../index.php'; </script>";
            }
            if($company->getEmail()==$email)
            {  $i=1;
                echo "<script> if(confirm('el email ya existe !'));";
                echo "window.location = '../index.php'; </script>";
            }
            if($company->getWeb()==$web)
            {  $i=1;
                echo "<script> if(confirm('el sitio web ya existe en el sistema  !'));";
                echo "window.location = '../index.php'; </script>";
            }
        }

       if($i==0)
       {
           
        $company = $this->NewAdd($CompanyName, $BusinessName, $CompanyAdress, $cuil, $telephone, $email, $web,$password);
       
        $this->companyDAO->Add($company);
        $this->ShowListView(); 
       }
    }



    public function CompanyMody($CompanyName, $BusinessName, $CompanyAdress, $id_company, $cuil, $telephone, $email, $web, $password)
    {

        $this->companyDAO->Modify($CompanyName, $BusinessName, $CompanyAdress, $id_company, $telephone, $email, $web, $cuil,$password);
        

    }

    public function SearchCompany($CompanyName)
    {
        $id_company = 0;
        $companytList = $this->companyDAO->GetAll();
 $password=0;
        foreach ($companytList as $company) {
            if ($company->getCompanyName() == $CompanyName) {
                $id_company = $company->getId_company();
                $password= $company->getPassword();
            }
        }
        $this->ShowModifyView($id_company,$password);
    }

    public function deleteSearchCompany($CompanyName)
    {
        $id = 0;
       
        $companytList = $this->companyDAO->GetAll();
        $jobOfertList=$this->jobOfertDAO->GetAll();
       $applicationList= $this->applicationDAO->GetAll();
foreach($companytList as $company)
{
    if($company->getCompanyName()  == $CompanyName)
    {
        $id = 1;
      foreach ($jobOfertList as $jobOfert)
      {
          if($company->getId_company()== $jobOfert->getId_company())
          {
              foreach($applicationList as $application)
              {
                  if($application->getId_JobOfert()==$jobOfert->getId_JobOfert())
                  {
                      $id_JobOfert=$jobOfert->getId_JobOfert();
                    $this->applicationDAO->deleteFromComp($id_JobOfert);
                    
                  }
              }
              $this->jobOfertDAO->delete($jobOfert->getId_JobOfert());
            
          }
      }
      $this->companyDAO->delete($CompanyName);
    }
}
if($id==0) {
    ?>
    <script type="text/javascript">alert("compañia no encontrada!"); </script>
    <?php
    $this->ShowDeleteView();
}



     /*
        while ($id < count($companytList) && ($companytList[$id]->getCompanyName()  != $CompanyName)) {
            $id++;
        }

        if ($id < count($companytList)) {

            $this->companyDAO->delete($CompanyName);
        } else {
            $this->ShowDeleteView();
        }*/
    }



    public function SeeCompany($name)
    {
        $companytList = $this->companyDAO->GetAll();
        foreach ($companytList as $key) {
            if ($key->getCompanyName() == $name) {
                $this->ShowSeeView($key);
            }
        }
    }




    public function Register()
    {
        require_once(VIEWS_PATH . "add-fromCompany.php");
    }



public function showProfileCompany()
{
    $companytList = $this->companyDAO->GetAll();
    require_once(VIEWS_PATH . "companyProfile.php");
}





    public function Nav()
    {
        require_once(VIEWS_PATH . "nav.php");
    }
    public function NavAdmin()
    {
        require_once(VIEWS_PATH . "navAdmin.php");
    }


}
