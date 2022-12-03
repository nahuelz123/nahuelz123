<?php

namespace Controllers;

use DAO\ApplicationsDAO as ApplicationsDAO;
use DAO\JobOfertDAO as JobOfertDAO;
use DAO\StudentDAO as StudentDAO;
use Models\Applications;
use Models\JobOfert;
use Controllers\MailController;

class ApplicationController
{
    private $application;

    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
        $this->jobOferDAO = new JobOfertDAO();
        $this->applicationDAO = new ApplicationsDAO();
    }



    public function deleteApplication($id_JobOfert)
    {
        $id = 0;

        $studentList = $this->studentDAO->GetAll();

        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $id = $student->getStudentId();
            }
        }

        $this->applicationDAO->delete($id, $id_JobOfert);
    }
    public function applicationNew($jobOfertId)
    {
        $flag = 0;
        $studentList = $this->studentDAO->GetAll();
        $applicationList = $this->applicationDAO->GetAll();
        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $id = $student->getStudentId();
            }
        }
        $application = new Applications();
        $application->setId_JobOfert($jobOfertId);
        $application->setStudentId($id);

        foreach ($applicationList as $value) {
            if ($value->getStudentId() == $id) {
                if ($value->getId_JobOfert() == $jobOfertId) {
                    $flag = 1;
                }
            }
        }

        if ($flag == 0) {
            $this->applicationDAO->Add($application);
?>
            <script type="text/javascript">
                alert("Aplicación exitosa!");
            </script>
<?php
              $aux= new OfertController();
              $aux->ShowListJobOferView();
          //  require_once(VIEWS_PATH . "nav.php"); //ver redireccion 
        } else {
            echo "<script> if(confirm('ya aplico en esta oferta !'));";
            echo "window.location = '../index.php'; </script>";
        }
    }

    public function showListApplication($jobApplication)
    {

        require_once(VIEWS_PATH . "listApplication.php");
    }

    public function listarApplication()
    {
        $jobApplication = array();
        $applicationList = $this->applicationDAO->GetAll();


        $jobofertsList = $this->jobOferDAO->GetAll();

        $studentList = $this->studentDAO->GetAll();

        foreach ($studentList as $student) {
            if ($_SESSION["email"] == $student->getEmail()) {
                $id = $student->getStudentId();
            }
        }
        foreach ($applicationList as $application) {
            if ($id == $application->getStudentId()) {
                foreach ($jobofertsList as $ofert) {
                    if ($application->getId_JobOfert() == $ofert->getId_JobOfert()) {
                        $jobOfert = new JobOfert();
                        $jobOfert->setId_JobOfert($ofert->getId_JobOfert());
                        $jobOfert->setId_company($ofert->getId_company());
                        $jobOfert->setJobPositionId($ofert->getJobPositionId());
                        $jobOfert->setCargaHoraria($ofert->getCargaHoraria());
                        $jobOfert->setActivo($ofert->getActivo());
                        $jobOfert->setTitulo($ofert->getTitulo());
                        $jobOfert->setDescripcion($ofert->getDescripcion());
                        $jobOfert->setPuesto($ofert->getPuesto());
                        array_push($jobApplication, $jobOfert);
                    }
                }
            }
        }
        require_once(VIEWS_PATH . "listApplication.php");
    }

    public function SeeApplication($id_JobOfert)
    {
        $jobOfertList = $this->jobOferDAO->GetAll();

        foreach ($jobOfertList as $key) {
            if ($key->getId_JobOfert() == $id_JobOfert) {

                $this->ShowSeeApplicationView($key);
            }
        }
    }
    public function ShowSeeApplicationView($key)
    {
        require_once(VIEWS_PATH . "applicationData.php");
    }
    public function cancelarPostulacion($id_JobOfert, $studentId)
    {

        $applicationList = $this->applicationDAO->GetAll();
        $studentList =  $this->studentDAO->GetAll();

        foreach ($applicationList as $application) {

            if ($application->getStudentId() == $studentId) {

                if ($application->getId_JobOfert() == $id_JobOfert) {

                    $this->applicationDAO->delete($studentId, $id_JobOfert);
                    foreach ($studentList as $student) {
                        if ($student->getStudentId() == $studentId) {

                            $mailUser = $student->getEmail();
                            $titulo= "baja job offer";
                           $mensaje="fue dado debaja de la oferta";
                            $mail = new MailController();
                            $mail->sendMail($mailUser,$titulo,$mensaje);
                            // $mailer->send($email, "baja job offer", "fue dado debaja de la oferta","programylab1234@gmail.com");

                        }
                    }
                }
            }
        }
    }
}
?>