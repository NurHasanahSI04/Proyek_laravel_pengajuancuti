<?php
session_start();

$nameErr = $usernameErr = $passwordErr = $konfpasswordErr = $authenticationErr = "";
$name = $username = $password = $konfpassword = '';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])) {
        $nameErr = 'Name tidak boleh kosong!';
    } else {
        $name = test_input($_POST['name']);
    }
    if (empty($_POST['username'])) {
        $usernameErr = 'Username tidak boleh kosong!';
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($_POST['password'])) {
        $passwordErr = 'Password tidak boleh kosong!';
    } else {
        $password = md5(test_input($_POST['password']));
    }
    if (empty($_POST['konfirmasi-password'])) {
        $konfpasswordErr = 'Konfirmasi Password tidak boleh kosong!';
    } else {
        $konfpassword = md5(test_input($_POST['password']));
    }

    $authenticated = false;

    if (!$nameErr && !$usernameErr && !$passwordErr && !$konfpasswordErr) {
        $sql = "SELECT * FROM user WHERE username='$username'";
        $query = $dbh->query($sql);
        $user = $query->fetchObject();

        if ($user->username === $username) {
            $authenticationErr = 'Username Sudah Dipakai';
        }

        if (!$authenticationErr) {
            $sql = "INSERT INTO user (username, name, password) VALUE (?,?,?)";
            $dbh->prepare($sql)->execute([$username, $name, $password]);
            $authenticated = true;
        }
    }

    if ($authenticated) {
        header("location: login.php");
    } else if (!$authenticationErr) {
        $authenticationErr = 'Pastikan Form Sudah Diisi Dengan Benar!';
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puskesmas | Register </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
<div class="register-box">
  <!-- /.register-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
        <p class="h1"><b>Puskesmas</b></p>
    </div>
    <div class="card-body">
      <p class="register-box-msg">Register a new Account</p>



    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
            <div class="input-group">
             <input name="name" type="name" class="form-control" placeholder="Name">
                <div class="input-group-append">
                     <div class="input-group-text">
                     <span class="fas fa-user-alt"></span>
                     </div>
                </div>
            </div>
            <span class="text-red"><?= $nameErr ?></span>
        </div>

        <div class="mb-3">
            <div class="input-group">
             <input name="username" type="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                     <div class="input-group-text">
                     <span class="fas fa-user-alt"></span>
                     </div>
                </div>
            </div>
            <span class="text-red"><?= $usernameErr ?></span>
        </div>

        <div class="mb-3">
           <div class="input-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
           </div>
           <span class="text-red"><?= $passwordErr ?></span>
        </div>

        <div class="mb-3">
           <div class="input-group">
            <input name="konfirmasi-password" type="password" class="form-control" placeholder="Konfirmasi Password">
              <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
           </div>
           <span class="text-red"><?= $konfpasswordErr ?></span>
        </div>

        <button type="submit" class="btn btn-danger btn-block">Register</button>
        <span class="d-block text-red text-center mt-1"><?= $authenticationErr ?></span>
      </form>


        <p class="mb-0 mt-2 text-center"><a href="login.php" class="text-center">Sign Your Account</a></p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/js/adminlte.min.js"></script>
</body>
</html>
