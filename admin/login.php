<?php include 'classes/adminlogin.php';?>
<?php
$al = new adminLogin();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $admin = $_POST['email'];
  $pass  = $_POST['pass'];

  $login_chk = $al->adminLogin($admin,$pass);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Premium Quality Website">
  <meta name="author" content="ThemePixels">

  <title>Ecommerce Website Admin Login</title>

  <!-- vendor css -->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">

  <!-- Starlight CSS -->
  <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

  <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Ecommerce <span class="tx-info tx-normal">admin</span></div>
      <div class="tx-center mg-b-60">Ecommerce Website Admin Login</div>

      <form class="form-horizontal" action="login.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Email or Username" name="email" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" name="pass" required>
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
        <div class="tx-center tx-16 text-info pd-t-20 d-block">
          <?php if(isset($_SESSION['failed'])){
            echo $_SESSION['failed'];
            unset($_SESSION['failed']);
          }
          ?>
        </div>
        <div class="mg-t-30 tx-center">Not yet a member? <a href="register.php" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
    </form>
  </div><!-- d-flex -->


  <script src="../lib/jquery/jquery.js"></script>
  <script src="../lib/popper.js/popper.js"></script>
  <script src="../lib/bootstrap/bootstrap.js"></script>

</body>

</html>