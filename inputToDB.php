<?php

if(isset($_POST))
    echo "Order is :".$_POST['name'];
else
    echo "No data!";print_r($_POST);
$connect = new mysqli('localhost','root','password','test');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
else echo "connect successfully";
$order=$_POST['order'];
$svanilla=(int)$order['Vanilla (S)'];
$mvanilla=(int)$order['Vanilla (M)'];
$lvanilla=(int)$order['Vanilla (L)'];
$xlvanilla=(int)$order['Vanilla (XL)'];
$xxlvanilla=(int)$order['Vanilla (XXL)'];
$shoneycomb=(int)$order['Honeycomb (S)'];
$mhoneycomb=(int)$order['Honeycomb (M)'];
$lhoneycomb=(int)$order['Honeycomb (L)'];
$xlhoneycomb=(int)$order['Honeycomb (XL)'];
$xxlhoneycomb=(int)$order['Honeycomb (XXL)'];
$srumraisin=(int)$order['Rum Raisin (S)'];
$mrumraisin=(int)$order['Rum Raisin (M)'];
$lrumraisin=(int)$order['Rum Raisin (L)'];
$xlrumraisin=(int)$order['Rum Raisin (XL)'];
$xxlrumraisin=(int)$order['Rum Raisin (XXL)'];
$smint=(int)$order['Mint (S)'];
$mmint=(int)$order['Mint (M)'];
$lmint=(int)$order['Mint (L)'];
$xlmint=(int)$order['Mint (XL)'];
$xxlmint=(int)$order['Mint (XXL)'];
$scherry=(int)$order['Cherry (S)'];
$mcherry=(int)$order['Cherry (M)'];
$lcherry=(int)$order['Cherry (L)'];
$xlcherry=(int)$order['Cherry (XL)'];
$xxlcherry=(int)$order['Cherry (XXL)'];
$schocolate=(int)$order['Chocolate (S)'];
$mchocolate=(int)$order['Chocolate (M)'];
$lchocolate=(int)$order['Chocolate (L)'];
$xlchocolate=(int)$order['Chocolate (XL)'];
$xxlchocolate=(int)$order['Chocolate (XXL)'];
$ssaltedcaramel=(int)$order['Salted Caramel (S)'];
$msaltedcaramel=(int)$order['Salted Caramel (M)'];
$lsaltedcaramel=(int)$order['Salted Caramel (L)'];
$xlsaltedcaramel=(int)$order['Salted Caramel (XL)'];
$xxlsaltedcaramel=(int)$order['Salted Caramel (XXL)'];
$sstrawberry=(int)$order['Strawberry (S)'];
$mstrawberry=(int)$order['Strawberry (M)'];
$lstrawberry=(int)$order['Strawberry (L)'];
$xlstrawberry=(int)$order['Strawberry (XL)'];
$xxlstrawberry=(int)$order['Strawberry (XXL)'];

$cusnum=$_POST['cusnum'];
$cusname=$_POST['name'];
$email=$_POST['email'];
$time=$_POST['time'];
$cost=$_POST['cost'];
$address=$_POST['address'];
$phoneNumber=$_POST['phoneNumber'];

$date=strtotime($time);
$dtime=date('Y-m-d H:i:s',$date);

$ornum=$_POST['ordernum'];
$ordernum=$cost+$ornum;

$sql=mysqli_query($connect,"INSERT INTO Customer(cusnum,emailadd,phonenum,cusname,address) VALUE ('$cusnum','$email','$phoneNumber',
    '$cusname','$address')");
$sql1=mysqli_query($connect,"INSERT INTO Orders_Assoc(ordernum,cusnum,dtime,
                         svanilla,mvanilla,lvanilla,xlvanilla,xxlvanilla,
                         shoney,mhoney,lhoney,xlhoney,xxlhoney,
                         srar,mrar,lrar,xlrar,xxlrar,
                         smint,mmint,lmint,xlmint,xxlmint,
                         scherry,mcherry,lcherry,xlcherry,xxlcherry,
                         schoc,mchoc,lchoc,xlchoc,xxlchoc,
                         scaramel,mcaramel,lcaramel,xlcaramel,xxlcaramel,
                         sstraw,mstraw,lstraw,xlstraw,xxlstraw,amount) VALUE ('$ordernum','$cusnum','$dtime',
    '$svanilla','$mvanilla','$lvanilla','$xlvanilla','$xxlvanilla',
    '$shoneycomb','$mhoneycomb','$lhoneycomb','$xlhoneycomb','$xxlhoneycomb',
    '$srumraisin','$mrumraisin','$lrumraisin','$xlrumraisin','$xxlrumraisin',
    '$smint','$mmint','$lmint','$xlmint','$xxlmint',
    '$scherry','$mcherry','$lcherry','$xlcherry','$xxlcherry',
    '$schocolate','$mchocolate','$lchocolate','$xlchocolate','$xxlchocolate',
    '$ssaltedcaramel','$msaltedcaramel','$lsaltedcaramel','$xlsaltedcaramel','$xxlsaltedcaramel',
    '$sstrawberry','$mstrawberry','$lstrawberry','$xlstrawberry','$xxlstrawberry','$cost')");



$connect->close();
?>
