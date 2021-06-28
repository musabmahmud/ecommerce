<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/breadcrumb.php'; ?>

<?php
$cartCheck = $cart->cartCheck();
if ($cartCheck == FALSE) {
    echo "<script>window.location = 'shop.php'</script>;";
}
$email = Session::get("email");
?>

<!-- checkout main wrapper start -->
<div class="checkout-page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (empty($email)) {
                ?>
                    <!-- Checkout Login Start -->
                    <div class="checkoutaccordion" id="checkOutAccordion">
                        <div class="card">
                            <h3>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click Here To Login</span></h3>

                            <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                    <div class="login-reg-form-wrap mt-20">
                                        <div class="row">
                                            <div class="col-lg-7 m-auto">
                                                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                                                    $Login = $user->customer_login($_POST);
                                                } ?>
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input-item">
                                                                <input type="email" name="email" placeholder="Enter your Email" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="single-input-item">
                                                                <input type="password" name="pass" placeholder="Enter your Password" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                            <div class="remember-meta">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="rememberMe" required />
                                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                                </div>
                                                            </div>

                                                            <a href="#" class="forget-pwd">Forget Password?</a>
                                                        </div>
                                                    </div>

                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn" name="login">Login</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Login End -->
                <?php } ?>
            </div>
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['order'])) {
            $getOrder = $cart->getOrder($_POST);
        }
        ?>
        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-5">
                    <p><?php if (isset($getOrder)) {
                            echo $getOrder;
                            unset($getOrder);
                            } 
                    ?></p>
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form action="" method="post">
                            <?php
                            $CusProfile = $user->CusProfile($email);
                            if ($CusProfile && !empty($email)) {
                                $ProfileResult = $CusProfile->fetch_assoc();
                            ?>
                                <input type="hidden" name="email" value="<?=$email;?>" />
                                <div class="single-input-item">
                                    <label for="first-name" class="required">Your Name</label>
                                    <input type="text" id="first-name" name="cusName" placeholder="Your Name" value="<?= $ProfileResult['cusName']; ?>" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-address" class="required">Address</label>
                                    <input type="text" name="address" id="last-address" value="<?= $ProfileResult['address']; ?>" placeholder="Enter Your Location" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-name" class="required">City</label>
                                    <input type="text" name="city" value="<?= $ProfileResult['city']; ?>" id="last-name" placeholder="Enter Your City" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-name" class="required">Zip</label>
                                    <input type="int" name="zip" value="<?= $ProfileResult['zip']; ?>" id="last-name" placeholder="Enter Your Postal Code" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-name" class="required">Country</label>
                                    <input type="text" name="country" value="<?= $ProfileResult['country']; ?>" id="last-name" placeholder="Enter Your Country" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-name" class="required">Phone</label>
                                    <input type="number" value="<?= $ProfileResult['phone']; ?>" name="phone" id="last-name" placeholder="Enter Your Contact No" />
                                </div>
                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="single-input-item">
                                    <label for="first-name" class="required">Your Name</label>
                                    <input type="text" id="first-name" name="cusName" placeholder="Your Name" />
                                </div>
                                <div class="single-input-item">
                                    <label for="email" class="required">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Email Address" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-address" class="required">Address</label>
                                    <input type="text" name="address" id="last-address" placeholder="Enter Your Location" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-city" class="required">City</label>
                                    <input type="text" name="city" id="last-city" placeholder="Enter Your City" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-Zip" class="required">Zip</label>
                                    <input type="text" name="zip" id="last-Zip" placeholder="Enter Your Postal Code" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-country" class="required">Country</label>
                                    <input type="text" name="country" id="last-country" placeholder="Enter Your Country" />
                                </div>
                                <div class="single-input-item">
                                    <label for="last-phone" class="required">Phone</label>
                                    <input type="number" name="phone" id="last-phone" placeholder="Enter Your Contact No" />
                                </div>
                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            <?php } ?>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method mt-20">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Direct Bank Transfer</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account..</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbkash" name="paymentmethod" value="bkash" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbkash">Bkash/Nagad/Roket</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bkash">
                                        <p> Bkash : +8801630858100<br>
                                            Nagad : +8801630858100<br>
                                            Roket : +8801630858100</p>
                                        <p>Send Money and In reference box : type your Mail or Contact</p>
                                    </div>
                                </div>
                            </div>
                            <div class="summary-footer-area mt-30">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="terms" required />
                                    <label class="custom-control-label" for="terms">I have read and agree to the website <a href="index.html">terms and conditions.</a></label>
                                </div>
                            </div>
                            <button type="submit" name="order" class="check-btn sqr-btn d-block text-center text-white mt-30 mb-30">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-7">
                <div class="order-summary-details mt-md-26 mt-sm-26">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content mb-sm-4">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered table-striped">
                                <tr class="bg-danger text-white">
                                    <th>Products</th>
                                    <th>Total</th>
                                    <th>Image</th>
                                </tr>
                                <?php
                                $cartDetails = $cart->cartDetails();
                                $sum = 0;
                                $totalSum = 0;
                                if ($cartDetails) {
                                    $sum = 0;
                                    $i = 0;
                                    while ($cartResult = $cartDetails->fetch_assoc()) {
                                        $i++; ?>
                                        <tr>
                                            <td><a href="product_details.php?productId=<?= $cartResult['productId'] ?>">
                                                    <?= $cartResult['productName']; ?> <strong> × <?= $cartResult['quantity']; ?></strong></a></td>


                                            <td>$<?= $cartResult['price']; ?> × <?= $cartResult['quantity']; ?> = $<?= $cartResult['price'] * $cartResult['quantity']; ?>
                                            </td>
                                            <td class="pro-thumbnail">
                                                <a href="product_details.php?productId=<?= $cartResult['productId'] ?>"><img class="img-fluid" src="assets/img/product/<?= $cartResult['image']; ?>" width="50" height="50" alt="Product" /></a>
                                            </td>
                                        </tr>
                                <?php
                                        $total = $cartResult['price'] * $cartResult['quantity'];
                                        $totalSum = $sum + $total;
                                    }
                                } ?>
                                <tr>
                                    <td>Sub Total</td>
                                    <td><strong>$<?= $totalSum; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Vat</td>
                                    <td class="d-flex justify-content-center">
                                        <ul class="shipping-type">
                                            <li>
                                                10%
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td class="text-danger fa-2x"><strong>$<?php
                                                                            $vat =  $totalSum * 0.1;
                                                                            $totalSum = $totalSum + $vat;
                                                                            echo $totalSum; ?>
                                        </strong>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout main wrapper end -->
<?php include_once 'inc/footer.php'; ?>