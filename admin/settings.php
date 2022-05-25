<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a = 2;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php'; ?>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include 'includes/topbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include 'includes/sidebar.php'; ?>
        <?php

    $resultt = mysqli_query($conn, "SELECT * FROM settings where id='1'");
    $roww = mysqli_fetch_array($resultt);
    $edit = $roww['id'];

    if (isset($_POST['publise'])) {
      extract($_POST);
      if ($edit == '') {
        $insertdata = mysqli_query($conn, "INSERT INTO settings(phone,email,address,facebook,twitter,linkedin,instagram,youtube,tiktok)VALUES('$phone','$email','$address','$facebook','$twitter','$linkedin','$instagram','$youtube','$tiktok')");
        echo "<script>alert('Posted Successfully');</script>
        <script>window.location.href = 'settings.php'</script>";
      } else {
        $insertdata = mysqli_query($conn, "UPDATE settings SET phone='$phone',email='$email',address='$address',facebook='$facebook',twitter='$twitter',linkedin='$linkedin',instagram='$instagram',youtube='$youtube',tiktok='$tiktok' where id=" . $edit . "");
        echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'settings.php'</script>";
      }
    }
    ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content mt-5">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark mt-2">Settings</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" value="<?php echo $roww["phone"]; ?>" type="text"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Company Email</label>
                                        <input name="email" value="<?php echo $roww["email"]; ?>" type="text"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Full Address with pincode</label>
                                        <input name="address" value="<?php echo $roww["address"]; ?>" type="text"
                                            class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input name="facebook" value="<?php echo $roww["facebook"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input name="twitter" value="<?php echo $roww["twitter"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input name="linkedin" value="<?php echo $roww["linkedin"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input name="instagram" value="<?php echo $roww["instagram"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>YouTube</label>
                                        <input name="youtube" value="<?php echo $roww["youtube"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>Tiktok</label>
                                        <input name="tiktok" value="<?php echo $roww["tiktok"]; ?>" type="text"
                                            class="form-control" placeholder="URL">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="card-header">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <button type="submit" name="publise"
                                                    class="btn btn-warning btn-lg">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
                <!-- ./row -->
            </section>
            <!-- /.content -->
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="assets/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/js/demo.js"></script>
</body>

</html>