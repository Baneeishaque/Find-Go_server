<?php

//class for helper functions
class utils
{

    public static function getUsersLocation($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $distance = 0;
        $earthRadius = 6371000;
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) + pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);

        $distance = $angle * $earthRadius;
        return $distance;
    }

    public static function getAllUsersLocation($con)
    {
        $sql = "SELECT phone_number, user_latitude, user_longitude FROM accounts ";
        $result = mysqli_query($con, $sql);
        $response = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $phone_number = $row[0];
                $user_latitude = $row[1];
                $user_longitude = $row[2];
                array_push($response, array("phone_number" => $phone_number, "user_latitude" => $user_latitude, "user_longitude" => $user_longitude));
            }
            echo json_encode($response);
        } else {
            $code = "failed";
            array_push($response, array("code" => $code));
        }
    }

    function isAlreadyRegistered($number, $con)
    {
        $sql = "SELECT name, email, phone_number, gender, image_url FROM accounts WHERE  phone_number LIKE '" . $number . "';";
        $result = mysqli_query($con, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_row($result);
            return array(true, $row[0], $row[1], $row[2], $row[3], $row[4]);
        } else {
            return array(false);
        }
    }

    function uploadUserLocation($con, $number, $user_lat, $user_long)
    {
        $sql = "UPDATE accounts SET user_latitude = '" . $user_lat . "', user_longitude = '" . $user_long . "' WHERE phone_number = '" . $number . "';";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /*function getUsersInsideLocation($con,$radius, $currentLat, $currentLong) {
        $targetLat = array();
        $targetLong = array();

        $sql = "SELECT phone_number,location FROM accounts";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_row($result)) {
                $targetLat = $row[1];
            }
        } else {
            return array(false);
        }

    } */

    /*Note that you get the distance back in the same unit as you pass in with the parameter $earthRadius. The default value is 6371000 meters so the result will be in [m] too. To get the result in miles, you could e.g. pass 3959 miles as $earthRadius and the result would be in [mi].*/

    function updateName($con, $number, $name)
    {
        $sql = "UPDATE accounts SET name = '" . $name . "' WHERE phone_number = '" . $number . "';";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateEmail($con, $number, $email)
    {
        $sql = "UPDATE accounts SET email = '" . $email . "' WHERE phone_number = '" . $number . "';";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}

?>