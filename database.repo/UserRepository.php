<?php
require_once __DIR__ . '/../database.model/UserModel.php';

class UserRepository
{
    private $model;

    public function __construct($db)
    {
        $this->model = new UserModel($db);
    }

    public function login($nik, $password)
    {
        return $this->model->verifyLogin($nik, $password);
    }

    public function getAll()
    {
        return $this->model->getAllUsers();
    }

    public function findByNIK($nik)
    {
        return $this->model->getUserByNIK($nik);
    }

    public function create($nik, $password, $nama, $alamat, $jenisKelamin, $umur)
    {
        return $this->model->addUser($nik, $password, $nama, $alamat, $jenisKelamin, $umur);
    }

    public function update($nik, $password)
    {
        return $this->model->updateUser($nik, $password);
    }

    public function delete($nik)
    {
        return $this->model->deleteUser($nik);
    }
}
