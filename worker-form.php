<?php

require './database/config.php';
$sobj = new Admin();

if(isset($_POST['wsubmit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['add'];
    $area = $_POST['area'];
    $cat = $_POST['category'];
    $photo = $_FILES['photo']['name'];
    $exp = $_POST['exp'];
    $abt = $_POST['abt'];
    $time = $_POST['time'];
    $charge = $_POST['charge'];

    if($photo != '')
    {
        $filename = "workerimg/".$_FILES['photo']['name'];
        if(file_exists($filename))
        {
            echo "<script>alert('Aleredy Exist');</script>";
        }else
        {
            move_uploaded_file($_FILES['photo']['tmp_name'],"workerimg/".$photo);
            
            $condition_arr = array("worker_name"=>$name,"worker_email"=>$email,"worker_password"=>$pass,"worker_gender"=>$gender,"worker_dob"=>$dob,"worker_address"=>$address,"area_id"=>$area,"category_id"=>$cat,"worker_photo"=>$photo,"worker_exp"=>$exp,"worker_aboutme"=>$abt,"worker_time"=>$time,"worker_charge"=>$charge);
    
                $sobj->insert("tbl_workermaster",$condition_arr);
        }
    }
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gender</label>
                    <input type="radio" name="gender"  id="exampleInputPassword1" value="1">Male
                    <input type="radio" name="gender"  id="exampleInputPassword1" value="0">Female
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">DOB</label>
                    <input type="date" name="dob" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea name="add" class="form-control" id="exampleInputPassword1" placeholder="address"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Area</label>
                    <select name="area" class="form-control" id="exampleInputPassword1" >
                        <?php
                           $result = $sobj->select("tbl_area","*");
                            foreach($result as $row)
                            {
                                echo "<option value='{$row['area_id']}'>{$row['area_name']}</option>";
                            }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category" class="form-control" id="exampleInputPassword1">
                            <?php 
                                $result = $sobj->select("tbl_category","*");
                                foreach($result as $row)
                                {
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            ?>
                        </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Exp</label>
                    <input type="text" name="exp" class="form-control" id="exampleInputPassword1" placeholder="Exp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Aboutme</label>
                    <textarea name="abt" class="form-control" id="exampleInputPassword1" placeholder="aboutme"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Time</label>
                    <input type="time" name="time" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Charges</label>
                    <input type="text" name="charge" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="wsubmit" class="btn btn-primary">Submit</button>
                  <a href="worker-table.php">View</a>
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
