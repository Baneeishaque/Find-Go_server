<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('dbConnect.php');

    $phone_number = $_POST['phone_number'];
    $image = $_POST['image'];
    $response = array();

    $path = "profile/$phone_number.png";
    $actualpath = "http://www.findandgo.in/server/$path";

    $update_account = "UPDATE accounts SET image_url = '" . $actualpath . "' WHERE phone_number = '" . $phone_number . "';";
    $update_result = mysqli_query($con, $update_account);
    $image_update_result = file_put_contents($path, base64_decode($image));
    if ($update_result && $image_update_result) {
        $code = "success";
        $message = "Profile Pic updated successfully";
        array_push($response, array("code" => $code, "message" => $message));
    } else {
        $code = "unsuccess";
        $message = "File was not upldated";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    mysqli_close($con);

} else {
    echo "Error";
}