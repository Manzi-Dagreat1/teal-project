<?php
$con = mysqli_connect("localhost", "root", "", "gas_abc");
// $con = new mysqli("localhost:3306","iotpolys_sensors","iotpolystar123","iotpolys_heart_");
// ini_set("display_errors", "Off");

if (!$con) {
    die("Failed to connect." . mysqli_connect_error());
}
