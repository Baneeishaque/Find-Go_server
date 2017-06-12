<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('dbConnect.php');

    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $response = array();

    $update_email = "UPDATE accounts SET email = '" . $email . "' WHERE phone_number = '" . $phone_number . "';";
    $update_result = mysqli_query($con, $update_email);

    if ($update_result) {
        $code = "success";
        $message = "Email updated successfully";
        array_push($response, array("code" => $code, "message" => $message));
    } else {
        $code = "unsuccess";
        $message = "Email was not updated";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    mysqli_close($con);

} else {
    echo "Error";
}