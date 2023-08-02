<?php

$con = mysqli_connect("localhost", "root", "123456", "soo");

$in_date = $_POST["date"];
mysqli_set_charset($con, "utf8");
$res = mysqli_query(
    $con,
    "select a.in_date,ifnull(a.money,0) as money , ifnull(b.min,0) as min, ifnull(c.plus,0) as plus
from(
    select sum(money) as money, in_date
    from(
        select case when gubn = '2'then (-1)*money else money end as money, in_date
        from accountbook
        where in_date = '$in_date'
    )as a GROUP by in_date
) as a
left join(
    	select sum(money) as min, in_date
        from accountbook
    	where gubn = '2'
        group by in_date
    ) as b on a.in_date = b.in_date
 left join(
     	select sum(money) as plus, in_date
     	from accountbook
     	where gubn = '1'
        group by in_date
     ) as c on a.in_date = c.in_date"
);
$result = array();

while ($row = mysqli_fetch_array($res)) {
    array_push(
        $result,
        array(
            'in_date' => $row[0], 'sum' => $row[1], 'min' => $row[2], 'plus' => $row[3]
        )
    );
}
echo json_encode($result);
mysqli_close($con);
