<?php
if (isset($_FILES['upload'])){
    $filename = $_FILES['upload']['name'];
    $temp = $_FILES['upload']['tmp_name'];
    move_uploaded_file($temp, 'C:\xampp\htdocs\demo\uploads/'.$filename);
}
?>
<html>
<head>
    <script src="js/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function (){
            $(".submit").on('change', function(){
                $('.form1').submit();
            });
        })
    </script>
</head>
<body>
<form class="form1" method="post" enctype="multipart/form-data">
<input class="submit" type="file" name="upload" accept="image/*">
</form>
</body>
</html>