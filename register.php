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


        <?php
    // session_start();
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-success'>".$_SESSION['msg']."</div>";
            unset($_SESSION['msg']);
        }

        if(isset($_SESSION['error'])){
          echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
          unset($_SESSION['error']);
      }

    ?>
    <h1>Register Form</h1>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Contact No</label>
    <input type="number" class="form-control" name="contact" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" name="address" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Choose Profile Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require 'partials/footer.view.php'; ?>
