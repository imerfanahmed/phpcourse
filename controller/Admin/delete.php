<?php

require_once '../../core/helper.php';
require_once '../../core/Database.php';
//delete student from get request id
session_start();
//1. get id from url
$id = $_GET['id'];

//2. connect to database
$db = new Database();

//3. delete student from database
$sql = "DELETE FROM users WHERE id='$id'";
$result = $db->query($sql);

if($result){
    $_SESSION['error'] = "Student Deleted Successfully";
    redirect('admin.php');
}

