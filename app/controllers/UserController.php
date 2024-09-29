<?php
require_once 'app/models/UserModel.php';

class UserController {
    private $model;
    public function __construct($con)
    {
        $this->model = new UserModel($con);
    }
    public function hundleRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['enregistrer_user'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $this->model->insertUser($username, $email, $password);
                header('Location: index.php');
            } elseif (isset($_POST['modifier_user'])) {
                $id = $_GET['edit'];
                $this->model->updateUser($id,$_POST["username"],$_POST["email"],$_POST["password"]);
                header('Location: index.php');
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
            if (isset($_GET['add'])) {
                include 'app/views/user/add.php';
            } elseif (isset($_GET['edit'])) {
                $info = $this->model->getUserById($_GET['edit']);
                include 'app/views/user/edit.php';
            } elseif (isset($_GET['supp'])) {
                $this->model->deleteUser($_GET['supp']);
                header('Location: index.php');
            }
        }
        $this->listUsers();
    }
    public function listUsers() {
        $users = $this->model->getAllUser();
        if (isset($_POST['search'])) {
            $users = $this->model->searchUser($_POST["user_search"]);
        }
        include 'app/views/user/list.php';
    }
}