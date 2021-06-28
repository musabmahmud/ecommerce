<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/shopsidebar.php'; ?>
<?php
if (!isset($_GET['brandid'])) {
    echo "<script>window.location = 'shop.php'</script>;";
} else {
    $id = $_GET['brandid'];
}
?>
<!-- product item start -->
<div class="shop-product-wrap grid row">
    <?php
    $probyBrand = $pd->probyBrand($id);
    if ($probyBrand) {
        $i = 0;
        while ($proBrndRelt = $probyBrand->fetch_assoc()) {
            $i++; ?>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <!-- product single grid item start -->
                <div class="product-item fix mb-30">
                    <div class="product-thumb">
                        <a href="product_details.php?productId=<?= $proBrndRelt['productId'] ?>">
                            <img src="assets/img/product/<?= $proBrndRelt['image']; ?>" class="img-pri" alt="">
                            <img src="assets/img/product/<?= $proBrndRelt['relatedImage']; ?>" class="img-sec" alt="">
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
                        <h4><a href="product_details.php?productId=<?= $proBrndRelt['productId'] ?>"><?= $proBrndRelt['productName']; ?></a></h4>
                        <div class="pricebox">
                            <span class="regular-price">$<?= $proBrndRelt['price']; ?></span><br>
                            <span><?= $format->textShorten($proBrndRelt['body'], 60); ?></span>
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
<?php include 'inc/footer.php'; ?>