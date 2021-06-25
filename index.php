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
                            <a href="product_details.php?productId=<?= $featurePd['productId'] ?>">
                                <img src="assets/img/product/<?= $featurePd['image'] ?>" class="img-pri" height="200" alt="">
                                <img src="assets/img/product/<?= $featurePd['relatedImage'] ?>" class="img-sec" height="200" alt="">
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
                            <h4><a href="product-details.html"><?= $featurePd['productName'] ?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price">$<?= $featurePd['price'] ?></span>
                                <div class="product-details-des">
                                    <p><?= $format->textShorten($featurePd['body'], 60); ?></p>
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
            <?php
            $getNpd = $pd->getNewProduct();
            if ($getNpd) {
                $i = 0;
                while ($NewPd = $getNpd->fetch_assoc()) {
                    $i++;
            ?>
                    <!-- product single item start -->
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="product_details.php?productId=<?= $NewPd['productId']; ?>">
                                <img src="assets/img/product/<?= $NewPd['image']; ?>" class="img-pri" alt="">
                                <img src="assets/img/product/<?= $NewPd['relatedImage']; ?>" class="img-sec" alt="">
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
                            <h4><a href="product_details.php?productId=<?= $NewPd['productId']; ?>"><?= $NewPd['productName']; ?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price">$<?= $NewPd['price']; ?></span>
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
            <?php }
            } ?>
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
                        <h3>General</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="4">
                        <?php
                        $getArrpd = $pd->generalProduct();
                        if ($getNpd) {
                            $i = 0;
                            while ($NewArrPd = $getArrpd->fetch_assoc()) {
                                $i++;
                        ?>
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product_details.php?productId=<?= $NewArrPd['productId']; ?>">
                                                <img src="assets/img/product/<?= $NewArrPd['image']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="product_details.php?productId=<?= $NewArrPd['productId']; ?>"><?= $NewArrPd['productName']; ?></a></h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $<?= $NewArrPd['price']; ?>
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
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <!-- New Products area end -->
            <!-- Most viewed area start -->
            <div class="col-lg-4">
                <div class="category-wrapper mb-md-24 mb-sm-24">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>Popular</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <div class="category-carousel-active row" data-row="4">
                        <?php
                        $popularPd = $pd->popularProduct();
                        if ($popularPd) {
                            $i = 0;
                            while ($popPd = $popularPd->fetch_assoc()) {
                                $i++;
                        ?>
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product_details.php?productId=<?= $popPd['productId']; ?>">
                                                <img src="assets/img/product/<?= $popPd['image']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="product_details.php?productId=<?= $popPd['productId']; ?>"><?= $popPd['productName']; ?></a></h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $<?= $popPd['price']; ?>
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
                        <?php }
                        } ?>
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
                        <?php
                        $hotPd = $pd->hotProduct();
                        if ($hotPd) {
                            $i = 0;
                            while ($hotPdResult = $hotPd->fetch_assoc()) {
                                $i++;
                        ?>
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product_details.php?productId=<?= $hotPdResult['productId']; ?>">
                                                <img src="assets/img/product/<?= $hotPdResult['image']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="category-content">
                                            <h4><a href="product_details.php?productId=<?= $hotPdResult['productId']; ?>"><?= $hotPdResult['productName']; ?></a></h4>
                                            <div class="price-box">
                                                <div class="regular-price">
                                                    $<?= $hotPdResult['price']; ?>
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
                        <?php }
                        } ?>
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
            <h3>latest brand Product</h3>
        </div> <!-- section title end -->
        <!-- featured category start -->
        <div class="latest-product-active slick-padding slick-arrow-style">

            <?php
            $brandPd = $pd->brandProduct();
            if ($brandPd) {
                $i = 0;
                while ($brandPdResult = $brandPd->fetch_assoc()) {
                    $i++;
            ?>
                    <!-- product single item start -->
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="product_details.php?productId=<?= $brandPdResult['productId']; ?>">
                                <img src="assets/img/product/<?= $brandPdResult['relatedImage']; ?>" class="img-pri" alt="">
                                <img src="assets/img/product/<?= $brandPdResult['image']; ?>" class="img-sec" alt="">
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
                            <h4><a href="product_details.php?productId=<?= $brandPdResult['productId']; ?>"><?= $brandPdResult['productName']; ?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price">$<?= $brandPdResult['price']; ?></span>
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
            <?php }
            } ?>
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