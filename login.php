<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'dbConnect.php';
    include 'utils.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];

    $isAlreadyRegistered = array();
    $isAlreadyRegisteredObject = new utils();
    $isAlreadyRegistered = $isAlreadyRegisteredObject->isAlreadyRegistered($phone_number, $con);

    $response = array();

    if ($isAlreadyRegistered[0]) {
        //true . User already exist .
        $code = "success";
        $message = "user already exist";
        array_push($response, array("code" => $code, "message" => $message, "name" => $isAlreadyRegistered[1], "email" => $isAlreadyRegistered[2], "phone_number" => $isAlreadyRegistered[3]
        , "gender" => $isAlreadyRegistered[4], "image_url" => $isAlreadyRegistered[5]));
    } else {
        // false . User is new
        $data_insertion = $con->prepare("INSERT INTO accounts (name,email,phone_number,gender) 
                    VALUES (?,?,?,?)");
        $data_insertion->bind_param("ssss", $name, $email, $phone_number, $gender);
        $data_insertion->execute();

        if ($data_insertion == true) {
            //success message
            $code = "success";
            $message = "Successfully registered";
            array_push($response, array("code" => $code, "message" => $message));
        } else {
            // error message
            $code = "failed";
            $message = "Error message";
            array_push($response, array("code" => $code, "message" => $message));
        }
        $data_insertion->close();
    }

    echo json_encode($response);
    $con->close();
}
?>