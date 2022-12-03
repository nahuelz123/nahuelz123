<?php

namespace Controllers;

use DAO\AdminDAO;
use DAO\ApplicationsDAO;
use DAO\CompanyDAO as CompanyDAO;
use DAO\JobPositionDAO as JobPositionDAO;
use DAO\JobOfertDAO as JobOfertDAO;
use DAO\StudentDAO;
use Models\JobOfert as JobOfert;


class OfertController
{
    private $jobOfertDAO;

    public function __construct()
    {
        $this->jobOfertDAO = new JobOfertDAO();
        $this->jobPositionDAO = new JobPositionDAO();
        $this->companyDAO = new CompanyDAO();
        $this->studetDAO = new StudentDAO();
        $this->adminDAO = new AdminDAO();
        $this->applicationDAO = new ApplicationsDAO();
    }
    /*
    public function addOfert($id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion)
    {
        $puestos = $this->jobPositionDAO->GetAll();
        $puesto = 0;

        foreach ($puestos as $value) {

            if ($value->getjobPositionId() == $jobPositionId) {
                $puesto = $value->getDescription();
            }
        }
        $jobOfert = new JobOfert();
        $jobOfert->setId_company($id_company);
        $jobOfert->setJobPositionId($jobPositionId);
        $jobOfert->setCargaHoraria($cargaHoraria);
        $jobOfert->setActivo($activo);
        $jobOfert->setTitulo($titulo);
        $jobOfert->setDescripcion($descripcion);
        $jobOfert->setPuesto($puesto);
        $this->jobOfertDAO->Add($jobOfert);
        ?>
        <script type="text/javascript">alert("job ofert creado!"); </script>
        <?php
        $this->ShowADDofertchView();

    }
*/
    public function addOfert($id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $imagen)
    {
        /*  $nombre = $_FILES['imagen']['name'];
      
    $guardado = $_FILES['imagen']['tmp_name'];

    if(move_uploaded_file($guardado, 'Data/image/'.$nombre)){
        echo "<script> if(confirm('Archivo agregado!'));";
        echo "window.location = '../index.php'; 
        </script>";
    }*/
        $puestos = $this->jobPositionDAO->GetAll();
        $puesto = 0;

        foreach ($puestos as $value) {

            if ($value->getjobPositionId() == $jobPositionId) {
                $puesto = $value->getDescription();
            }
        }
        $jobOfert = new JobOfert();
        $jobOfert->setId_company($id_company);
        $jobOfert->setJobPositionId($jobPositionId);
        $jobOfert->setCargaHoraria($cargaHoraria);
        $jobOfert->setActivo($activo);
        $jobOfert->setTitulo($titulo);
        $jobOfert->setDescripcion($descripcion);
        $jobOfert->setPuesto($puesto);

        $jobOfert->setImagen($imagen);

        $this->jobOfertDAO->Add($jobOfert);

?>
        <script type="text/javascript">
            alert("job ofert creado!");
        </script>
<?php
        $this->ShowADDofertchView();
    }

