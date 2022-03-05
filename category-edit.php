<?php

require './database/config.php';

$sobj=new Admin();

$ceid = $_GET['ceid'];
$condition=array("category_id"=>$ceid);
$result = $sobj->select("tbl_category","*",$condition);

if(isset($_POST['csubmit']))
{
    $id=$_POST['id'];
    $name=$_POST['name'];
    $photo=$_FILES['photo']['name'];

    if($_FILES['photo']['name'] != '')
    {
        $filename="categoryimg/".$_FILES['photo']['name'];
        if(file_exists($filename))
        {
            echo "<script>alert('File is aleredy Exist');</script>";
        }elseif($result['0']['category_photo'] != '')
        {
            $filepath="categoryimg/".$result['0']['category_photo'];
            unlink($filepath);
            move_uploaded_file($_FILES['photo']['tmp_name'],"categoryimg/".$photo);
            $condition=array("category_name"=>$name,"category_photo"=>$photo);
            $result = $sobj->update("tbl_category",$condition,"category_id",$id);
            if($result > 0)
            {
                echo "<script>alert('Category Recoed Updated With Images !');window.location='category-table.php';</script>";
            }
        }else
        {
            move_uploaded_file($_FILES['photo']['tmp_name'],"categoryimg/".$photo);
            $condition=array("category_name"=>$name,"category_photo"=>$photo);
            $result = $sobj->update("tbl_category",$condition,"category_id",$id);
            if($result > 0)
            {
                echo "<script>alert('Category Recoed Updated With Images but null !');window.location='category-table.php';</script>";
            }
        }
    }else
    {
        $oldimg=$result['0']['category_photo'];
        $condition=array("category_name"=>$name,"category_photo"=>$oldimg);
            $result = $sobj->update("tbl_category",$condition,"category_id",$id);
            if($result > 0)
            {
                echo "<script>alert('Category Recoed Updated Without Images !');window.location='category-table.php';</script>";
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
            <h1>Category Edit</h1>
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
                <h3 class="card-title">Category Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="hidden" name="id" value="<?php echo $result['0']['category_id'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="<?php echo $result['0']['category_name'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                        <span class="input-group-text"><img style="width: 50px;" src="categoryimg/<?php echo $result['0']['category_photo'] ?>"></span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="csubmit" class="btn btn-primary">Update</button>
                  <button type="submit" class="btn btn-danger"><a href='category-table.php'>Cancel</a></button>
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
