<!DOCTYPE html>
<html>
<head>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <style type="text/css">
        .bold {
            font-weight: bold;
            font-family: fantasy;
        }
    </style>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <h2 class="bold" align="center"> Universitas Nun Jauh Disana </h2>
    <h3 align="center"> Aplikasi Web Rekapitulasi Absen File CSV MS Teams </h3>

  </head>
</head>
<body>
    <div class="box-login">
        <div class="header-box">Silahkan Login</div>
        <br><br>
        <center>
            <form action="proses-login.php" method="post">
                Email<br>
                <input type="email" name="email" /><br>
                Password<br>
                <input type="password" name="password" /><br>
                <input type="submit" name="login" value="Login" />
            </form>
        </center>
    </div>
     <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>