    public function ShowListJobOferView()
    {
        $adminList = $this->adminDAO->GetAll();
        $studentList = $this->studetDAO->GetAll();
       $jobOfertFiltro = array();
        $aux= array();
        $position= array();
        foreach ($adminList as $admin) {
            if ($_SESSION["email"] == $admin->getEmail()) {
                $jobOfertFiltro = $this->jobOfertDAO->GetAll();
                foreach($jobOfertFiltro as $filtro)
                 {
                 
                     array_push($aux,$filtro->getPuesto());
                 }
                 $position= array_unique($aux);
                
                require_once(VIEWS_PATH . "listJobOfert.php");
            }
        }
        $idCareer = 0;
        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $idCareer = $student->getCareerId();

                $this->filtroListJobOfert($idCareer);
            }
        }
    }
    /*
// ESTA FUNCIONA PERO REPITE LAS OFERTAS
    public function filtroListJobOfert($idCareer)
    {
        $jobOfertList = $this->jobOfertDAO->GetAll();
       
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $jobPositionArray = array();
        $jobOfertFiltro = array();
        foreach ($jobPositionList as $jobPosition) {
            if ($jobPosition->getCareerId() == $idCareer) {
                
                array_push($jobPositionArray, $jobPosition->getJobPositionId());
            }
        }

        foreach ($jobOfertList as $jobOfert) {
            foreach ($jobPositionArray as $job) {

                for ($i = 0; $i < count($jobPositionArray); $i++) {
                    if ($job[$i] == $jobOfert->getJobPositionId()) {
                        array_push($jobOfertFiltro, $jobOfert);
                    }
                }
            }
        }

        require_once(VIEWS_PATH . "listJobOfert.php");
    }
    */

    //funciona
    public function filtroListJobOfert($idCareer)
    {
        $jobOfertList = $this->jobOfertDAO->GetAll();
$aux = array();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $jobPositionArray = array();
        $jobOfertFiltro = array();
        foreach ($jobPositionList as $jobPosition) {
            if ($jobPosition->getCareerId() == $idCareer) {

                array_push($jobPositionArray, $jobPosition->getDescription());
               
            }
        }
        
        foreach ($jobOfertList as $jobOfert) {

            for ($i = 0; $i < count($jobPositionArray); $i++) {


                if ($jobPositionArray[$i] == $jobOfert->getPuesto()) {
                   
                    array_push($jobOfertFiltro, $jobOfert);
                    //array_push($aux,$jobOfert->getPuesto());
                    
                }
            }
        }
     
   $position= array();
   foreach ($jobOfertFiltro as $filtro)
   {
    array_push($aux,$filtro->getPuesto());
   }
 //  var_dump($aux);
   $position =array_unique($aux);
  // var_dump($position);

       require_once(VIEWS_PATH . "listJobOfert.php");
   //  $this->ShowListOfer($position,$jobOfertFiltro);
    }

    public function ShowListOfer($position,$jobOfertFiltro){
        require_once(VIEWS_PATH . "listJobOfert.php");
    }



    public function serachOfert($puesto)
    {
        
        $puesto = str_replace("-", " ", $puesto);

        
        $adminList = $this->adminDAO->GetAll();
        $studentList = $this->studetDAO->GetAll();
        foreach ($adminList as $admin) {
            if ($_SESSION["email"] == $admin->getEmail()) {
                $jobOfertFiltro = $this->jobOfertDAO->GetAll();

                $jobOfertList = $this->jobOfertDAO->GetAll();
               
                $key = array();
                foreach ($jobOfertList as $dato) {
                    if ($dato->getPuesto() == $puesto) {
                        
                        array_push($key, $dato);
                    }
                }

                $this->ShowSeeView($key);
            }
        }

        $idCareer = 0;
        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $idCareer = $student->getCareerId();
              
                $this->filtroBusqueda($idCareer, $puesto);
            }
        }
    }

    public function filtroBusqueda($idCareer, $puesto)
    {
        $jobOfertList = $this->jobOfertDAO->GetAll();

        $jobPositionList = $this->jobPositionDAO->GetAll();
        $jobPositionArray = array();
        $jobOfertFiltro = array();
        $key=array();
        foreach ($jobPositionList as $jobPosition) {
            if ($jobPosition->getCareerId() == $idCareer) {

                array_push($jobPositionArray, $jobPosition->getDescription());
            }
        }
        foreach ($jobOfertList as $jobOfert) {

            for ($i = 0; $i < count($jobPositionArray); $i++) {


                if ($jobPositionArray[$i] == $jobOfert->getPuesto()) {
                    array_push($jobOfertFiltro, $jobOfert);
                    
                    
                }
            }
        }

        foreach ($jobOfertFiltro as $ofert) {
            if ($ofert->getPuesto() == $puesto) {
                
                array_push($key, $ofert);
                
            }
        }
        if (isset($key)) {
            
            $this->ShowSeeView($key);
        } else {
        }
    }


    public function SeeOfert($id_JobOfert)
    {
        $key = array();
        $jobOfertList = $this->jobOfertDAO->GetAll();
        
        foreach ($jobOfertList as $dato) {
            if ($dato->getId_JobOfert() == $id_JobOfert) {
                array_push($key, $dato);

                $this->ShowSeeView($key);
            //    $this->ShowSeeView($key);
            }
        }
    }


    public function ShowSeeView($key)
    {
        require_once(VIEWS_PATH . "jobOfertData.php");
    }
    /*
    public function ShowSeeView($key, $i)
    {
        require_once(VIEWS_PATH . "jobOfertData.php");
    }
*/



    public function ShowADDofertchView()
    {
        $companytList = $this->companyDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "addOfertJob.php");
    }



    public function SearchOJobOfert($id_JobOfert)
    {

        $this->ShowModifyOferView($id_JobOfert);
    }
    public function ShowModifyOferView($id_JobOfert)
    {

        $companytList = $this->companyDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        require_once(VIEWS_PATH . "modifyJobOfert.php");
    }
    /*
    public function JobOfertMody($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion)
    {
        $puestos = $this->jobPositionDAO->GetAll();
        $puesto = 0;

        foreach ($puestos as $value) {

            if ($value->getjobPositionId() == $jobPositionId) {
                $puesto = $value->getDescription();
            }
        }
        $this->jobOfertDAO->Modify($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $puesto);
        $this->ShowListJobOferView();
    }*/
    public function JobOfertMody($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $imagen)
    {
        $puestos = $this->jobPositionDAO->GetAll();
        $puesto = 0;

        foreach ($puestos as $value) {

            if ($value->getjobPositionId() == $jobPositionId) {
                $puesto = $value->getDescription();
            }
        }
        $this->jobOfertDAO->Modify($id_JobOfert, $id_company, $jobPositionId, $cargaHoraria, $activo, $titulo, $descripcion, $puesto, $imagen);
        $this->ShowListJobOferView();
    }


    public function deleteJobOfert($id_JobOfert)
    {

        $applicationList = $this->applicationDAO->GetAll();
        $studentList = $this->studetDAO->GetAll();
        foreach ($applicationList as $application) {
            if ($id_JobOfert == $application->getId_JobOfert()) {

                foreach ($studentList as $student) {
                    if ($student->getStudentId() == $application->getStudentId()) {

                        $mailUser = $student->getEmail();

                        $titulo= "fin job offer";
                        $mensaje="la oferta de trabajo a finalizado, gracias por postularte";

                         $mail = new MailController();
                         $mail->sendMail($mailUser,$titulo,$mensaje);
                         
                      //  mail($email, "fin job offer", "la oferta de trabajo a finalizado, gracias por postularte", "programylab1234@gmail.com");
                    }
                }
            }
        }

        $this->jobOfertDAO->delete($id_JobOfert);

        // require_once(VIEWS_PATH . "navAdmin.php");
    }




    public function filtroListCompany($id_company)
    {

        $jobOfertList = $this->jobOfertDAO->GetAll();
        $jobPositionList = $this->jobPositionDAO->GetAll();
        $companyOfert = array();
        $jobCareer = array();
        $adminList = $this->adminDAO->GetAll();
        $studentList = $this->studetDAO->GetAll();
        $flag = -1;
        foreach ($adminList as $admin) {
            if ($_SESSION["email"] == $admin->getEmail()) {

                foreach ($jobOfertList as $jobOfert) {
                    if ($jobOfert->getId_company() == $id_company) {
                        $flag = 1;
                        array_push($companyOfert, $jobOfert);
                    }
                }
                if ($flag == 1) {
                    
                    $this->ShowSeeView($companyOfert);
                }
                /*  else{
                    echo "<script> if(confirm('no posee ofertas disponibles !'));";
                    echo "window.location = '../index.php'; </script>";
                }*/
            }
        }
        foreach ($jobOfertList as $jobOfert) {
            if ($jobOfert->getId_company() == $id_company) {

                array_push($companyOfert, $jobOfert);
            } else {
                /* echo "<script> if(confirm('no posee ofertas disponibles !'));";
                echo "window.location = '../index.php'; </script>";*/
            }
        }/*
        $idCareer = 0;
        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $idCareer = $student->getCareerId();
            }
        }
        foreach ($jobPositionList as $jobPosition) {
            if ($jobPosition->getCareerId() == $idCareer) {
                array_push($jobCareer, $jobPosition);
            }
        }

        foreach ($companyOfert as $compOfer) {
            //var_dump($job->getJobPositionId());
            var_dump($compOfer->getJobPositionId());
            foreach ($jobCareer as $job) {

                // var_dump($job->getJobPositionId());
                if ($job->getJobPositionId() == $compOfer->getJobPositionId()) {

                    echo "FFFFFFFFFFFFFFFFFFFFFFFFFFF";
                    array_push($jobFiltro, $compOfer);
                }
            }
        }
        $i = 2;
         $this->ShowSeeView($compOfer,$i); */
    }

    public function verPostulados($id_JobOfert)
    {
        $applicationList = $this->applicationDAO->GetAll();
        $studentList = $this->studetDAO->GetAll();
        $aux = array();
        $postulaciones = array();
        $flag = -1;
        foreach ($applicationList as $application) {

            if ($application->getId_JobOfert() == $id_JobOfert) {


                array_push($aux, $application);
            }
        }

        foreach ($studentList as $student) {
            foreach ($aux as $value) {
                if ($value->getStudentId() == $student->getStudentId()) {
                    $flag = 1;
                    array_push($postulaciones, $student);
                }
            }
        }
        if ($flag == 1) {

            $this->ShowListView($postulaciones, $id_JobOfert);
        } else {
            echo "<script> if(confirm('sin postulantes actualmente  !'));";
            echo "window.location = '../index.php'; </script>";
        }
    }
    public function ShowListView($postulaciones, $id_JobOfert)
    {


        require_once(VIEWS_PATH . "student-list.php");
    }

    public function verOdertas()
    {


        $jobOfertList = $this->jobOfertDAO->GetAll();
        $companytList = $this->companyDAO->GetAll();

        $key = array();

        foreach ($jobOfertList as $jobOfert) {
            foreach ($companytList as $company)
                if ($company->getEmail() == $_SESSION["email"]) {

                    if ($jobOfert->getId_company() == $company->getId_company()) {
                        array_push($key, $jobOfert);
                    }
                }
        }


        $this->showListCompany($key);
    }
    public function showListCompany($key)
    {

        require_once(VIEWS_PATH . "jobOfertData.php");
    }
}
