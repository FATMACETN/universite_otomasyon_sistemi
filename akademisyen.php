
<?php
session_start ();
ob_start();
  include_once 'data/class.users.php';
  $app = new AdminUsersClass();
  
  if (isset($_POST['login'])) {
    $mail     = trim($app->getSecurity($_POST['mail']));
    $password = trim($app->getSecurity($_POST['password']));
    

    
    if (empty($mail) && empty($password)) {
      print '<div class="alert alert-danger">Boş alan bırakmayınız</div>';
    } else {
      $users = $app->getUser($mail);
      

      if (isset($users['password'])) {
      if (password_verify($password, $users['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['mail'] = $users['mail'];
        $_SESSION['firstname'] = $users['firstname'];
        $_SESSION['lastname'] = $users['lastname'];
        $_SESSION['user_id'] = $users['user_id'];
        $_SESSION['bolum'] = $users['bolum']; 
        $_SESSION['fakulte'] = $users['fakulte'];
        $_SESSION['sınıf'] = $users['sınıf'];
        $_SESSION['tel'] = $users['tel'];
        $_SESSION['tc'] = $users['tc'];
        $_SESSION['unvan'] = $users['unvan'];
        $_SESSION['but'] = $users['but'];
        $_SESSION['title'] = $users['title'];
        $_SESSION['decription'] = $users['description'];

        header('location: ./index.php');

      } else { print '<div class="alert alert-danger">Bilgiler Hatalı</div>'; }
    } else { print '<div class="alert alert-danger">Bilgiler Hatalı</div>'; }
    }  
}
?>



<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kullanıcı Girişi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Akademisyen Girişi</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Lütfen Oturum Açınız</p>

      <form  method="post">
        <input type="hidden" name="login" value="1001">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="mail" placeholder="mail adresiniz..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Şifreniz..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Oturum Aç</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>