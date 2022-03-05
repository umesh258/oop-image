<?php

require './database/config.php';

if(isset($_GET['eid']))
{
  $eid = $_GET['eid'];
  
  $eobj = new Admin();
  $condition_arr = array("admin_id"=>$eid);
  $result = $eobj->select("tbl_admin","*",$condition_arr);
  
  
    if(isset($result['0']))
    {
      
      $id = $result['0']['admin_id'];
      $name = $result['0']['admin_name'];
      $email = $result['0']['admin_email'];
      $pass = $result['0']['admin_password'];
      $photo = $result['0']['admin_photo'];
      
    }

   if(isset($_POST['asubmit']))
   {
     $id = $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $newimg = $_FILES['photo']['name'];

     if($_FILES['photo']['name'] != '')
     {
        $filename = "adminimg/".$_FILES['photo']['name'];
            if(file_exists($filename))
            {
                //  how to print msg return $result;
            }else
            {
              $filepath = "adminimg/".$photo;
              unlink($filepath);
              $uobj = new Admin();
              move_uploaded_file($_FILES['photo']['tmp_name'],"adminimg/".$newimg);
              $condition_arr = array("admin_name"=>$name,"admin_email"=>$email,"admin_password"=>$pass,"admin_photo"=>$newimg);
              $uobj->update("tbl_admin",$condition_arr,"admin_id",$id);       
            }
     }else
     {
       $oldimg = $result['0']['admin_photo'];
       $uobj = new Admin();
       $condition_arr = array("admin_name"=>$name,"admin_email"=>$email,"admin_password"=>$pass,"admin_photo"=>$oldimg);
       $uobj->update("tbl_admin",$condition_arr,"admin_id",$id);  
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
                    <label for="exampleInputName"></label>
                    <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                  </div>
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="exampleInputName" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" value="<?php echo $pass ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
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
                        <span class="input-group-text"><img style="width: 50px;" src="adminimg/<?php echo $photo ?>"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="asubmit" class="btn btn-primary">Update</button>
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
