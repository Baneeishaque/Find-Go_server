<?php
$host = "localhost";
$username = "findandg_admin";
$password = "Gaurav@2017";
$database = "findandg_users";

$con = new mysqli($host, $username, $password, $database);

if ($con->connect_error) {
    die("Conenction failed :" . $con->connect_error);
}
?>