<?php
include 'includes/sessions.php';
include 'includes/connection.php';

$a=12;

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
  <?php include 'includes/sidebar.php'; 
    $result = $conn->query("SELECT * FROM admin_login");
    $admin = $result->fetch_all(MYSQLI_ASSOC);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-5">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark mt-2">Account Profile</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4">
            <div class="card card-outline card-info">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <h2><?php echo $_SESSION["username"]; ?></h2>
                <h4>Administrator</h4>
                </div>
                <div class="text-center mb-5">
                  <img src="assets/img/Labonita.png" width="375">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="col-lg-12">
                <div class="card card-outline card-info">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview pt-3" id="profile-name">
                                    <div class="row mb-3">
                                    <label for="newName" class="col-md-4 col-lg-3 col-form-label">New Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="newName" type="text" class="form-control" id="newName" required>
                                    </div>
                                    </div>
                                    <div class="row mb-3">
                                    <label for="renewName" class="col-md-4 col-lg-3 col-form-label">Re-enter New Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renewName" type="text" class="form-control" id="renewName" required>
                                    </div>
                                    </div>
                                    <div class="text-center" id="message">
                                    <!-- Warning message -->
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="changeName">Change Name</button>
                                    </div>
                            <!-- End Change Name Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-outline card-info">
                    <div class="card-body pt-3">
                        <div class="tab-content pt-2">
                        <div class="tab-pane fade show active pt-3" id="profile-change-password">
                    <!-- Change Password Form -->

                        <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="newPassword" type="password" class="form-control" id="newPassword">
                        </div>
                        </div>

                        <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="renewPassword" type="password" class="form-control" id="renewPassword">
                        </div>
                        </div>
                        <div class="text-center" id="pwmessage">
                        </div>
                        <div class="modal-footer">
                        <button  class="btn btn-primary" id="changePassword">Change Password</button>
                        </div>
                    <!-- End Change Password Form -->

                    </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
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
<!-- Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$(document).ready(function(){
  $('#changeImage').click(function(){
    var inputprod_image=$('#inputprod_image').val();
    $.ajax({
      url:"includes/updateprofilepic.php",
      method:"POST",
      data:{inputprod_image:inputprod_image},
      success:function(data){      
        $('#picmessage').html(data);
      }
    })
  })
})
$(document).ready(function(){
  $('#changeName').click(function(){
    var name=$('#newName').val();
    var renewname=$('#renewName').val();
    $.ajax({
      url:"includes/updatename.php",
      method:"POST",
      data:{newName:name,renewName:renewname},
      success:function(data){      
        $('#message').html(data);
      }
    })
  })
})
$(document).ready(function(){
  $('#changePassword').click(function(){
    var currentpw=$('#currentPassword').val();
    var newpw=$('#newPassword').val();
    var renewpw=$('#renewPassword').val();
    $.ajax({
      url:"includes/updatepassword.php",
      method:"POST",
      data:{currentpw:currentpw,newpw:newpw,renewpw:renewpw},
      success:function(data){      
        $('#pwmessage').html(data);
      }
    })
  })
})
  </script>
</body>
</html>
