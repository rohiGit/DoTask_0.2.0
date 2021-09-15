<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Jquery   -->
      <script src="js/jquery-3.6.0.js"></script>
      <script>
          $(document).ready(function (){
              if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
              }
              $('.sign-up').click(function (){
                  let email = $('.email').val();
                  let pattern_email = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/
                  if (!email.match(pattern_email)){
                      $('.email-check').text("Invalid email")
                  }else {
                      $('.email-check').text("")
                  }
                  let password = $('.password').val();
                  let pattern_pswd = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/;
                  if (!password.match(pattern_pswd)){
                      $('.password-check').text("Weak password")
                  }else{
                      $('.password-check').text("")
                  }
                  let re_password = $('.re-password').val();
                  if (re_password !== password){
                    $('.re-password-check').text("Password doesn't match")
                  }else{
                      $('.re-password-check').text("")
                  }
                  if (email.match(pattern_email) && password.match(pattern_pswd) && re_password === password){
                      $('.sign-up-form').submit();
                  }
              })
          })
      </script>
    <title>Hours and Minutes</title>
  </head>

  <body background="img/bg_landing.svg" style="background-size: cover;">

    <div class="wrap">

        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <img src="img/dotask_logo.svg" height="60px" alt="">
                </div>
            </div>
            <div class="row mt-5">
                <div class="w-30p me-5">
                    <div class="row">
                        <div class="col fw-bold fs-20px">
                            Why use DoTask?
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            DoTask is for people who make neatness their priority in their workflow. Simple yet quick, DoTask allows you to add and modify day-to-day tasks. It's lightweight and fast, just like a notepad on the table.
                            <br>
                            <br>
                            ---- need to add more ----
                        </div>
                    </div>
                </div>
                <div class="w-25p me-5">
                    <div class="row">
                        <div class="col fw-bold fs-20px p-0">
                            Sign up for a new account.
                        </div>
                    </div>
                    <form class="sign-up-form" action="dashboard.php" method="post">
                    <div class="row mt-4">
                        <input name="email" class="col input-box fw-bold fs-20px email" placeholder="Email" user-email></input>
                        <div class="email-check"></div>
                    </div>
                    <div class="row mt-2">
                        <input name="name" class="col input-box fw-bold fs-20px" placeholder="Full name" full-name></input>
                    </div>
                    <div class="row mt-2">
                        <input name="password" type="password" class="col input-box fw-bold fs-20px password" placeholder="Password" user-password></input>
                        <div class="password-check"></div>
                    </div>
                    <div class="row mt-2">
                        <input name="repassword" type="password" class="col input-box fw-bold fs-20px re-password" placeholder="Repeat password" re-password></input>
                        <div class="re-password-check"></div>
                    </div>
                    </form>
                    <div class="row mt-4">
                        <a class="col p-0">
                            <button class="btn-black sign-up" id="sign_up">Sign up</button>
                        </a>
                    </div>

                    <div class="row mt-3">
                        <div class="col fw-bold p-0">
                            Or <a class="link-orange text-dark" href="signin.php">sign in</a> instead
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

    </div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    
  </body>
</html>