<?php

require './database/config.php';
$eid = $_GET['eid'];
$ueobj = new Admin();

$condition_arr = array("user_id"=>$eid);
$result = $ueobj->select("tbl_usermaster","*",$condition_arr);

$id = $result[0]["user_id"];
$name = $result[0]["user_name"];
$gender = $result[0]["user_gender"];
$email = $result[0]["user_email"];
$mob = $result[0]["user_mobile"];
$add = $result[0]["user_address"];
$pass = $result[0]["user_password"];

if(isset($_POST['usubmit']))
{
    
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $mob = $_POST["mob"];
    $add = $_POST["address"];
    $pass = $_POST["pass"];
       
    $uuobj = new Admin();
    $condition_arr = array("user_name"=>$name,"user_gender"=>$gender,"user_email"=>$email,"user_mobile"=>$mob,"user_address"=>$add,"user_password"=>$pass);

    $uuobj->update("tbl_usermaster",$condition_arr,"user_id",$id);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php

require './themeportion/menu.php';
require './themeportion/sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <input type="radio" name="gender" value="1" <?php if($gender == 1) { echo "checked";}  ?> id="exampleInputEmail1" placeholder="Enter email">Male
                    <input type="radio" name="gender" value="0" <?php if($gender == 0) { echo "checked";}  ?> id="exampleInputEmail1" placeholder="Enter email">Female
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" name="mob" value="<?php echo $mob ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea type="text" name="address"  class="form-control" id="exampleInputEmail1" placeholder="Enter email"><?php echo $add ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" value="<?php echo $pass ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="usubmit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
