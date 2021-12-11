<?php

    $userId = $_POST["user-id"];
    $password = $_POST["password"];

    // this is for connection of database

    $conn = new mysqli('localhost','root','','register_user');

    if($conn->connect_error) {
        $result = array("success"=>false, "message"=>"Login Failed");
    } else {
        $stmt = $conn->prepare("select email, password from registration where email=? and password=?");
        $stmt->bind_param("ss",$userId, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result && $result->num_rows > 0) {
            $result = array("success"=>true, "message"=>"Login Success");
        } else {
            $result = array("success"=>false, "message"=>"Invalid UserId Or Password");
        }
    }

    echo json_encode($result);
?>
