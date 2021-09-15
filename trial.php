    <?php
        require 'db.php';
        session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['name'])){
        $conn = connect();

        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $name = $_POST['name'];
        $password = $_POST['password'];
        $query = "insert into user_table (name, password, email) values('$name','$password', '$email')";
        mysqli_query($conn, $query);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['email'])){
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
    }
    ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Jquery  -->
    <script src="js/jquery-3.6.0.js"></script>
    <?php

    if (isset($_FILES['upload'])){
        $email = $_SESSION['email'];
        $filename = $_FILES['upload']['name'];
        $temp = $_FILES['upload']['tmp_name'];
        move_uploaded_file($temp, 'img/'.$filename);
        $query = 'update user_table set profile = "'.$filename.'" where email = "'.$email.'"';
        mysqli_query($conn, $query);
    }


    function render(){
        date_default_timezone_set('Asia/Calcutta');
        $day = date('l');
        $curr_time = date('H:i', time());
        $conn = connect();
        $email = $_SESSION['email'];
        $query = 'select * from task where email = "'.$email.'" and day = "'.$day.'" order by time asc';
        $tasks = mysqli_query($conn, $query);



        while ($row = mysqli_fetch_array($tasks)){
            $title = $row['title'];
            $time = $row['time'];
            $id = $row['task_id'];
            ?>
            <div class="row task-container align-items-center justify-contents-between">
                <div class="w-30px p-0">
                    <?php
                    if ($curr_time >= $time){
                        echo "<div class='checked'></div>";
                    }else{
                        echo "<div class='check'></div>";
                    }
                    ?>
                </div>

                <div class="col fw-bold">
                    <?php echo $title; ?>
                </div>
                <div class="col fs-12px text-end">
                    <?php echo $time; ?>
                    <img id="<?php echo $id ?>" class="remove-task" style="margin-left: 10px" src="svg/remove_circle_outline_black_24dp.svg">
                </div>
            </div>
        <?php }
    }
    ?>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        $(document).ready(function (){
            $('.remove-task').click(function (){
                const id = $(this).attr('id');

                $.post('remove.php',
                    {
                        id: id
                    },
                    (data) =>{
                        $(this).parent().parent().hide(300);
                    });

            });

            var readURL = function(input) {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.circle').attr('src', e.target.result);

                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function(){
                readURL(this);
                $('.form-upload').submit();
            });

            $('.cam-icon').click(function (){
                $('.file-upload').click();
            });

            $('.add-button').click(function (){
                const title = $('.add-task-box').val();
                const time = $('.add-task-time').val();
                const email = "<?php echo $_SESSION['email']; ?>"
                $.post('add.php',
                    {
                        title: title,
                        time: time,
                        email: email
                    },
                    (data)=>{
                        location.reload()
                    });
            });
            $('.btn-logout').click(function (){
                $.session.clearAll()
            })
        });
        $(document).ready(function (){
            const email = "<?php echo $_SESSION['email']; ?>"
            $.post('set_profile.php',
                {email: email},
                (data)=>{
                if(data){
                    let file = 'img/'
                    $('.circle').attr('src', file+data);
                }else {
                    $('.circle').attr('src', 'https://www.pngkey.com/png/full/114-1149878_setting-user-avatar-in-specific-size-without-breaking.png');
                }
                })
            $.post('set_name.php',
                {
                    email: email
                },
                (data)=>{
                    $('.full-name').text(data);
                })
        });

    </script>
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Hours and Minutes</title>

</head>

<body>

<div class="wrap">

    <div class="container-fluid">

        <div class="row">

            <!-- ! Left -->
            <div class="w-30p mt-4">
                <img src="img/hoursandminutes_logo_light.svg" height="60px" alt="">

                <div class="row mt-130px">
                    <div class="col fs-12px fw-bold text-end">
                        <div class="row">
                            <?php
                            $conn = connect();
                            $email = $_SESSION['email'];
                            date_default_timezone_set('Asia/Calcutta');
                            $day = date('l');
                            $curr_time = date('H:i', time());
                            $query1 = 'select * from task where email = "'.$email.'" and day = "'.$day.'"';
                            $query2 = 'select * from task where email = "'.$email.'" and time > "'.$curr_time.'" and day = "'.$day.'"';
                            $total = mysqli_num_rows(mysqli_query($conn, $query1));
                            $remaining = mysqli_num_rows(mysqli_query($conn, $query2));
                            ?>
                            <div class="col">Total tasks: <?php echo $total ?></div>
                        </div>
                        <div class="row">
                            <div class="col">Remaining: <?php echo $remaining ?></div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ! Center -->
            <div class="w-40p  h-100vh">

                <!-- ? Day title -->
                <div class="row mt-150px">
                    <div class="col">
                        <div class="fs-30px fw-bold" id="today_title">
                            <?php
                            date_default_timezone_set('Asia/Calcutta');
                            echo date('l').', '.date('d').' '.date('F');
                            ?>
                        </div>
                    </div>
                </div>
                <!-- ? Add task input -->
                <div class="row mt-4">

                    <input name="add_task" type="text" autocomplete="off" class="col input-box fw-bold fs-20px add-task-box" placeholder="Add new task"></input>
                    <input name="time" class="add-task-time" style="float: right; width: 100px" type="time">
                    <a class="w-50px p-0 click-me" href="">
                        <button class="btn-orange-square add-button">
                            <img src="img/arrow-right.svg" alt="">
                        </button>
                    </a>

                </div>
                <div class="row mb-150px">
                    <div class="col">
                        <?php render(); ?>
                    </div>
                </div>

            </div>

            <!-- ! Right -->
            <div class="w-30p mt-50px">

                <!-- ? User and logout -->
                <div class="row d-flex align-items-center">
                    <div class="col text-end fw-bold full-name">

                    </div>
                    <div class="userpic p-0">
                        <img class="circle" src="img/user_temp.svg" alt="">
                        <img class="cam-icon" src="img/baseline_photo_camera_black_24dp.png">
                        <form class="form-upload" method="post" enctype="multipart/form-data">
                            <input class="file-upload" type="file" name="upload" accept="image/*">
                        </form>
                    </div>
                        <a class="col" href="signin.php">
                        <button class="btn-logout">
                            Logout
                        </button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>
</html>