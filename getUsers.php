<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbConnect.php';
    include 'utils.php';

    $user_lat = $_POST['user_latitude'];
    $user_long = $_POST['user_longitude'];

    $target_number = array();
    $target_lat = array();
    $target_long = array();
    $final_id = array();
    $utilsObject = new utils();

    $sql = "SELECT phone_number, user_latitude, user_longitude FROM accounts";
    $result = mysqli_query($con, $sql);
    $response = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_row($result)) {
            $target_number = $row[0];
            $target_lat = $row[1];
            $target_long = $row[2];
        }
        for ($i = 0; $i < sizeof($target_number); $i++) {
            if (($utilsObject->getUsersLocation($user_lat, $user_long, $target_lat[$i], $target_long[$i])) <= 200) {
                $final_id = $target_number[$i];
            }
        }
        array_push($response, $final_id);
    } else {
        $code = "unsuccess";
        $message = "No friends found";
        array_push($response, array("code" => $code, "message" => $message));
    }
    echo json_encode($response);
} else {
    echo "Error";
}

?>