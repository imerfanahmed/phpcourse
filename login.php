<?php require 'partials/header.view.php'; ?>
<?php
require_once "./core/helper.php";
if(isset($_SESSION['user_id'])){
    redirect('details.php');
}
?>
<form action="controller/LoginController.php"
        method="POST"
       class="container mt-5 w-50 m-auto border border-lg rounded p-5">
    <h1>Login Form</h1>
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
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require 'partials/footer.view.php'; ?>
