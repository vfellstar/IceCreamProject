<?php
require 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($conn, 'utf8');

if (!empty($_POST)) {
    $orderNum = $_POST['ordernum'];

    $email = $_POST['emailadd'];
    $phoneNumber = $_POST['phonenum'];
    $cusomerName = $_POST['cusname'];
    $address = $_POST['address'];


    $result = mysqli_query($conn, "select max(cusnum) as maxnum from customer");
    $row = mysqli_fetch_assoc($result);
    $ccusNum = intval($row['maxnum']) + 1;

    $result = mysqli_query($conn, "insert into customer (cusnum,emailadd,phonenum,cusname,address) value 
('{$ccusNum}', '{$email}','{$phoneNumber}','{$cusomerName}','{$address}')");

    $isSuccess = false;
    if ($result && mysqli_affected_rows($conn) > 0) {
        $result = mysqli_query($conn, "update orders_assoc set cusnum='{$ccusNum}' where ordernum='{$orderNum}'");

        if ($result && mysqli_affected_rows($conn) > 0){
            $isSuccess = true;
        }
    }

    //query occures error
    if (false === $isSuccess) {
        echo mysqli_error($conn);
        exit;
    }

    //everything is ok. go to products.php
    echo '<script>alert("Submit success");window.location.href="products.php";</script>';
    exit;
} else {
    //check whether exists ordernum
    if (!isset($_GET['ordernum'])) {
        http_response_code(404);
        exit;
    }

    $orderNum = $_GET['ordernum'];

    //query order
    $result = mysqli_query($conn, "select * from orders_assoc where ordernum='{$orderNum}'");
    //query occures error
    if (false === $result) {
        echo mysqli_error($conn);
        exit;
    }

    //order not exists
    if (!mysqli_num_rows($result)) {
        http_response_code(404);
        exit;
    }

    $order = mysqli_fetch_assoc($result);

    //get the order list, include flavour,size,number,money
    $list = getOrderList($order);
}



//get the order list, include flavour,size,number,money
function getOrderList($order){

    $list = [];
    //Plain vanilla
    $item = getFlavourDetail('svanilla', $order['svanilla']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mvanilla', $order['mvanilla']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lvanilla', $order['lvanilla']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlvanilla', $order['xlvanilla']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlvanilla', $order['xxlvanilla']);
    if ($item) {
        $list[] = $item;
    }


    //Honeycomb
    $item = getFlavourDetail('shoney', $order['shoney']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mhoney', $order['mhoney']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lhoney', $order['lhoney']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlhoney', $order['xlhoney']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlhoney', $order['xxlhoney']);
    if ($item) {
        $list[] = $item;
    }


    //Rum and Raisin
    $item = getFlavourDetail('srar', $order['srar']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mrar', $order['mrar']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lrar', $order['lrar']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlrar', $order['xlrar']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlrar', $order['xxlrar']);
    if ($item) {
        $list[] = $item;
    }


    //Mint
    $item = getFlavourDetail('smint', $order['smint']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mmint', $order['mmint']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lmint', $order['lmint']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlmint', $order['xlmint']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlmint', $order['xxlmint']);
    if ($item) {
        $list[] = $item;
    }


    //Cherry
    $item = getFlavourDetail('scherry', $order['scherry']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mcherry', $order['mcherry']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lcherry', $order['lcherry']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlcherry', $order['xlcherry']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlcherry', $order['xxlcherry']);
    if ($item) {
        $list[] = $item;
    }

    //Chocolate
    $item = getFlavourDetail('schoc', $order['schoc']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mchoc', $order['mchoc']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lchoc', $order['lchoc']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlchoc', $order['xlchoc']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlchoc', $order['xxlchoc']);
    if ($item) {
        $list[] = $item;
    }

    //Salted Caramel
    $item = getFlavourDetail('scaramel', $order['scaramel']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mcaramel', $order['mcaramel']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lcaramel', $order['lcaramel']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlcaramel', $order['xlcaramel']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlcaramel', $order['xxlcaramel']);
    if ($item) {
        $list[] = $item;
    }

    //Strawberry
    $item = getFlavourDetail('sstraw', $order['sstraw']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('mstraw', $order['mstraw']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('lstraw', $order['lstraw']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xlstraw', $order['xlstraw']);
    if ($item) {
        $list[] = $item;
    }

    $item = getFlavourDetail('xxlstraw', $order['xxlstraw']);
    if ($item) {
        $list[] = $item;
    }

    return $list;
}

//get information about one flavour and size, include flavour,size,number,money
function getFlavourDetail($flavor, $num) {
    if (empty($num)) {
        return false;
    }

    $product = '';
    $size = '';

    switch ($flavor) {
        //Plain vanilla
        case 'svanilla':
            $product = 'Plain vanilla';
            $size = 'Small';
            break;

        case 'mvanilla':
            $product = 'Plain vanilla';
            $size = 'Medium';
            break;

        case 'lvanilla':
            $product = 'Plain vanilla';
            $size = 'Large';
            break;

        case 'xlvanilla':
            $product = 'Plain vanilla';
            $size = 'Extra Large';
            break;

        case 'xxlvanilla':
            $product = 'Plain vanilla';
            $size = 'Extra Extra Large';
            break;

        //Honeycomb
        case 'shoney':
            $product = 'Honeycomb';
            $size = 'Small';
            break;

        case 'mhoney':
            $product = 'Honeycomb';
            $size = 'Medium';
            break;

        case 'lhoney':
            $product = 'Honeycomb';
            $size = 'Large';
            break;

        case 'xlhoney':
            $product = 'Honeycomb';
            $size = 'Extra Large';
            break;

        case 'xxlhoney':
            $product = 'Honeycomb';
            $size = 'Extra Extra Large';
            break;

        //Rum and Raisin
        case 'srar':
            $product = 'Rum and Raisin';
            $size = 'Small';
            break;

        case 'mrar':
            $product = 'Rum and Raisin';
            $size = 'Medium';
            break;

        case 'lrar':
            $product = 'Rum and Raisin';
            $size = 'Large';
            break;

        case 'xlrar':
            $product = 'Rum and Raisin';
            $size = 'Extra Large';
            break;

        case 'xxlrar':
            $product = 'Rum and Raisin';
            $size = 'Extra Extra Large';
            break;


        //Mint
        case 'smint':
            $product = 'Mint';
            $size = 'Small';
            break;

        case 'mmint':
            $product = 'Mint';
            $size = 'Medium';
            break;

        case 'lmint':
            $product = 'Mint';
            $size = 'Large';
            break;

        case 'xlmint':
            $product = 'Mint';
            $size = 'Extra Large';
            break;

        case 'xxlmint':
            $product = 'Mint';
            $size = 'Extra Extra Large';
            break;


        //Cherry
        case 'scherry':
            $product = 'Cherry';
            $size = 'Small';
            break;

        case 'mcherry':
            $product = 'Cherry';
            $size = 'Medium';
            break;

        case 'lcherry':
            $product = 'Cherry';
            $size = 'Large';
            break;

        case 'xlcherry':
            $product = 'Cherry';
            $size = 'Extra Large';
            break;

        case 'xxlcherry':
            $product = 'Cherry';
            $size = 'Extra Extra Large';
            break;


        //Chocolate
        case 'schoc':
            $product = 'Chocolate';
            $size = 'Small';
            break;

        case 'mchoc':
            $product = 'Chocolate';
            $size = 'Medium';
            break;

        case 'lchoc':
            $product = 'Chocolate';
            $size = 'Large';
            break;

        case 'xlchoc':
            $product = 'Chocolate';
            $size = 'Extra Large';
            break;

        case 'xxlchoc':
            $product = 'Chocolate';
            $size = 'Extra Extra Large';
            break;


        //Salted Caramel
        case 'scaramel':
            $product = 'Salted Caramel';
            $size = 'Small';
            break;

        case 'mcaramel':
            $product = 'Salted Caramel';
            $size = 'Medium';
            break;

        case 'lcaramel':
            $product = 'Salted Caramel';
            $size = 'Large';
            break;

        case 'xlcaramel':
            $product = 'Salted Caramel';
            $size = 'Extra Large';
            break;

        case 'xxlcaramel':
            $product = 'Salted Caramel';
            $size = 'Extra Extra Large';
            break;


        //Strawberry
        case 'sstraw':
            $product = 'Strawberry';
            $size = 'Small';
            break;

        case 'mstraw':
            $product = 'Strawberry';
            $size = 'Medium';
            break;

        case 'lstraw':
            $product = 'Strawberry';
            $size = 'Large';
            break;

        case 'xlstraw':
            $product = 'Strawberry';
            $size = 'Extra Large';
            break;

        case 'xxlstraw':
            $product = 'Strawberry';
            $size = 'Extra Extra Large';
            break;

        default:
            throw new Exception('unknow flavor');
            break;
    }


    $money = 0;
    switch ($size) {
        case 'Small':
            $money = SMALL_MONEY * $num;
            break;

        case 'Medium':
            $money = MEDIUM_MONEY * $num;
            break;

        case 'Large':
            $money = LARGE_MONEY * $num;
            break;

        case 'Extra Large':
            $money = EXTRA_LARGE_MONEY * $num;
            break;

        case 'Extra Extra Large':
            $money = EXTRA_EXTRA_LARGE_MONEY * $num;
            break;

        default:
            throw new Exception('unknown size');
            break;
    }

    return [
        'flavour' => $product,
        'size' => $size,
        'num' => $num,
        'money' => number_format($money, 2),
    ];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery</title>
    <link rel="stylesheet" href="../../Downloads/delivery.css">
</head>
<body>
<div class="main">
    <div class="content">
        <table id="orderlist">
            <caption><h2>Order List</h2></caption>
            <thead>
                <tr>
                    <th>Flavor</th>
                    <th>Size</th>
                    <th>Number</th>
                    <th>Money</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $v):?>
                <tr>
                    <td><?php echo $v['flavour'];?></td>
                    <td><?php echo $v['size'];?></td>
                    <td><?php echo $v['num'];?></td>
                    <td><?php echo '£' . $v['money'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">Total: <?php echo '£' . number_format($order['amount'], 2);?></td>
            </tr>
            </tfoot>
        </table>


        <form id="delivery-form" method="post" action="delivery.php" onsubmit="return submitDeliveryInfo()">
            <input type="hidden" name="ordernum" value="<?php echo $order['ordernum'];?>"/>
            <div class="form-group-center">
                <h2>Delivery Information</h2>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Name</b></label>
                <div class="">
                    <input type="text" name="cusname" class="form-input" placeholder="Your name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Mobile</b></label>
                <div class="">
                    <input type="text" name="phonenum" class="form-input" placeholder="Your mobile" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Address</b></label>
                <div class="">
                    <input type="text" name="address" class="form-input" placeholder="Your detail address" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Email</b></label>
                <div class="">
                    <input type="text" name="emailadd" class="form-input" placeholder="Your email" required>
                </div>
            </div>
            <div class="form-group">
                Please input your information,so that you can get your ice cream.
            </div>

            <div class="form-group-center">
                <button type="submit" class="form-btn">Submit</button>
            </div>
        </form>
    </div>

    <div id="location-info">

    </div>
    <div id="map" style="width:100%;height:500px"></div>

    <footer>
        <p>Cavalllo Traditional Italian Ice Cream 2021 - page designed by Boyuan Bao</p>
    </footer>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHmLvWvkan5Xu5hH1QjGppAzkqsp-gn8A&sensor=false&v=3&libraries=geometry"></script>
<script>
    //object of google map
    var map = null;
    //the latitude and longitude of the ice cream shop
    var latShop = 39.915168, lngShop = 116.403875, zoom = 17;

    //the max distance
    var deliveryDistanceLimit = 5;


    //the distance from user
    var distance = false;

    initMap();

    getCustomerLocation();

    //load map, and mark ice cream shop
    function initMap() {
        var mapType = google.maps.MapTypeId.ROADMAP;

        var mapOptions = {
            center: new google.maps.LatLng(latShop, lngShop),
            zoom: zoom,               　　　　　　　　　
            mapTypeId: mapType,       　　　　　　　　　　
            scrollwheel: true          　　　　　　　　　
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);

        var markerShop = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(latShop, lngShop)
        });


        var infowindow = new google.maps.InfoWindow({content: "shop address" });
        infowindow.open(map, markerShop);

        google.maps.event.addListener(markerShop, "click", function(){
            infowindow.open(map, markerShop);
        });
    }


    //location of customer
    function getCustomerLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(positionSuccess, positionError);
        } else {
            alert("Sorry,your browser can't support location service.");
        }

    }

    //success callback when get location success
    function positionSuccess(position) {
        var lng = position.coords.longitude.toFixed(6);
        var lat = position.coords.latitude.toFixed(6);

        console.log(position.coords)
        var markerCurrent = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(lat, lng)
        });

        var infowindow = new google.maps.InfoWindow({content: "my address" });
        infowindow.open(map, markerCurrent);

        google.maps.event.addListener(markerCurrent, "click", function(){
            infowindow.open(map, markerCurrent);
        });


        var shop = new google.maps.LatLng(latShop, lngShop);
        var current = new google.maps.LatLng(lat, lng);


        //1 mile = 1609.344 meter

        //unit: meter
        var tmpDistance = google.maps.geometry.spherical.computeDistanceBetween (shop, current);

        distance = (tmpDistance / 1609.344).toFixed(2);

        var locationInfo = document.getElementById('location-info');
        if (distance <= deliveryDistanceLimit) {
            locationInfo.innerText = 'Note: Your distance from ice cream shop is about ' + distance + 'miles, within delivery distance limit.'
            locationInfo.classList.add('location-info-success')
        } else {
            locationInfo.innerText = 'Note: Sorry,Your distance from ice cream shop is about ' + distance + 'miles, out of delivery distance range.'
            locationInfo.classList.add('location-info-failure')
        }
    }


    //failure callback when get location success
    function positionError(error) {
        alert(error.message);
        var locationInfo = document.getElementById('location-info');
        locationInfo.innerText = 'Note: Sorry,' + error.message;
        locationInfo.classList.add('location-info-failure')
    }


    //the event of submit form
    function submitDeliveryInfo() {
        //location service fail
        if (false === distance) {
            alert("Sorry, cant't get your location information.");
            return false;
        }

        //too far
        if (distance > 5) {
            alert('Sorry,Your distance from ice cream shop is about ' + distance + 'miles, out of delivery distance range.');
            return false;
        }

        //everything is ok. Submit
        return true;
    }
    
</script>
</body>
</html>