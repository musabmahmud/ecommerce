<?php include_once 'inc/header.php'; ?>
<!-- login register wrapper start -->
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Login Content Start -->
                <div class="col-lg-12">
                    <div class="login-reg-form-wrap">
                        <h2>Sign In</h2>
                        <form action="#" method="post">
                            <div class="single-input-item">
                                <input type="email" placeholder="Email or Username" required />
                            </div>
                            <div class="single-input-item">
                                <input type="password" placeholder="Enter your Password" required />
                            </div>
                            <div class="single-input-item">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                        </div>
                                    </div>
                                    <a href="#" class="forget-pwd">Forget Password?</a>
                                </div>
                            </div>
                            <div class="single-input-item">
                                <button class="sqr-btn">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login Content End -->

            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->
<?php include_once 'inc/footer.php'; ?>