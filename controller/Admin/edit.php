<?php

require_once '../../core/helper.php';
require_once '../../core/Database.php';

//edit student controller

//1. get data from form
$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$password = sha1($_POST['password']);
$confirm_password = sha1($_POST['confirm_password']);

//2. validate confirm password
if($password != $confirm_password){
    //redirect to register.php
    redirect('edit.php?id='.$id.'&error=Password and Confirm Password does not match');
}

//3. validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //redirect to register.php
    redirect('edit.php?id='.$id.'&error=Invalid Email');
}

//save into database
//4. check if username already exists
$db = new Database();
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);
if($result){
    //redirect to register.php
    redirect('edit.php?id='.$id.'&error=Username already exists');
}

//5. check if email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);
if($result){
    //redirect to register.php
    redirect('edit.php?id='.$id.'&error=Email already exists');
}

//check if image is uploaded
//6. upload image



//7. save data into database
$sql = "UPDATE users SET username='$username', name='$name', email='$email', phone='$contact', address='$address', password='$password' WHERE id='$id'";
$result = $db->query($sql);

if($result){
    redirect('admin.php');
}


