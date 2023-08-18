<?php require 'partials/header.view.php'; ?>
<?php
require_once "./core/helper.php";
require_once "./core/Database.php";

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
}


    $id = $_GET['id'];
    $db = new Database();
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = $db->query($sql);
    $result = $result->fetch(PDO::FETCH_ASSOC);
    // dd($result);

?>
<form  action="controller/Admin/edit.php"
        method="POST" enctype="multipart/form-data"
        class="container mt-5 w-50 m-auto border border-lg rounded p-5">
    <h1>Edit Student Details</h1>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" value="<?=$result['username']?>" required>
  </div>

    <input type="hidden" name="id" value="<?=$result['id']?>">

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value=<?=$result['name']?> required>
  </div>

  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value=<?=$result['email']?> required>
  </div>

  <div class="mb-3">
    <label class="form-label">Contact No</label>
    <input type="number" class="form-control" name="contact" value=<?=$result['phone']?> required>
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" name="address" value=<?=$result['address']?> required>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" >
  </div>

  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password">
  </div>
  <div class="mb-3">
    <label class="form-label">Choose Profile Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require 'partials/footer.view.php'; ?>
