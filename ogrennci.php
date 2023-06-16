<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kullanıcı giriş</title>
  <style>
		body {
			background-image: url("image/cicek.jpg");
			background-size: cover;
		}

	</style>
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

<!-- <h1>Hoşgeldiniz</h1>
	<p>Lütfen giriş yapmak istediğiniz kullanıcı türünü seçin:</p> -->
	<div class="button-container" style="text-align:center; margin-top:200px;">
		<button style="width: 300px;"type="submit" class="btn btn-block btn-danger" onclick="location.href='login.php'">Öğrenci Girişi</button>
		<button type="submit" class="btn btn-block btn-danger"onclick="location.href='akademisyen.php'">Akademisyen Girişi</button>
		<button type="submit" class="btn btn-block btn-danger" onclick="location.href='yonetici.php'">Yönetici Girişi</button>
	</div>

      <div class="social-auth-links text-center mt-2 mb-3">
        <form action="https://www.google.com" method="get" class="mt-2">
        <button type="submit" class="btn btn-block btn-danger">
            <i class="fab fa-google mr-2"></i> Google+ ile devam et
         </button>
         </form>
      </div>

    


</body>
</html>