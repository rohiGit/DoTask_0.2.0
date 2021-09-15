<?php
    require 'db.php';
    $email = $_POST['email'];
    $query = 'select profile from user_table where email = "'.$email.'"';
    $conn = connect();

    $res = mysqli_query($conn, $query);

    while ($image = mysqli_fetch_assoc($res)){
        if ($image['profile'] != null){
            echo $image['profile'];
        }
    }




