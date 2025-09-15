<?php
define("HOST", "localhost");
define("LOGIN", "admin");
define("PASSWORD", "myadmin");
define("BASE", "ChauffeurGO_project");


$conn = mysqli_connect(HOST, LOGIN, PASSWORD, BASE);
$conn->query("SET CHARACTER SET utf8");

define('BASE_URL', '/vehicle_reservation_management');