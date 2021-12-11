<?php

    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];

    <!-- this is for connection of database  -->

    $conn = new mysqli('localhost','root','','test');
    if connect($conn->connect_error){
    echo("connection failed");
    }
    else{
    $stmt = $conn->prepare("insert into registration(fname, email, mobile_number, state, city, gender)"
    values(?,?,?,?,?,?,));
    $stmt->build_param("sssssi",$fname,$email, $mobile_number, $state, $city, $gender);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    }
?>
