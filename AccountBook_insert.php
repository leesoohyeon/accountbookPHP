<?php

$con = mysqli_connect("localhost", "root", "123456", "soo");
mysqli_query($con, 'SET NAMES utf8');

$in_date = $_POST["date"];
$gubn = $_POST["gubn"];
$memo = $_POST["memo"];
$money = $_POST["money"];
$select_seq = "select ifnull(max(seq),0)+1 as a from accountbook where in_date = '$in_date'";
$seq = mysqli_query($con, $select_seq);
$seq_max = mysqli_fetch_array($seq);
$insertSQL = "insert into accountbook (in_date, seq, gubn, memo, money) values('$in_date','$seq_max[0]','$gubn','$memo','$money')";
$resutl = mysqli_query($con, $insertSQL);

mysqli_close($con);
