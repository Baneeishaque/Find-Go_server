<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbConnect.php';
    include 'utils.php';

    $phone_number = $_POST['phone_number'];
    $user_latitude = $_POST['user_latitude'];
    $user_longitude = $_POST['user_longitude'];

    $isAlreadyRegistered = array();
    $utilsObject = new utils();
    $response = array();

    $result = $utilsObject->uploadUserLocation($con, $phone_number, $user_latitude, $user_longitude);
    if ($result) {
        $code = true;
    } else {
        $code = false;
    }

    array_push($response, array("code" => $code));
    echo json_encode($response);

    $con->close();
}
?>