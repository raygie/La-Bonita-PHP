<?php
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = mysqli_query($conn, "select * from admin_login where name ='" . $username . "'");
  if (mysqli_num_rows($sql)) {
    foreach ($sql as $data) {
      if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
      } else {
        header("Location: login.php?status=failed");
      }
    }
  } else {
    header("Location: login.php?status=failed");
  }
}