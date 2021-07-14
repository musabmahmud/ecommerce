<!-- page wrapper start -->
<div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
    <div class="container">
        <div class="row">
            <!-- start home sidebar -->
            <div class="col-lg-3">
                <div class="home-sidebar">

                    <!-- best seller area start -->
                    <div class="main-sidebar category-wrapper mb-24">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>best seller</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="6">
                            <?php
                            $sidebar_pd = $pd->sidebarPrd();
                            if ($sidebar_pd) {
                                $i = 0;
                                while ($sidebarRlt = $sidebar_pd->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <div class="col-sm-12">
                                        <div class="category-item">
                                            <div class="category-thumb">
                                                <a href="product_details.php?productId=<?= $sidebarRlt['productId'] ?>">
                                                    <img src="assets/img/product/<?= $sidebarRlt['image'] ?>" alt="<?= $sidebarRlt['productName'] ?>">
                                                </a>
                                            </div>
                                            <div class="category-content">
                                                <h4><a href="product_details.php?productId=<?= $sidebarRlt['productId'] ?>"><b><?= $sidebarRlt['productName'] ?></b></a></h4>
                                                <div class="price-box">
                                                    <div class="regular-price">
                                                        <?= $sidebarRlt['price'] ?>
                                                    </div>
                                                </div>
                                                <p><?= $format->textShorten($sidebarRlt['body'], 60); ?></p>
                                            </div>
                                        </div> <!-- end single item -->
                                    </div> <!-- end single item column -->
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <!-- best seller area end -->
                    <!-- blog area start -->
                <div class="main-sidebar blog-area mb-24">
                    <div class="section-title-2 d-flex justify-content-between mb-28">
                        <h3>latest blog</h3>
                        <div class="category-append"></div>
                    </div> <!-- section title end -->
                    <!-- blog wrapper start -->
                    <div class="blog-carousel-active">
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog-details.php">
                                    <img src="assets/img/blog/img_blog1.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details.php">post format audio</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa
                                    posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog-details.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                        <div class="blog-item">
                            <div class="blog-thumb img-full fix">
                                <a href="blog-details.php">
                                    <img src="assets/img/blog/img_blog2.jpg" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3><a href="blog-details.php">post format image</a></h3>
                                <div class="blog-meta">
                                    <span class="posted-author">by: admin</span>
                                    <span class="post-date">25 Nov, 2018</span>
                                </div>
                                <p>Curabitur sed diam enim. Sed varius faucibus lectus, a scelerisque massa
                                    posuere ac. Quisque dapibus, est ac...</p>
                            </div>
                            <a href="blog-details.php">read more <i class="fa fa-long-arrow-right"></i></a>
                        </div> <!-- end single blog item -->
                    </div>
                    <!-- blog wrapper end -->
                </div>
                <!-- blog area end -->

                <!-- testimonial area start -->
                <div class="main-sidebar testimonial-area pb-sm-70">
                    <div class="section-title-2 mb-28">
                        <h3>Clients Say</h3>
                    </div> <!-- section title end -->
                    <div class="testimonial-carousel-active slick-dot-style">
                        <div class="testimonial-item text-center">
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/team_member1.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h3><a href="#">Elizabeth Taylor</a></h3>
                                <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu
                                    aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum
                                    sodales ac eu lacus</p>
                            </div>
                        </div> <!-- end single testimonial item -->
                        <div class="testimonial-item text-center">
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/team_member2.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h3><a href="#">Elizabeth Taylor</a></h3>
                                <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu
                                    aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum
                                    sodales ac eu lacus</p>
                            </div>
                        </div> <!-- end single testimonial item -->
                        <div class="testimonial-item text-center">
                            <div class="testimonial-thumb">
                                <img src="assets/img/testimonial/team_member3.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <h3><a href="#">Elizabeth Taylor</a></h3>
                                <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu
                                    aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum
                                    sodales ac eu lacus</p>
                            </div>
                        </div> <!-- end single testimonial item -->
                    </div>
                </div>
                <!-- testimonial area end -->

            </div>
        </div>
        <!-- end home sidebar -->