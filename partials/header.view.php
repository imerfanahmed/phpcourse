<!doctype html>
<html lang="en">

<head>
  <title>PHP Lab Course</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <?php
    //check if admin or not
    require_once "./core/helper.php";
    require_once "./core/Database.php";
    session_start();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $db = new Database();
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = $db->query($sql);
        $result = $result->fetch(PDO::FETCH_ASSOC);
        $is_admin = $result['isAdmin'];
    }else{
        $is_admin = '0';
    }

    $nav_bg = $is_admin ? 'bg-danger' : 'bg-dark';
    ?>
    <nav class="navbar navbar-expand-sm navbar-dark <?=$nav_bg?>" >
          <div class="container">
            <a class="navbar-brand" href="index.php">Erfan Organaizaion</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>

                </ul> -->


                <ul class="navbar-nav mt-2 mt-lg-0">
                    <?php
                    if(isset($_SESSION['user_id']) ? $is_admin == '1' : false){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Admin Panel</a>
                        </li>
                        <?php
                    }
                    if(isset($_SESSION['user_id']) ? $is_admin == '0' : false){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="details.php">Student Panel</a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if(isset($_SESSION['user_id'])){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="controller/logoutController.php">Logout</a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <?php
                    }

                    ?>
                </ul>


            </div>
      </div>
    </nav>

    </header>


