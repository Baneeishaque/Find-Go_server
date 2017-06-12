<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbConnect.php';
    include 'utils.php';

    $phone_number = $_POST['phone_number'];

    $isAlreadyRegistered = array();
    $isAlreadyRegisteredObject = new utils();
    $isAlreadyRegistered = $isAlreadyRegisteredObject->isAlreadyRegistered($phone_number, $con);

    $response = array();

    if ($isAlreadyRegistered[0]) {
        //true . User already exist .
        $code = "exist";
        $message = "user already exist";
        array_push($response, array("code" => $code, "message" => $message, "name" => $isAlreadyRegistered[1], "email" => $isAlreadyRegistered[2], "phone_number" => $isAlreadyRegistered[3], "gender" => $isAlreadyRegistered[4], "image_url" => $isAlreadyRegistered[5]));
    } else {
        $code = "not_exist";
        $message = "user does not exist";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    $con->close();
}
?>