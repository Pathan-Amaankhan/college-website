<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile_number = $_POST["phone-number"];
    $otp = $_POST["otp"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $password = $_POST["password"];

    // this is for connection of database

    $conn = new mysqli('localhost','root','','register_user');

    if($conn->connect_error) {
        $result = array("success"=>false, "message"=>"Registration Unsuccessful");
    } else {
        $stmt = $conn->prepare("insert into registration(fname, email, mobile_number, otp, state, city, password) values(?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisss",$name, $email, $mobile_number, $otp, $state, $city, $password);
        if($stmt->execute()) {
            $result = array("success"=>true, "message"=>"Registration Success");
        } else {
            $result = array("success"=>false, "message"=>"User Already Registered Please Try To Login");
        }
    }

    echo json_encode($result);
?>
