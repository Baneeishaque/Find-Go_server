<?php

include 'dbConnect.php';
include 'utils.php';

$object = new utils();

$object->getAllUsersLocation($con);

$con->close();


?>