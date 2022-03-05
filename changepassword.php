<?php

session_start();

require './database/config.php';

$cobj = new Admin();

if(isset($_POST['btn']))
{
    $opass = $_POST['opass'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $condition_arr = array("admin_email"=>$_SESSION['email']);
    $result = $cobj->select("tbl_admin","*",$condition_arr);

    $dpass = $result['0']['admin_password'];

    if($dpass == $opass)
    {
        if($pass == $cpass)
        {
            if($opass == $pass)
            {
                echo "<script>alert('Again old password does not allowed !');</script>";
            }else
            {
                $condition_arr = array("admin_password"=>$pass);
                
                $uq = $cobj->update("tbl_admin",$condition_arr,"admin_email",$_SESSION['email']);
                // this query y not execute:
                if($uq > 0)
                {
                    echo "<script>alert('Password Change Successfully !');</script>";
                }
            }
        }else
        {
            echo "<script>alert('pass and confirm Passwrod Does not match !');</script>";    
        }
    }else
    {
        echo "<script>alert('Old Passwrod Does not match !');</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>Admin</b>LTE
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form method="post">
      <div class="input-group mb-3">
          <input type="password" name="opass" class="form-control" placeholder="Old Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="btn" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
