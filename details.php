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
    <?php
    // session_start();
    if(isset($_SESSION['msg'])){
        echo "<div class='alert alert-success text-center'>".$_SESSION['msg']."</div>";
        unset($_SESSION['msg']);
    }

    if(isset($_SESSION['error'])){
      echo "<div class='alert alert-danger tex-center'>".$_SESSION['error']."</div>";
      unset($_SESSION['error']);
  }

    ?>
    <div class="row">
        <div class="col-md-3">
            <picture>
                <!-- <source srcset="sourceset" type="image/svg+xml"> -->

                <?php
                    $image_path = $result['image'] ? 'uploads/'.$result['image'] : 'https://placehold.jp/250x250.png';
                ?>
                <img src="<?=$image_path?>" class="img-fluid" alt="image desc">
              </picture>
        </div>

        <div class="col-md-9">
            <div class="card">

                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4>Student Information</h4>
                        <?php
                        if(isset($_SESSION['user_id']) ? $_SESSION['user_id'] == $id : false){ ?>
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#payment">
                                 Payment
                            </button>
                        <?php
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
            <th>Payment Amount(BDT)</th>
        </tr>
        <?php
        $sql = "SELECT * FROM payments WHERE user_id='$id'";
        $result = $db->query($sql);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        // dd($result);
        foreach($result as $key => $value){
            ?>
            <tr>
                <td><?=$key+1?></td>
                <td><?=$value['date']?></td>
                <td><?=$value['amount']?></td>
            </tr>
        <?php
        }
        ?>

        <?php
            //total payemnt sum
            $sql = "SELECT SUM(amount) as total FROM payments WHERE user_id='$id'";
            $result = $db->query($sql);
            $result = $result->fetch(PDO::FETCH_ASSOC);
            // dd($result);



        ?>

        <tr>
            <td colspan="2" class="fw-bold text-success">Total Payment</td>
            <td class="fw-bold text-success"><?=$result['total']?></td>
        </tr>
    </table>
  </main>


  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Payment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controller/paymentController.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" name="pay_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php require 'partials/footer.view.php'; ?>
