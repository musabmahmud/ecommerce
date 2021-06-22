<?php include 'inc/header.php'; ?>
<?php include 'inc/home_slider.php'; ?>
<?php include 'inc/banner.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<!-- page wrapper start -->
<div class="col-lg-9">
    <!-- featured category area start -->
    <div class="feature-category-area mt-md-70">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-bookmark"></i>
            </div>
            <h3>featured</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="featured-carousel-active slick-padding slick-arrow-style">
            <?php
            $getfpd = $pd->getFeatureProduct();
            if ($getfpd) {
                $i = 0;
                while ($featurePd = $getfpd->fetch_assoc()) {
                    $i++;
            ?>
                    <!-- product single item start -->
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="product-details.php?productId = <?= $featurePd['productId']?>">
                                <img src="assets/img/product/<?= $featurePd['image']?>" class="img-pri" height="200" alt="">
                                <img src="assets/img/product/<?= $featurePd['image']?>" class="img-sec" height="200" alt="">
                            </a>
                            <div class="product-label">
                                <span>hot</span>
                            </div>
                            <div class="product-action-link">
                                <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h4><a href="product-details.html"><?= $featurePd['productName']?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price"><?= $featurePd['price']?></span>
                                <div class="ratings"><p><?= $format->textShorten($featurePd['body'], 60);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product single item end -->
            <?php }
            } ?>
        </div>
        <!-- featured category end -->
    </div>
    <!-- featured category area end -->

    <!-- banner statistic start -->
    <div class="banner-statistic pt-28 pb-36">
        <div class="img-container fix img-full">
            <a href="#">
                <img src="assets/img/banner/banner_static1.jpg" alt="">
            </a>
        </div>
    </div>
    <!-- banner statistic end -->

    <!-- featured category area start -->
    <div class="feature-category-area">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flask"></i>
            </div>
            <h3>New Arrivals</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="featured-carousel-active slick-padding slick-arrow-style">
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img1.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img2.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">vertual product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img3.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img4.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">simple product 02</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$100.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img5.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img6.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">affiliate product</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$60.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img7.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img8.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">trendy product 03</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$50.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img9.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img10.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">simple product 20</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$80.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img11.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img12.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>new</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">grouped product</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
        </div>
        <!-- featured category end -->
    </div>
    <!-- featured category area end -->

    <!-- banner statistic start -->
    <div class="banner-statistic pt-28 pb-30 pb-sm-0">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="img-container fix img-full mb-sm-30">
                    <a href="#">
                        <img src="assets/img/banner/banner_static2.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="img-container fix img-full mb-sm-30">
                    <a href="#">
                        <img src="assets/img/banner/banner_static3.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistic end -->

    <!-- category features area start -->
    <div class="category-feature-area">
        <div class="row">
            <!-- New Products area start -->
            <div class="col-lg-4">
                <div class="category-wrapper mb-md-24 mb-sm-24">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>New Products</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="4">
                        <div class="col">
                            <div class="category-item">
                                <div class="category-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $150.00
                                        </div>
                                        <div class="old-price">
                                            <del></del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">grouped Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $100.00
                                        </div>
                                        <div class="old-price">
                                            <del></del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">simple Product 05</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $155.00
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
                        <div class="col">
                            <div class="category-item">
                                <div class="category-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">demandable Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $210.00
                                        </div>
                                        <div class="old-price">
                                            <del>$240.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">simple Product 12</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img7.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img8.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">grouped Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $90.00
                                        </div>
                                        <div class="old-price">
                                            <del>$115.00</del>
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
            </div>
            <!-- New Products area end -->
            <!-- Most viewed area start -->
            <div class="col-lg-4">
                <div class="category-wrapper mb-md-24 mb-sm-24">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>Most viewed</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="4">
                        <div class="col">
                            <div class="category-item">
                                <div class="category-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img14.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">simple Product 06</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $190.00
                                        </div>
                                        <div class="old-price">
                                            <del>$210.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img13.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">affiliate Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $45.00
                                        </div>
                                        <div class="old-price">
                                            <del>$650.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img12.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">grouped Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $120.00
                                        </div>
                                        <div class="old-price">
                                            <del>$170.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img10.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $180.00
                                        </div>
                                        <div class="old-price">
                                            <del></del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img9.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">external Product</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img8.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">download Product</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
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
                    </div>
                </div>
            </div>
            <!-- Most viewed area end -->
            <!-- Most viewed area start -->
            <div class="col-lg-4">
                <div class="category-wrapper mb-md-24 mb-sm-24">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>hot sale</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="4">
                        <div class="col">
                            <div class="category-item">
                                <div class="category-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $120.00
                                        </div>
                                        <div class="old-price">
                                            <del>$150.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img15.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">grouped Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $160.00
                                        </div>
                                        <div class="old-price">
                                            <del></del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img11.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">download Product</a></h4>
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
                        <div class="col">
                            <div class="category-item">
                                <div class="category-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img16.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">simple Product 01</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $80.00
                                        </div>
                                        <div class="old-price">
                                            <del>$100.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img15.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">affiliate Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $120.00
                                        </div>
                                        <div class="old-price">
                                            <del></del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">external Product</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $130.00
                                        </div>
                                        <div class="old-price">
                                            <del>$140.00</del>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img13.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">Virtual Product 01</a></h4>
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
                                    <a href="product-details.html">
                                        <img src="assets/img/product/product-img3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="category-content">
                                    <h4><a href="product-details.html">variable Product 01</a></h4>
                                    <div class="price-box">
                                        <div class="regular-price">
                                            $70.00
                                        </div>
                                        <div class="old-price">
                                            <del>$90.00</del>
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
            </div>
            <!-- Most viewed area end -->
        </div>
    </div>
    <!-- category features area end -->
</div>
</div>
</div>
</div>
<!-- page wrapper end -->

<!-- latest product start -->
<div class="latest-product">
    <div class="container">
        <div class="section-title mb-30">
            <div class="title-icon">
                <i class="fa fa-flash"></i>
            </div>
            <h3>latest product</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img1.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img2.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">vertual product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img3.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img4.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">simple product 04</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$80.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img5.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img6.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">grouped product 05</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img7.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img8.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">affiliate product 06</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$100.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img9.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img10.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">vertual product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$70.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
            <!-- product single item start -->
            <div class="product-item fix">
                <div class="product-thumb">
                    <a href="product-details.html">
                        <img src="assets/img/product/product-img11.jpg" class="img-pri" alt="">
                        <img src="assets/img/product/product-img12.jpg" class="img-sec" alt="">
                    </a>
                    <div class="product-label">
                        <span>hot</span>
                    </div>
                    <div class="product-action-link">
                        <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
                <div class="product-content">
                    <h4><a href="product-details.html">simple product 01</a></h4>
                    <div class="pricebox">
                        <span class="regular-price">$50.00</span>
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
                </div>
            </div>
            <!-- product single item end -->
        </div>
        <!-- featured category end -->
    </div>
</div>
<!-- latest product end -->

<!-- brand area start -->
<div class="brand-area pt-28 pb-30">
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
<?php include 'inc/footer.php'; ?>