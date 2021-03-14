<?php
    // Linked database
    $connect = new mysqli('localhost','root','root','demo');
    // The query gets the data for the specified order
    $sql = "select * from `orders_assoc` order by dtime desc";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_all($query,1);
    // Returns JSON data in format
    echo json_encode(array("code"=>0,"data"=>$result)); 
?>