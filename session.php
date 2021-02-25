<?php
/**
 * This file will be the file that controls the session.
 * It means that for as long as people are on our website we know their data and they do not have
 * to keep inputting everytime they are directed to another page.
 *
 * Whoever is involved in the log in should be modifying this file! <<<< PLEASE! Like, update the variables below to go with user details.
 *
 * $_SESSION['userID'];
 * $_SESSION['userName'];
 *
 * Also this is just a collection of the things we need we actually really need to organise this at some point.
 * Like the database connection should probably be somewhere else.
 *
 * Add your name below if you write things in here please! ^^ also put the date you made changes so we know which is the most recent files
 * as many people appear to forget to upload their files regularly
 *
 * Authors: Vincent Taylor - 25/02/2021 <<<<
 * Editors: at the minute no one lol <<< please change this so we know who's contributed.
*/
session_start();

// This is just to test that the session has started i.e., it works. We should probably remove it after when we know we have got everything running correctly.
echo session_id();

// List of session variables here:
$_SESSION['userID'];
$_SESSION['userName'];

// Create connection to the databases --
$servername = "cs-db.ncl.ac.uk";
$username = "csc8019_team11";
$password = "Vie9BussSeer";
$dbname = "csc8019_team11";
$databaseConnection = new mysqli($servername, $username, $password, $dbname);


// Check connections
if ($databaseConnection->connect_error) {
    die("Connection failed: " . $databaseConnection->connect_error);
}

// Prevent unlimited refreshes.
if (!isset($_SESSION['refresh'])) {
    $_SESSION['refresh'] = 1;
} else if ($_SESSION['refresh'] < 10) {
    $_SESSION['refresh'] = $_SESSION['refresh'] + 1;
} else {
    session_destroy();
}



?>