<?php include_once 'inc/header.php'; ?>
<!-- login register wrapper start -->
<div class="login-register-wrapper">
    <div class="container">
        <div class="member-area-from-wrap">
            <div class="row">
                <!-- Register Content Start -->
                <div class="col-lg-6 offset-3">
                    <div class="login-reg-form-wrap mt-md-34 mt-sm-34 mt-50 mb-50">
                        <h2>Singup Form</h2>
                        <form action="#" method="post">
                            <div class="single-input-item">
                                <input type="text" placeholder="Full Name" name="cusName" required />
                            </div>
                            <div class="single-input-item">
                                <input type="email" placeholder="Enter your Email" name="email"  required />
                            </div>
                            <div class="single-input-item">
                                <input type="password" name="pass" autocomplete="current-password" required="" id="id_password">
                                <i class="fa fa-eye" id="togglePassword" style="float: right;float: right;margin-top: -32px;margin-right: 10px;position: relative;z-index: 2;"></i>
                            </div>
                            <div class="single-input-item">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="offset-3"></div>
                <!-- Register Content End -->
            </div>
        </div>
    </div>
</div>
<!-- login register wrapper end -->
<script>
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
<?php include_once 'inc/footer.php'; ?>