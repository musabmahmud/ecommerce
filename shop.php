<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/shopsidebar.php'; ?>
                    <!-- product item start -->
                    <div class="shop-product-wrap grid row">
                        <?php
                        $shopProduct = $pd->shopProduct();
                        if ($shopProduct) {
                            $i = 0;
                            while ($shopPdRelt = $shopProduct->fetch_assoc()) {
                                $i++; ?>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <!-- product single grid item start -->
                                    <div class="product-item fix mb-30">
                                        <div class="product-thumb">
                                            <a href="product_details.php?productId=<?= $shopPdRelt['productId'] ?>">
                                                <img src="assets/img/product/<?= $shopPdRelt['image']; ?>" class="img-pri" alt="">
                                                <img src="assets/img/product/<?= $shopPdRelt['relatedImage']; ?>" class="img-sec" alt="">
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
                                            <h4><a href="product_details.php?productId=<?= $shopPdRelt['productId'] ?>"><?= $shopPdRelt['productName']; ?></a></h4>
                                            <div class="pricebox">
                                                <span class="regular-price">$<?= $shopPdRelt['price']; ?></span><br>
                                                <span><?= $format->textShorten($shopPdRelt['body'], 60); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product single grid item end -->
                                </div>
                        <?php }
                        } ?>
                        <!-- product item end -->
                    </div>
                    <!-- product view wrapper area end -->

                    <!-- start pagination area -->
                    <div class="paginatoin-area text-center pt-28">
                        <div class="row">
                            <div class="col-12">
                                <ul class="pagination-box">
                                    <li><a class="Previous" href="#">Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="Next" href="#"> Next </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end pagination area -->

                </div>
                <!-- product main wrap end -->
            </div>
        </div>
    </div>
    <!-- page wrapper end -->

    <!-- brand area start -->
    <div class="brand-area pt-28 pb-30 pt-md-4 pt-sm-4">
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