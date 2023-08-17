<?php require 'partials/header.view.php'; ?>
<?php
require_once "./core/helper.php";
if(isset($_SESSION['user_id'])){
    redirect('details.php');
}
?>
<form  action="controller/RegisterController.php"
        method="POST" enctype="multipart/form-data"
        class="container mt-5 w-50 m-auto border border-lg rounded p-5">
    <h1>Register Form</h1>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email">
  </div>

  <div class="mb-3">
    <label class="form-label">Contact No</label>
    <input type="number" class="form-control" name="contact">
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" name="address">
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
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
