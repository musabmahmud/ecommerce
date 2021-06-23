<?php include 'inc/header.php'; ?>
<?php include 'inc/breadcrumb.php'; ?>

<?php
if (!isset($_GET['productId'])) {
    echo "<script>window.location = 'shop.php'</script>;";
} else {
    $id = $_GET['productId'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quantity = $_POST['quantity'];
    $addCart = $cart->addTocart($quantity, $id);
}

?>
<!-- product details wrapper start -->
<div class="product-details-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php
                $pdDetails = $pd->productDetails($id);
                if ($pdDetails) {
                    $i = 0;
                    while ($pdResult = $pdDetails->fetch_assoc()) {
                        $i++;
                ?>
                        <!-- product details inner Start -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product-large-slider mb-20 slick-arrow-style_2">
                                        <div class="pro-large-img img-zoom" id="img1">
                                            <img src="assets/img/product/<?= $pdResult['image']; ?>" alt="" />
                                        </div>
                                        <div class="pro-large-img img-zoom" id="img2">
                                            <img src="assets/img/product/<?= $pdResult['relatedImage']; ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['image']; ?>" alt="" /></div>
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['relatedImage']; ?>" alt="" /></div>
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['image']; ?>" alt="" /></div>
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['relatedImage']; ?>" alt="" /></div>
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['image']; ?>" alt="" /></div>
                                        <div class="pro-nav-thumb"><img src="assets/img/product/<?= $pdResult['relatedImage']; ?>" alt="" /></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details-des mt-md-34 mt-sm-34">
                                        <h3><?= $pdResult['productName']; ?></h3>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                        <div class="customer-rev">
                                            <a href="#">(1 customer review)</a>
                                        </div>
                                        <table class="availability">
                                            <tr>
                                                <td>
                                                    <h5>Availability:</h5>
                                                </td>
                                                <td>1 in stock</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Category:</h5>
                                                </td>
                                                <td><span><?= $pdResult['catName']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Brand:</h5>
                                                </td>
                                                <td><span><?= $pdResult['brandname']; ?></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>price:</h5>
                                                </td>
                                                <td><span class="regular-price">$<?= $pdResult['price']; ?></span></td>
                                            </tr>
                                        </table>
                                        <p><?= $pdResult['body']; ?></p>
                                        <form action="" method="post" id="buy">
                                            <div class="quantity-cart-box d-flex align-items-center text-center">
                                                <div class="quantity">
                                                    <div class="pro-qty"><input type="int" name="quantity" value="1"></div>
                                                </div>
                                                <div class="action_link">
                                                    <a type="submit" href="" onclick="document.getElementById('buy').submit(); return false;" class="buy-btn" name="buy">add to cart<i class="fa fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="useful-links mt-20">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="fa fa-refresh"></i>compare</a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart-o"></i>wishlist</a>
                                        </div>
                                        <div class="share-icon mt-20">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->
                <?php }
                } ?>
            </div>
            <!-- sidebar start -->
            <div class="col-lg-3">
                <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                    <!-- featured category start -->
                    <div class="sidebar-widget mb-22">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>featured</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="4">
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">Virtual Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img10.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">simple Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.php">
                                            <img src="assets/img/product/product-img12.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.php">external Product 01</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $140.00
                                            </div>
                                            <div class="old-price">
                                                <del>$160.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                            </div> <!-- end single item column -->
                        </div>
                    </div>
                    <!-- featured category end -->

                    <!-- manufacturer start -->
                    <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-10">
                            <h3>Manufacturers</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <ul>
                                <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span></li>
                                <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- manufacturer end -->

                    <!-- product tag start -->
                    <div class="sidebar-widget mb-22">
                        <div class="sidebar-title mb-20">
                            <h3>tag</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="product-tag">
                                <a href="#">camera</a>
                                <a href="#">computer</a>
                                <a href="#">tablet</a>
                                <a href="#">watch</a>
                                <a href="#">smart phones</a>
                                <a href="#">handbag</a>
                                <a href="#">shoe</a>
                                <a href="#">men</a>
                            </div>
                        </div>
                    </div>
                    <!-- product tag end -->

                    <!-- sidebar banner start -->
                    <div class="sidebar-widget mb-22">
                        <div class="img-container fix img-full mt-30">
                            <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->
        </div>
        <!-- product details wrapper end -->

        <!-- brand area start -->
        <div class="brand-area pt-28 pb-30 pt-md-14 pt-sm-14">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30">
                            <div class="title-icon">
                                <i class="fa fa-crop"></i>
                            </div>
                            <h3>Popular Brand</h3>
                        </div> <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="brand-active slick-padding slick-arrow-style">
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br1.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br2.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br3.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br5.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br6.png" alt=""></a>
                            </div>
                            <div class="brand-item text-center">
                                <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->
        <h1><?php
            echo $_SERVER["PHP_SELF"];
            ?></h1>
        <?php include 'inc/footer.php'; ?>