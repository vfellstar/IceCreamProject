<?php
    // Linked database
    $connect = new mysqli('localhost','root','root','demo');
    // Retrieve time parameter
    $q = $_GET['period'];
    $now = time();
    // Build time
    if ($q == 'today') {// today
        $text = 'today';
        $startTime = date('Y-m-d 00:00:00', $now);
        $endTime = date('Y-m-d 23:59:59', $now);
    } elseif ($q == 'week') {
        $text = 'week';
        $time = '1' == date('w') ? strtotime('Monday', $now) : strtotime('last Monday', $now);
        $startTime = date('Y-m-d 00:00:00', $time);
        $endTime = date('Y-m-d 23:59:59', strtotime('Sunday', $now));
    } elseif ($q == 'month') {
        $text = 'month';
        $startTime = date('Y-m-d 00:00:00', mktime(0, 0, 0, date('m', $now), '1', date('Y', $now)));
        $endTime = date('Y-m-d 23:39:59', mktime(0, 0, 0, date('m', $now), date('t', $now), date('Y', $now)));
    } elseif ($q == 'annual') {
        $text = 'annual';
        $startTime = date('Y-m-d 00:00:00', mktime(0, 0,0, 1, 1, date('Y', $now)));
        $endTime = date('Y-m-d 23:39:59', mktime(0, 0, 0, 12, 31, date('Y', $now)));
    }
    // An array of specifications 
    $sizeArr = ['s','m','l','xl','xxl'];
    // Taste an array
    $smellArr = ['vanilla','honey','rar','mint','cherry','choc','caramel','straw'];
    // Initializes the result array
    $data = array();
    // Cyclic flavor array
    foreach($smellArr as $k=>$smellRow){
        // Initializes the taste count to 0
        $smellTotal = 0;
        // Loop through every dimension for every flavor
        foreach($sizeArr as $j=>$sizeRow){
            //Stitching into specified specifications for flavors
            $field = $sizeRow.$smellRow;
            // var_dump($field);
            // Select data for a specified period of time for a specified specification and flavor
            $sql = "select `$field` from `orders_assoc` where `dtime` >= '$startTime' and `dtime` <= '$endTime' and `$field` != 'NULL'";
            $query = mysqli_query($connect,$sql);
            $result = mysqli_fetch_all($query,1);
            // var_dump($sql."<br>");
            // exit();
            //Initializes a counter for the specified flavor
            $subTotal = 0;
            // The cycle accumulates the number of flavors selected for the specified specification
            foreach($result as $row){
                
                $subTotal = $subTotal + $row[$field];
            }
            // Add the flavors of each specification to the specified flavor counter
            $smellTotal = $smellTotal + $subTotal;
        }
        // Inserts the counter result for each flavor into the results array
        $data[$k] = $smellTotal;
    }
    // Return JSON data
    echo json_encode($data);

?>