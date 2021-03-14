<?php
//$amount is the total price of the order in GBP;$to_Currency is the aim currencyCode that need to be transfered from GBP
//This function will return you the total price of the aim currency code
echo isset($_GET['currency']) ? '你选择了' . $_GET['currency'] : '请在下面做选择';
function convertCurrency($amount,$to_currency){
    $apikey = 'a3b48f51ff43b0e1eaf4';
    $from_Currency = "GBP";
    $to_Currency = urlencode($to_currency);
    $query =  "{$from_Currency}_{$to_Currency}";
    $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey={$apikey}");
    $obj = json_decode($json, true);

    $val = floatval($obj["$query"]);


    $total = $val * $amount;
    return number_format($total, 2, '.', '');
}

//echo convertCurrency(10, 'USD', 'PHP');

//Use this function to send payment detail to horse pay, $customerID2 is the customerID, amount2 is the total price in $currencyCode2
function sendToHorsepay($customerID2,$amount2,$currencyCode2){
    $urlHorsepay = 'http://homepages.cs.ncl.ac.uk/daniel.nesbitt/CSC8019/HorsePay/HorsePay.php';
    $storeID='"Team11"';
    $customerID=urlencode($customerID2);
    $transactionAmount=$amount2;
    $date=date("d/m/Y");
    $time=date("H:i");
    $timeZone='"GMT"';
//$transactionAmount=convertCurrency($amount2,"GBP");
    $currencyCode=$currencyCode2;
//echo $transactionAmount;

//$myvars = 'storeID=' . $storeID . '&customerID=' . '"' . $customerID . '"' . '&date=' . $date . '&time=' . $time . '&timeZone=' . $timeZone
    //          . '&transactionAmount=' . $transactionAmount . '&currencyCode=' . $currencyCode2;
//$paymentDetail2='{"storeID":"Team11", "customerID":"abc123", "date":"01/12/2021", "time":"12:00", "timeZone":"GMT", "transactionAmount":15.99, "currencyCode":"GBP"}';
//',"forcePaymentSatusReturnType":true'
    $paymentDetail='{"storeID":' . $storeID .',"customerID":'. '"' .$customerID. '"' . ', "date":' . '"' . $date . '"' . ', "time":' . '"' . $time . '"'
        .', "timeZone":' . $timeZone . ',"transactionAmount":' . $transactionAmount .', "currencyCode":'. '"'. $currencyCode .'"'.'}';
//echo $paymentDetail."<br>";
//echo $paymentDetail2."<br>";
    $ch = curl_init( $urlHorsepay );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $paymentDetail);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);


    $response = curl_exec( $ch );
//echo $response."<br>";
    $jsonObj=json_decode($response,true);
//print_r($jsonObj).'\n';
    $result=$jsonObj["paymetSuccess"];
