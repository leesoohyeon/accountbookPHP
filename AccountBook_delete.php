<?php

$con = mysqli_connect("localhost", "root", "123456", "soo");
mysqli_query($con, 'SET NAMES utf8');

$in_date = $_POST["date"];
$seq = $_POST["seq"];
$deleteSQL = "delete from accountbook where in_date = '$in_date' and seq = '$seq'";
$resutl = mysqli_query($con, $deleteSQL);

mysqli_close($con);
