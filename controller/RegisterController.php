<?php
require_once '../core/helper.php';
require_once '../core/Database.php';


session_start();
$db = new Database();

//save form data into database
//1. get data from form
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
    $_SESSION['error'] = "Password and Confirm Password does not match";
    redirect('register.php');
    die();
}

//3. validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //redirect to register.php
    redirect('register.php?error=Invalid Email');
}

//save into database
//4. check if username already exists
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);
if($result){
    //redirect to register.php
    redirect('register.php?error=Username already exists');
}

//5. check if email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);
if($result){
    //redirect to register.php
    redirect('register.php?error=Email already exists');
}

//check if image is uploaded
//6. upload image

if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])){
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];
    $image_type = $image['type'];
    // dd($image);

    //get file extension
    $image_extension = explode('.', $image_name);
    $image_extension = strtolower(end($image_extension));

    //allowed extensions
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    //check if extension is allowed
    if(!in_array($image_extension, $allowed_extensions)){
        //redirect to register.php
        redirect('register.php?error=Invalid Image Format');
    }

    //check if image size is less than 2MB
    if($image_size > 2 * 1024 * 1024){
        //redirect to register.php
        redirect('register.php?error=Image size must be less than 2MB');
    }

    //generate unique image name
    $image_name = uniqid() . '.' . $image_extension;

    //move image to uploads folder
    move_uploaded_file($image_tmp_name, '../uploads/' . $image_name);
}
else{
    $image_name = null;
}


//7. insert data into database
$sql = "INSERT INTO users(username, name, email, phone, address, password, image) VALUES('$username', '$name', '$email', '$contact', '$address', '$password', '$image_name')";

$result = $db->query($sql);

if($result){
    //redirect to login.php
    //save into session
    //$_SESSION['user_id'] = $db->connection->lastInsertId();
    $_SESSION['msg'] = "Registration Successful";

    //check if login is from admin or user
    if(isset($_SESSION['user_id'])){
        //check if user is admin or not
        $db = new Database();
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $db->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if($result['isAdmin'] != '1'){
            redirect('index.php');
        }

        redirect('admin.php');
    }else{
        redirect('login.php');
    }
}else{
    //redirect to register.php
    $_SESSION['msg'] = "Registration Failed Somehow";
    redirect('/register.php');
}



