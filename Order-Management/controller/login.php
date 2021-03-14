<?php
/**
 * login
 */
session_start();
require "../include/functions.php";

$username = strval(trim($_POST['username']));
$password = md5(strval(trim($_POST['password'])));

$connect = new mysqli('localhost','root','root','demo');
if(!$connect)response(10001,'Failed to connect to database！');
$sql = "SELECT id,username FROM `user` WHERE username='{$username}' AND password='{$password}'";
$result = $connect->query($sql);
if($result->num_rows == 0)
{
    response(10002,'Wrong user name or password！');
}
$user = $result->fetch_assoc();
$_SESSION['user'] = $user;

response(0,'Login successful！');