<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a = 1;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <section class="content mt-5">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark mt-2">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <a href="all-products.php" class="small-box-footer">
                                <div class="small-box" style="background-color: #ff9933; color:black;">
                                    <div class="inner">
                                        <h4> All Products</h4>
                                        <h6>Total no:</h6>

                                        <?php
                    $query = "SELECT * from products";
                    $query_run = mysqli_query($conn, $query);
                    if ($total = mysqli_num_rows($query_run)) {
                      echo '<h3>' . $total . '</h3>';
                    } else {
                      echo '<h3>0</h3>';
                    }
                    ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-list"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <a href="retail-sample.php" class="small-box-footer">
                                <div class="small-box" style="background-color: #cce0ff; color:black;">
                                    <div class="inner">
                                        <h4>Retail</h4>
                                        <h6>Total no:</h6>

                                        <?php
                    $query = "SELECT * from products WHERE prod_category = 'Retail/Samples'";
                    $query_run = mysqli_query($conn, $query);
                    if ($total = mysqli_num_rows($query_run)) {
                      echo '<h3>' . $total . '</h3>';
                    } else {
                      echo '<h3>0</h3>';
                    }
                    ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-box"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <a href="rebranding.php" class="small-box-footer">
                                <div class="small-box" style="background-color: #cce0ff; color:black;">
                                    <div class="inner">
                                        <h4>Rebranding</h4>
                                        <h6>Total no:</h6>

                                        <?php
                    $query = "SELECT * from products WHERE prod_category = 'Rebranding/Wholesale'";
                    $query_run = mysqli_query($conn, $query);
                    if ($total = mysqli_num_rows($query_run)) {
                      echo '<h3>' . $total . '</h3>';
                    } else {
                      echo '<h3>0</h3>';
                    }
                    ?>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-box"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
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