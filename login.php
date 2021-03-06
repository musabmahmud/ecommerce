<?php include_once 'inc/header.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $Login = $user->customer_login($_POST);
}

?>
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Register Content Start -->
                <div class="col-lg-4 offset-lg-4">
                    <div class="login-reg-form-wrap mt-50 mb-50">
                        <h2>Login Form</h2>
                        <?php if (isset($Login)) { ?>
                            <div class="alert alert-dismissible bg-danger text-capitalize">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $Login;
                                unset($Login);
                                ?>
                            </div>
                        <?php  }?>
                        <form action="" method="post">
                            <div class="single-input-item">
                                <input type="email" placeholder="Enter your Email" name="email"  required />
                            </div>
                            <div class="single-input-item">
                                <input type="password" name="pass" placeholder="Enter your Password" required="" id="id_password">
                                <i class="fa fa-eye" id="togglePassword" style="float: right;float: right;margin-top: -32px;margin-right: 10px;position: relative;z-index: 2;"></i>
                            </div>
                            <div class="single-input-item">
                                <a href="register.php" class="text-capitalize">Create a new account??</a>
                                <button type="submit" name="login" class="btn btn-danger d-block mt-10">login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="offset-lg-4"></div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->
<?php include_once 'inc/footer.php'; ?>