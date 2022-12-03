<?php
namespace Controllers;

use DAO\AdminDAO as AdminDAO;
use Models\Admin;


class UserController
{

    private $AdminDAO;
    public function __construct()
    {
        $this->AdminDAO = new AdminDAO();
    }

    public function ShowUserAdminView()
    {
        require_once(VIEWS_PATH . "addUserAdmin.php");
    }

    public function AddAdmin($email, $password)
    {

        $newAdmin = new Admin();
        $newAdmin->setEmail($email);
        $newAdmin->setPassword($password);

        $this->AdminDAO->Add($newAdmin);
    }

    public function ListarAdmin()
    {
        $adminList = $this->AdminDAO->GetAll();
        require_once(VIEWS_PATH . "listAdmin.php");
    }
}
