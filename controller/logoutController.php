<?php
require_once "../core/helper.php";

session_start();
session_destroy();
redirect('login.php');

?>
