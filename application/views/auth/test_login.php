<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Falasifa Login</title>
    <link rel="icon" href="<?= base_url() ?>assets/images/falasifa-big-logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <style media="screen">
      body{
        background: #fafafa;
      }
      .logo{
        margin-top: 10%;
        margin-bottom: 20px;
        width: 35%;
        margin-left: auto;
        margin-right: auto;
      }
      .card{
        width: 35%;
        margin-left: auto;
        margin-right: auto;
      }
      .form-control{
        border-radius: 20px;
        padding: 20px;
      }
      @media (max-width:1000px)  {
        .card{
          width: 100%;
        }
        .logo{
          margin-left: auto;
          margin-right: auto;
          margin-top: 15%;
          margin-bottom: 10px;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">

      <div class="row h-100">
        <div class="col-lg-12 my-auto">
          <div class="text-center logo">
            <img src="https://1.bp.blogspot.com/-hCOxpmzCFSA/XTeyJFHHjVI/AAAAAAAASUM/LgVfwPTc_xMo1NyH3i6yObsDJzxVwsC9gCLcBGAs/s1600/Gojek%2BTerbaru.png" width="150" class="rounded" alt="">
          </div>
          <div class="card">
            <div class="card-body">

              <hr size="2" width="50">
              <h5 class="card-title text-center">Please Login</h5>
              <br>
              <div class="form-group">
                <input type="text" name="" class="form-control" placeholder="Username" value="">
              </div>

              <div class="form-group mt-2">
                <input type="password" name="" class="form-control" placeholder="Your Password" value="">
              </div>

              <div class="text-center mt-3">
                <button type="button" class="btn btn-success btn-block" name="button">Login Now</button>
              </div>

              <div class="text-center mt-3">
                <p>Don't Have an account ? <span class="text-success"><u>Register an account</u></span> </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
