<?php

require './database/config.php';

$sobj = new Admin();

if(isset($_GET['did']))
{
    $did = $_GET['did'];
    $condition_arr = array("worker_id"=>$did);
    $result = $sobj->select("tbl_workermaster","worker_photo",$condition_arr);
    foreach($result as $row)
    {
        $filepath = "workerimg/".$row['worker_photo'];
        unlink($filepath);
    }
    $condition_arr=array("worker_id"=>$did);
   $result =  $sobj->delete("tbl_workermaster",$condition_arr);
}


$result = $sobj->select("tbl_workermaster","*");


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><button type="submit" class="btn btn-primary" onclick="window.location='worker-form.php';">Add Data</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Pass</th>
                    <th>Gender</th>
                    <th>Dob</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Exp</th>
                    <th>Abt</th>
                    <th>Time</th>
                    <th>Charge</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($result as $row)
                    {
                        $condition_arr = array("area_id"=>$row['area_id']);
                        $fr = $sobj->select("tbl_area","area_name",$condition_arr);
                        
                        foreach($fr as $val)
                        {
                            $afr = $val;
                        }

                        $condition_arr = array("category_id"=>$row['category_id']);
                        $cfr = $sobj->select("tbl_category","category_name",$condition_arr);

                        foreach($cfr as $val)
                        {
                            $cr = $val;
                        }

                        if($row['worker_gender'] == "1")
                        {
                            $gender = "Male";
                        }else
                        {
                            $gender = "Female";
                        }

                     ?>
                  <tr>
                    <td><?php echo $row['worker_id'] ?></td>
                    <td><?php echo $row['worker_name'] ?></td>
                    <td><?php echo $row['worker_email'] ?></td>
                    <td><?php echo $row['worker_password'] ?></td>
                    <td><?php echo $gender ?></td>
                    <td><?php echo $row['worker_dob'] ?></td>
                    <td><?php echo $row['worker_address'] ?></td>
                    <td><?php echo $afr['area_name'] ?></td>
                    <td><?php echo $cr['category_name'] ?></td>
                    <td><img style="width: 50px;" src="workerimg/<?php echo $row['worker_photo'] ?>"></td>
                    <td><?php echo $row['worker_exp'] ?></td>
                    <td><?php echo $row['worker_aboutme'] ?></td>
                    <td><?php echo $row['worker_time'] ?></td>
                    <td><?php echo $row['worker_charge'] ?></td>
                    
                    <td><?php echo "<a href='worker-edit.php?eid={$row['worker_id']}'>Edit</a> |<a href='worker-table.php?did={$row['worker_id']}'>Delete</a>"; ?></td>
                  </tr>
                  <?php } ?>
                    </tbody>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
