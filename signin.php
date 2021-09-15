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
    <!--Jquery-->
      <script src="js/jquery-3.6.0.js"></script>
      <script>
          $(document).ready(function (){
              if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
              }
              $('.sign-in-btn').click(function (){
                  let password = $('.password').val();
                  let email = $('.email').val();
                  if (password !== '' && email !== ''){
                      $.post('credential_check.php',
                          {password: password,
                              email:  email},
                          (data)=>{
                            if (data > 0){
                                $('.sign-in-form').submit();
                            }else {
                                $('.error-check').text("Email/password is incorrect");
                            }
                          })
                  }else {
                      $('.error-check').text("Fields cannot be empty");
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
                        </div>
                    </div>
                </div>
                <div class="w-25p me-5">
                    <div class="row">
                        <div class="col fw-bold fs-20px p-0">
                            Sign into your account.
                        </div>
                    </div>
                    <form method="post" action="dashboard.php" class="sign-in-form">
                    <div class="row mt-4">
                        <input name="email" class="col input-box fw-bold fs-20px email" placeholder="Email"></input>
                    </div>
                    <div class="row mt-2">
                        <input name="password" type="password" class="col input-box fw-bold fs-20px password" placeholder="Password"></input>
                    </div>
                        <div class="row mt-2 error-check"></div>
                    </form>
                    <div class="row mt-4">
                        <div class="col p-0">
                            <button class="btn-black sign-in-btn">Login</button>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col fw-bold p-0">
                            Or <a class="link-orange text-dark" href="signup.php">create a new account</a>
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