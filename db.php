<?php

function connect(){
    $dbhost = 'localhost:3307';
    $uname = 'root';
    $pswd = 'aajhonaho1';
    $db = 'HoursAndMinutes';
    $conn = mysqli_connect($dbhost, $uname, $pswd, $db);
    if (!$conn){
        echo 'Server unable to connect';
    }
    return $conn;
}
