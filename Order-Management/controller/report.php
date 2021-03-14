<?php
/**
 * report data
 */
require "../include/functions.php";

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : response(10003,'Operation type not obtained！');
$connect = new mysqli('localhost','root','root','demo');
if($action == "charts")
{
    // Chart data
    $type = intval($_GET['type']);
    switch ($type)
    {
        // today
        case 0:
            $sql = "SELECT
                        week_temp.HOUR,
                        IFNULL( order_temp.count, 0 ) AS count 
                    FROM
                        (
                        SELECT
                            @d := @d + 1 `hour` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                                @d := - 1 
                            ) temp 
                        WHERE
                            @d < 23 
                        ORDER BY
                            `hour` 
                        ) AS week_temp
                        LEFT JOIN (
                        SELECT HOUR
                            ( dtime ) AS date,
                            count( ordernum ) AS count 
                        FROM
                            `orders_assoc` 
                        WHERE
                            YEAR ( dtime ) = YEAR ( CURRENT_DATE ) 
                            AND MONTH ( dtime ) = MONTH ( CURRENT_DATE ) 
                            AND DAY ( dtime ) = DAY ( CURRENT_DATE ) 
                        GROUP BY
                            date 
                        ) AS order_temp ON week_temp.HOUR = order_temp.date 
                    ORDER BY
                        week_temp.HOUR";
            for ($i=0; $i<=23; $i++)
            {
                $x[] = sprintf("%02d",$i).":00";
            }
            break;
        // this week
        case 1:
            $sql = "SELECT
                        week_temp.date,
                        IFNULL( order_temp.count, 0 ) AS count 
                    FROM
                        (
                        SELECT
                            @a := @a + 1 AS `index`,
                            DATE(
                            ADDDATE( CURRENT_DATE, INTERVAL @a DAY )) AS `date` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                                @a := 0 
                            ) temp 
                        WHERE
                            @a < 6 - WEEKDAY( CURRENT_DATE ) UNION
                        SELECT
                            @s := @s - 1 AS `index`,
                            DATE(
                            DATE_SUB( CURRENT_DATE, INTERVAL @s DAY )) AS `date` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                                @s := WEEKDAY( CURRENT_DATE ) + 1 
                            ) temp 
                        WHERE
                            @s > 0 
                        ORDER BY
                            `date` 
                        ) AS week_temp
                        LEFT JOIN (
                        SELECT
                            DATE( dtime ) AS date,
                            count( ordernum ) AS count 
                        FROM
                            `orders_assoc` 
                        WHERE
                            MONTH ( dtime ) = MONTH ( CURRENT_DATE ) 
                            AND YEAR ( dtime ) = YEAR ( CURRENT_DATE ) 
                        GROUP BY
                        DATE( dtime ) 
                        ) AS order_temp ON week_temp.date = order_temp.date";
            $x = ['Mon','Tue','Wed','Thur','Fri','Sat','Sun'];
            break;
        // this month
        case 2:
            $sql = "SELECT
                        month_temp.date,
                        IFNULL( order_temp.count, 0 ) AS count 
                    FROM
                        (
                        SELECT
                            @a := @a + 1 AS `index`,
                            DATE(
                            ADDDATE( CURRENT_DATE, INTERVAL @a DAY )) AS `date` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                                @a := 0 
                            ) temp 
                        WHERE
                            @a < DAY (
                            LAST_DAY( CURRENT_DATE )) - DAY ( CURRENT_DATE ) UNION
                        SELECT
                            @s := @s - 1 AS `index`,
                            DATE(
                            DATE_SUB( CURRENT_DATE, INTERVAL @s DAY )) AS `date` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                            @s := DAY ( CURRENT_DATE )) temp 
                        WHERE
                            @s > 0 
                        ORDER BY
                            `date` 
                        ) AS month_temp
                        LEFT JOIN (
                        SELECT
                            DATE ( dtime ) AS date,
                            count( ordernum ) AS count 
                        FROM
                            `orders_assoc` 
                        WHERE
                            YEAR ( dtime ) = YEAR ( CURRENT_DATE ) 
                            AND MONTH ( dtime ) = MONTH ( CURRENT_DATE ) 
                        GROUP BY
                            date 
                        ) AS order_temp ON month_temp.date = order_temp.date 
                    ORDER BY
                        month_temp.date";
            $range = date("t");
            for ($i=1; $i<=$range; $i++)$x[] = date('M')." ".$i;
            break;
        // all year
        case 3:
            $sql = "SELECT
                        year_temp.MONTH,
                        IFNULL( order_temp.count, 0 ) AS count 
                    FROM
                        (
                        SELECT
                            @d := @d + 1 `month` 
                        FROM
                            mysql.help_topic,(
                            SELECT
                                @d := 0 
                            ) temp 
                        WHERE
                            @d < 12 
                        ORDER BY
                            `month` 
                        ) AS year_temp
                        LEFT JOIN (
                        SELECT MONTH
                            ( dtime ) AS date,
                            count( ordernum ) AS count 
                        FROM
                            `orders_assoc` 
                        WHERE
                            YEAR ( dtime ) = YEAR ( CURRENT_DATE ) 
                        GROUP BY
                            date 
                        ) AS order_temp ON year_temp.MONTH = order_temp.date 
                    ORDER BY
                        year_temp.MONTH";
            $x = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            break;
    }
    $result = $connect->query($sql);
    $data = [
        'xAxis' => $x
    ];
    while($row = $result->fetch_assoc())
    {
        $data['count'][] = $row['count'];
    }

    response(0,"success",$data);
}else if($action == "orders"){
    // order data
    $page = intval($_GET['page']);
    $limit = intval($_GET['limit']);
    $offset = ($page-1)*$limit;
    $sql = "SELECT count(ordernum) as count FROM `orders_assoc`";
    $result = $connect->query($sql);
    $total = $result->fetch_assoc()['count'];

    $sql = "SELECT ordernum,dtime,amount FROM `orders_assoc` ORDER BY dtime DESC LIMIT {$offset},{$limit}";
    $result = $connect->query($sql);
    while($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }

    response( 0, "success", $data, $total );
}else{
    response(10004,'Illegal operation type！');
}
