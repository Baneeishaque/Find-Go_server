<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('dbConnect.php');

    $phone_number = $_POST['phone_number'];
    $name = $_POST['name'];
    $response = array();

    $update_name = "UPDATE accounts SET name = '" . $name . "' WHERE phone_number = '" . $phone_number . "';";
    $update_result = mysqli_query($con, $update_name);

    if ($update_result) {
        $code = "success";
        $message = "Name updated successfully";
        array_push($response, array("code" => $code, "message" => $message));
    } else {
        $code = "unsuccess";
        $message = "Name was not updated";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    mysqli_close($con);

} else {
    echo "Error";
}