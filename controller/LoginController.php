<?php

//Login a user
// Path: controller\LoginController.php

require_once "../core/Database.php";
require_once "../core/helper.php";
session_start();

$db = new Database();

//1. get data from form

$email = $_POST['email'];
$password = sha1($_POST['password']);

//sql to query email and password
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);

// dd($result);

if(!$result){
    //redirect to login.php
    $_SESSION['error'] = "Invalid Email or Password";
    redirect('login.php');
    die();
}

$_SESSION['user_id'] = $result['id'];

if($result['isAdmin'] == 1){
    redirect('admin.php');
    die();
}

redirect('details.php');

