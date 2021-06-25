<?php include_once 'inc/header.php'; ?>

<?php
if (!isset($_GET['catId'])) {
    echo "<script>window.location = 'shop.php'</script>;";
} else {
    $id = $_GET['catId'];
}
?>
<!-- page wrapper start -->
<div class="page-main-wrapper">
    <div class="container">
        <div class="row">
            <!-- sidebar start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                    <!-- sidebar categorie start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-category">
                            <ul>
                                <li class="title"><i class="fa fa-bars"></i> categories</li>
                                <li><a href="#">books</a><span>(10)</span></li>
                                <li><a href="#">camera</a><span>(12)</span></li>
                                <li><a href="#">computer</a><span>(08)</span></li>
                                <li><a href="#">electronic</a><span>(16)</span></li>
                                <li><a href="#">Necklaces</a><span>(11)</span></li>
                                <li><a href="#">Rugby</a><span>(20)</span></li>
                                <li><a href="#">smart phones</a><span>(15)</span></li>
                                <li><a href="#">tablet</a><span>(12)</span></li>
                                <li><a href="#">watch</a><span>(10)</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- sidebar categorie start -->

                    <!-- pricing filter start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>filter by price</h3>
                        </div>
                        <div class="sidebar-widget-body">
                            <div class="price-range-wrap">
                                <div class="price-range" data-min="50" data-max="400"></div>
                                <div class="range-slider">
                                    <form action="#" class="d-flex justify-content-between">
                                        <button class="filter-btn">filter</button>
                                        <div class="price-input d-flex align-items-center">
                                            <label for="amount">Price: </label>
                                            <input type="text" id="amount">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pricing filter end -->
                    <!-- product tag start -->
                    <div class="sidebar-widget mb-30">
                        <div class="sidebar-title mb-10">
                            <h3>tags</h3>
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
                    <div class="sidebar-widget mb-30">
                        <div class="img-container fix img-full">
                            <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- sidebar banner end -->
                </div>
            </div>
            <!-- sidebar end -->

            <!-- product main wrap start -->
            <div class="col-lg-9">
                <!-- product view wrapper area start -->
                <div class="shop-product-wrapper pt-34">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="top-bar-left">
                                    <div class="product-view-mode mr-70 mr-sm-0">
                                        <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                        <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                                    </div>
                                    <div class="product-amount">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="top-bar-right">
                                    <div class="product-short">
                                        <p>Sort By : </p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item start -->
                    <div class="shop-product-wrap grid row">
                        <?php
                        $probyCat = $pd->probyCat($id);
                        if ($probyCat) {
                            $i = 0;
                            while ($proCatRelt = $probyCat->fetch_assoc()) {
                                $i++; ?>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <!-- product single grid item start -->
                                    <div class="product-item fix mb-30">
                                        <div class="product-thumb">
                                            <a href="product_details.php?productId=<?= $proCatRelt['productId'] ?>">
                                                <img src="assets/img/product/<?= $proCatRelt['image']; ?>" class="img-pri" alt="">
                                                <img src="assets/img/product/<?= $proCatRelt['relatedImage']; ?>" class="img-sec" alt="">
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
                                            <h4><a href="product_details.php?productId=<?= $proCatRelt['productId'] ?>"><?= $proCatRelt['productName']; ?></a></h4>
                                            <div class="pricebox">
                                                <span class="regular-price">$<?= $proCatRelt['price']; ?></span><br>
                                                <span><?= $format->textShorten($proCatRelt['body'], 60); ?></span>
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