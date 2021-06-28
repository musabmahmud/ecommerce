<?php include 'inc/header.php'; ?>
<?php include 'inc/breadcrumb.php'; ?>

<?php 
$email = Session::get("email");
?>
<!-- my account wrapper start -->
<div class="my-account-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Payment
                                    Method</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                <a href="#account-setting" data-toggle="tab"><i class="fa fa-user"></i> Setting</a>
                                <a href="?cusId=<?php Session::get("cusId"); ?>"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                            <!-- My Account Tab Menu End -->
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome text-capitalize">
                                            <p>Hello, <strong><?= Session::get("cusName"); ?></strong></p>
                                        </div>
                                        <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    
                                                    <tr>
                                                        
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="download" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Downloads</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th>Expire</th>
                                                        <th>Download</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Yes</td>
                                                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>HasTech - Profolio Business Template</td>
                                                        <td>Sep 12, 2018</td>
                                                        <td>Never</td>
                                                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Payment Method</h3>
                                        <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                    <h3>Account Profile</h3>
                                    <table class="table table-bordered table-striped">
                                            <?php
                                            $CusProfile = $user->CusProfile($email);
                                            if ($CusProfile) {
                                                $ProfileResult = $CusProfile->fetch_assoc();
                                            ?>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?= $ProfileResult['cusName']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?= $ProfileResult['email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><?= $ProfileResult['phone']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><i class="fa fa-map-marker"></i> <?= $ProfileResult['address']; ?> , <?= $ProfileResult['city']; ?> - <?= $ProfileResult['zip']; ?>, <?= $ProfileResult['country']; ?>.</td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_update'])) {
                                    $profileUpdate = $user->profileUpdate($_POST, $email);
                                }
                                ?>
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-setting" role="tabpanel">
                                    <div class="myaccount-content">
                                    <h3>Account Setting</h3>
                                        <?php if (isset($profileUpdate)) { ?>
                                            <div class="alert alert-dismissible bg-success text-capitalize">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <?php echo $profileUpdate;
                                                unset($profileUpdate);
                                                ?>
                                            </div>
                                        <?php  } ?>
                                        <div class="account-details-form">
                                            <form action="" method="post">
                                                <input type="hidden" name="email" value="<?= $email; ?>" />
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">Your Name</label>
                                                            <input type="text" id="first-name" name="cusName" placeholder="Your Name" value="<?= $cusName = Session::get("cusName");
                                                                                                                                                ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Address</label>
                                                            <input type="text" name="address" id="last-name" value="<?= $ProfileResult['address']; ?>" placeholder="Enter Your Location" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">City</label>
                                                            <input type="text" name="city" value="<?= $ProfileResult['city']; ?>" id="last-name" placeholder="Enter Your City" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Zip</label>
                                                            <input type="text" name="zip" value="<?= $ProfileResult['zip']; ?>" id="last-name" placeholder="Enter Your Postal Code" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Country</label>
                                                            <input type="text" name="country" value="<?= $ProfileResult['country']; ?>" id="last-name" placeholder="Enter Your Country" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="single-input-item">
                                                            <label for="last-name" class="required">Phone</label>
                                                            <input type="number" value="<?= $ProfileResult['phone']; ?>" name="phone" id="last-name" placeholder="Enter Your Contact No" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <button type="submit" name="profile_update" class="check-btn sqr-btn ">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
<!-- my account wrapper end -->
<?php include 'inc/footer.php'; ?>