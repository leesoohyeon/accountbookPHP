<?php
$con = mysqli_connect("localhost", "root", "123456", "soo");
$in_date = $_POST["date"];
mysqli_set_charset($con, "utf8");
$res = mysqli_query($con, "select in_date, seq, gubn, memo, money from accountBook where in_date ='$in_date'");
$result = array();

while ($row = mysqli_fetch_array($res)) {
    array_push(
        $result,
        array(
            'in_date' => $row[0], 'seq' => $row[1], 'gubn' => $row[2],
            'memo' => $row[3], 'money' => $row[4]
        )
    );
}
echo json_encode($result);
mysqli_close($con);
