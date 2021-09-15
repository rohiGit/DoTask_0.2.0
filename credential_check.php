<?php
$email = $_POST['email'];
$password = $_POST['password'];
require 'db.php';
$conn = connect();
$query = 'select * from user_table where email = "'.$email.'" and password = "'.$password.'"';
$rows = mysqli_num_rows(mysqli_query($conn, $query));
echo $rows;
