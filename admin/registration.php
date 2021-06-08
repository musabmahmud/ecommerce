<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Premium Quality Website">
  <meta name="author" content="ThemePixels">

  <title>Ecommerce Website Admin Registration</title>

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
          <input type="text" class="form-control" placeholder="Enter your Name" name="name" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Username" name="email" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your Email" name="email" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="repassword" class="form-control" placeholder="Confirm your password" name="repassword" required>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
        <div class="tx-center tx-16 text-info pd-t-20 d-block">
          <?php if(isset($_SESSION['failed'])){
            echo $_SESSION['failed'];
            unset($_SESSION['failed']);
          }
          ?>
        </div>
        <div class="mg-t-30 tx-center">Already a member? <a href="login.php" class="tx-info">Sign In</a></div>
    </div><!-- login-wrapper -->
    </form>
  </div><!-- d-flex -->


  <script src="../lib/jquery/jquery.js"></script>
  <script src="../lib/popper.js/popper.js"></script>
  <script src="../lib/bootstrap/bootstrap.js"></script>

</body>

</html>