//print_r($result).'\n';
    return boolval($result["Status"]);
}
// This is an example how to call the 2 functions above，just for reference!
$payState = "false";
$payCurrency = "GBP";
$payCurrency = $_GET["currency"];
$amount=convertCurrency(15.99,$_GET["currency"]);
if (sendToHorsepay("abc123",$amount,$_GET["currency"])) { $payState = "true";echo "true";}
else{
    echo "false";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delivery</title>
    <link rel="stylesheet" href="delivery.css">
</head>
<body>
<div class="main">
    <div class="content">
        <table id="orderList" style="visibility: hidden">
            <caption><h2>Order List</h2></caption>
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
            </thead>
        </table>
        <form id="delivery-form" >
            <!--            <input type="hidden" name="ordernum" value=""/>-->
            <div class="form-group-center">
                <h2>Delivery Information</h2>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Name</b></label>
                <div class="">
                    <input type="text" name="cusName" class="form-input" placeholder="Your name" >
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Mobile</b></label>
                <div class="">
                    <input type="text" name="phoneNum" class="form-input" placeholder="Your mobile">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Address</b></label>
                <div class="">
                    <input type="text" name="address" class="form-input" placeholder="Your detail address">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label"><b>Email</b></label>
                <div class="">
                    <input type="text" name="emailAdd" class="form-input" placeholder="Your email">
                </div>
            </div>
            <div class="form-group">
                Before input your information please check your order first!
            </div>

            <div class="form-group-center">
                <button  id="getOrderBtn" class="form-btn" onclick="getOrders()">Check your order first!</button>
                <div class="form-group">
                    Want to collection?
                </div>
                <button  class="form-btn" onclick="jumpToCollection()">Go collection!</button>
                <div class="form-group">
                    Want to change your order?
                </div>
                <button  class="form-btn" onclick="goBack()">Back to order</button>
                <div>This is your total cost:</div>
                <div id="costAmount"></div>
                <form action="" method="get">
                    <select class="selectList" name="currency">
                        <option value="GBP" selected>GBP</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="CNY">CNY</option
                        <option value="JPY">JPY</option
                    </select>
                </form>
                <input class="form-btn" type="submit" value="Choose your currency type">

                <div style="padding-top:10px "><button  id="submit" type="submit" class="form-btn" style="opacity: 0.3" onclick="orderConfirmed()" disabled="disabled">Submit</button></div>
            </div>
        </form>
    </div>

    <div id="t1"></div>
    <div id="location-info">

    </div>
    <div id="map" style="width:100%;height:500px"></div>

    <footer>
        <p >Cavalllo Traditional Italian Ice Cream 2021 - page designed by Boyuan Bao</p>
    </footer>
</div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHmLvWvkan5Xu5hH1QjGppAzkqsp-gn8A&sensor=false&v=3&libraries=geometry"></script>
<script>
    //object of google map
    var map = null;
    //the latitude and longitude of the ice cream shop
    var latShop = 54.98, lngShop = -1.625, zoom = 17;

    //the max distance
    var deliveryDistanceLimit = 5;


    //the distance from user
    var distance = false;
    //local storage data
    var order= window.localStorage.getItem('order');
    var totalCost=window.localStorage.getItem('totalCost');
    var costAmount = totalCost.substring(13);
    // document.getElementById("t1").innerText="123";
    document.getElementById("costAmount").innerText=costAmount;




    // document.getElementById("orderList").style.visibility ='visible';


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
    function jumpToCollection() {
        window.location='collection.html';
        window.event.returnValue=false;
    }

    function goBack() {
        window.location='prod2test.html';
        window.event.returnValue=false;
    }

    function disableGetOrder(){
        document.getElementById("getOrderBtn").disabled="true";
        document.getElementById("getOrderBtn").style.opacity="0.3";

    }

    function enableSubmit(){
        document.getElementById("submit").removeAttribute("disabled");
        document.getElementById("submit").removeAttribute("style");
    }


    function getOrders() {
        enableSubmit();
        disableGetOrder();
        var time = new Date();
        orderMap = new Map();
        orderedGoods = new Map();
        var order1 = JSON.parse(order);
        for (let k of Object.keys(order1)) {
            orderMap.set(k, order1[k]);
        }
        for (let [key, value] of orderMap) {
            if (value > 0) {
                orderedGoods.set(key, value);
            }
        }
        document.getElementById("orderList").style.visibility = 'visible';
        for (let [key, value] of orderedGoods) {
            row = document.getElementById("orderList").insertRow();
            if (row !== null) {
                cell = row.insertCell();
                cell.innerHTML = key;
                cell = row.insertCell();
                cell.innerHTML = value;
            }
        }
        totalCostRow=document.getElementById("orderList").insertRow(-1);
        totalCostTextCell = totalCostRow.insertCell();
        totalCostTextCell.colSpan=2;
        totalCostTextCell.style.textAlign='right';
        totalCostTextCell.innerHTML = totalCost;

        // totalCostCell = totalCostRow.insertCell(1);
        // totalCostCell.innerHTML=;

        // enableConfirm();
    }
    function orderConfirmed() {
        if(document.getElementById(""))
            if (!distance){
                alert("Location service is un available for your browser.");

            }
        if (distance>5){
            alert("Your location is out delivery range.");
        }
        if (distance<5){

            window.location="HorsePay.html";
            var name = document.getElementById("cusName").value;
            var email=document.getElementById("emailAdd").value;
            var phoneNumber=document.getElementById("phoneNum").value;
            var address = document.getElementById("address").value;
            var choose="delivery";
            window.localStorage.setItem('name',name);
            window.localStorage.setItem('address',address);
            window.localStorage.setItem('email',email);
            window.localStorage.setItem('phoneNumber',phoneNumber);
            window.localStorage.setItem('choose',choose);
        }

    }



</script>
</body>
</html>