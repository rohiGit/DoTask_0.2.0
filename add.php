<?php

if (isset($_POST['title'])){
    require 'db.php';
    $conn = connect();
    $title = $_POST['title'];
    $time = $_POST['time'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    date_default_timezone_set('Asia/Calcutta');

    $day = date('l');

    $check = mysqli_query($conn, "select * from task where day = '$day' and time = '$time' and email = '$email'");

    $n = mysqli_num_rows($check);
    if ($n > 0){
        $query = "update task set title = '$title', task_desc = '$desc' where day = '$day' and time = '$time' and email = '$email'";
    }else{
        $query = "insert into task (title, time, email, day, task_desc) values ('$title', '$time', '$email', '$day', '$desc')";
    }
    mysqli_query($conn, $query);

}
