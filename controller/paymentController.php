<?php

//take payment information from post and save into database

require_once "../core/Database.php";
require_once "../core/helper.php";

session_start();

$db = new Database();

//1. get data from form

$amount = $_POST['amount'];
$pay_date = $_POST['pay_date'];
$user_id = $_SESSION['user_id'];

//2. sql to insert data into payments table
$sql = "INSERT INTO payments(amount, date, user_id) VALUES('$amount', '$pay_date', '$user_id')";
$result = $db->query($sql);

if($result){
    $_SESSION['msg'] = "Payment Successful";
    redirect('details.php');
}else{
    $_SESSION['error'] = "Payment Failed";
    redirect('details.php');
}
