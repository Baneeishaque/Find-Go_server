<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once('dbConnect.php');

    $phone_number = $_POST['phone_number'];
    $response = array();

    $delete_account = "DELETE FROM accounts WHERE phone_number = '" . $phone_number . "';";
    $delete_account_result = mysqli_query($con, $delete_account);
    if ($delete_account_result) {
        $code = "success";
        $message = "Account deleted successfully";
        array_push($response, array("code" => $code, "message" => $message));
    } else {
        $code = "failed";
        $message = "Some error occured while deleting account";
        array_push($response, array("code" => $code, "message" => $message));
    }

    echo json_encode($response);
    mysqli_close($con);

} else {
    echo "Error";
}

?>