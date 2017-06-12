<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('dbConnect.php');

    $phone_number = $_POST['phone_number'];
    $visibility = $_POST['phone_visibility'];
    $response = array();

    $update_visibility = "UPDATE accounts SET phone_visibility = '" . $visibility . "' WHERE phone_number = '" . $phone_number . "';";
    $update_result = mysqli_query($con, $update_visibility);

    if ($update_result) {
        $code = "success";
        $message = "Visibility updated successfully";
        array_push($response, array("code" => $code, "message" => $message));
    } else {
        $code = "unsuccess";
        $message = "Visibility was not updated";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    mysqli_close($con);

} else {
    echo "Error";
}