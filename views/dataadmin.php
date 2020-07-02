<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Data Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    </nav>
  </header>
<aside class="main-sidebar">

  <?php include("sidebar.php") ?>


</aside>


<div class="content-wrapper">

  <selection class="content-header">
    <h1>
      DashBoard Admin
      <small>Data Table</small>
    </h1>

  </selection>

  <!-- main content-->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table Pegawai</h3>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#modal-default">Tambah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Pegawai</th>
                  <th>Username</th>
                  <th>Password</th>
                </tr>
                </thead>
                <tbody>
<?php
require '../models/modelAdmin.php';
$objAdmin=new modelAdmin();
$objAdmin->select();
$dataAdmin=$objAdmin->getData();
foreach ($dataAdmin as $key) 
{
?>
                <tr>
                  <td><?php echo $key['ID_ADMIN']; ?></td>
                  <td><?php echo $key['USERNAME']; ?></td>
                  <td><?php echo $key['PASSWORD']; ?></td>
                  <td>
                    <a class="btn btn-social-icon" title="Edit"><i class="fa fa-edit" data-toggle="modal" href="#mymodal<?php echo $key['ID_ADMIN']; ?>"></i></a>
                    <a class="btn btn-social-icon" title="Detail"><i class="fa fa-user"></i></a>
                    <a class="btn btn-social-icon" title="Delete" href="../proses/prosesAdmin.php?aksi=hapus&namaadmin=<?php echo $key['ID_ADMIN']; ?>"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
        <div class="modal fade" id="mymodal<?php echo $key['ID_ADMIN']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data Pegawai</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesAdmin.php?aksi=edit" method="post">
                  <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NO</label>
                    <input type="input" class="form-control" id="admin" name="admin" value="<?php echo $key['ID_ADMIN']; ?>">
                  </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Username</label>
                    <input type="input" class="form-control" id="username" name="username" value="<?php echo $key['USERNAME']; ?>">
                  </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <input type="input" class="form-control" id="password" name="password" value="<?php echo $key['PASSWORD']; ?>">
                  </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Data Pegawai</button>
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
          </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php
 }
 ?>
                </tfoot>
              </table>
            </div>


        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Data</h4>
              </div>
              <div class="modal-body">
                <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="../proses/prosesAdmin.php?aksi=tambah" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">NO</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputIdadmin" name="inputIdadmin">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputUsername" name="inputUsername">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="input" class="form-control" id="inputPassword" name="inputPassword">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
          </div>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <!--content-->
</div>

  <footer class="main-footer">
    
  </footer>






  <div class="control-sidebar-bg"></div>
</div>


<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>