<?php require 'partials/header.view.php'; ?>
<?php
require_once "./core/helper.php";
require_once "./core/Database.php";
// session_start();
$db = new Database();
// $id = $_SESSION['user_id'];
$sql = "SELECT * FROM users";
$result = $db->query($sql);


?>
<main class="container mt-5">

    <div class="alert alert-danger h4 text-center">
        Dont forget configure env details in core/config.php
    </div>
    <div class="text-center h1">
        Student Details
    </div>
    <table class="table table-striped table-hover">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Address</th>
            <th>Details</th>
        </tr>

        <?php
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['address']?></td>
                    <td><a href="details.php?id=<?=$row['id']?>" class="btn btn-primary">Details</a></td>
                </tr>
                <?php
            }
        ?>
    </table>


  </main>
<?php require 'partials/footer.view.php'; ?>



