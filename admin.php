<?php require 'partials/header.view.php'; ?>

<?php
require_once "./core/helper.php";
require_once "./core/Database.php";

$user_id = $_SESSION['user_id'];

$db = new Database();

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);

//check if user is admin or not
if($result['isAdmin'] != '1'){
    //$_SESSION['error'] = "You are not authorized to access this page";
    redirect('details.php');
    die();
}

//get student list
$sql = "SELECT * FROM users WHERE isAdmin='0'";
$students = $db->query($sql);
$students = $students->fetchAll(PDO::FETCH_ASSOC);

// dd($students);


?>

<main class="container m-5 mx-auto">
    <div class="row text-center ">
      <div class="col-4 p-3 rounded">
        <!-- Hover added -->
        <div class="list-group">
          <h5>Admin Navigation Menu</h5>
          <a href="#" class="list-group-item list-group-item-action active">Student List</a>
          <a href="#" class="list-group-item list-group-item-action"  data-bs-toggle="modal" data-bs-target="#create_student">Create New Student</a>

        </div>
      </div>

      <div class="col-md-8 border rounded p-4">
        <h4>Student List</h4>
        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">SL</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              foreach($students as $key => $student){
                ?>
                <tr class="">
                <td scope="row"><?=$key+1?></td>
                <td><?=$student['name']?></td>
                <td><?=$student['address']?></td>
                <td>

                  <a href="#" class="btn btn-sm btn-warning">Edit</a>
                  <a href="controller/Admin/delete.php?id=<?=$student['id']?>" class="btn btn-sm btn-danger">Delete</a>
                  <a href="details.php" class="btn btn-sm btn-success">Details</a>
                </td>
              </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </main>




<!-- Modal -->
<div class="modal fade" id="create_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controller/RegisterController.php" method="POST">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">contact</label>
          <input type="number" name="contact" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" required>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php require 'partials/footer.view.php'; ?>
