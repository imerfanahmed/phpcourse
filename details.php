<?php require 'partials/header.view.php'; ?>

<?php
require_once "./core/helper.php";
require_once "./core/Database.php";





// session_start();
$db = new Database();
$id = $_GET['id'] ?? $_SESSION['user_id'];
// dd($_SESSION);
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $db->query($sql);
$result = $result->fetch(PDO::FETCH_ASSOC);


?>
<main class="container m-5 border p-5 mx-auto">
    <h1 class="text-center my-5">Student Panel</h1>
    <div class="row">
        <div class="col-md-3">
            <picture>
                <!-- <source srcset="sourceset" type="image/svg+xml"> -->
                <img src="https://placehold.jp/150x150.png" class="img-fluid" alt="image desc">
              </picture>
        </div>

        <div class="col-md-9">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Student Information</h4>
                        <?php
                        if(isset($_SESSION['user_id']) ? $_SESSION['user_id'] == $id : false){
                            echo '<a href="" class="btn btn-primary mx-3 mb-3">Payment</a>';
                        }
                        ?>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="">
                                    <td scope="row">Username</td>
                                    <td><?=$result['username']?></td>
                                </tr>
                                <tr class="">
                                    <td scope="row">Name</td>
                                    <td><?=$result['name']?></td>
                                </tr>

                                <tr class="">
                                    <td scope="row">Email</td>
                                    <td><?=$result['email']?></td>
                                </tr>

                                <tr class="">
                                    <td scope="row">Contact No</td>
                                    <td><?=$result['phone']?></td>
                                </tr>

                                <tr class="">
                                    <td scope="row">Address</td>
                                    <td><?=$result['address']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <h4>Recent Payments</h4>
    <table class="table table-striped text-center table-hover my-3">
        <tr>
            <th>SL</th>
            <th>Payment Date</th>
            <th>Payment Amount</th>
        </tr>
        <tr>
            <td>1</td>
            <td>1/1/1999</td>
            <td>500</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>USA</td>
        </tr>
        <tr>
            <td>1</td>
            <td>John</td>
            <td>USA</td>
        </tr>

        <tr>
            <td>1</td>
            <td>John</td>
            <td>USA</td>
        </tr>
    </table>
  </main>
<?php require 'partials/footer.view.php'; ?>
