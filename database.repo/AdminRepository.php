<?php
require_once __DIR__ . '/../database.model/AdminModel.php';


class AdminRepository
{
    private $model;

    public function __construct($db)
    {
        $this->model = new AdminModel($db);
    }

    public function login($username, $password)
    {
        return $this->model->verifyLogin($username, $password);
    }

    public function getAll()
    {
        return $this->model->getAllAdmins();
    }

    public function findByUsername($username)
    {
        return $this->model->getAdminByUsername($username);
    }

    public function create($username, $password)
    {
        return $this->model->addAdmin($username, $password);
    }

    public function update($username, $password)
    {
        return $this->model->updateAdmin($username, $password);
    }

    public function delete($username)
    {
        return $this->model->deleteAdmin($username);
    }
}
