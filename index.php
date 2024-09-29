<?php
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';

$con = getPDO();
$userController = new UserController($con);

$userController->hundleRequest();
?>