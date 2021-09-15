<?php
$email = $_POST['email'];
require 'db.php';
$conn = connect();
$query = 'select name from user_table where email = "'.$email.'"';
$res = mysqli_query($conn, $query);
$name = '';
while ($row = mysqli_fetch_array($res)){
    $name = $row['name'];
}
echo $name;

