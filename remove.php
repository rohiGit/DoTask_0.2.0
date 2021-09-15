<?php

if (isset($_POST['id'])){
    require 'db.php';

    $id = $_POST['id'];
    $conn = connect();
    $query = 'delete from task where task_id = "'.$id.'"';
    mysqli_query($conn, $query);
}
