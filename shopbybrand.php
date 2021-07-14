<?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/shopsidebar.php'; ?>
<?php
if (!isset($_GET['brandid'])) {
    echo "<script>window.location = 'shop.php'</script>;";
} else {
    $id = $_GET['brandid'];
}
?>
<?php
$per_page = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_form = ($page - 1) * $per_page;
$shopProduct = $pd->probyBrand($id, $start_form, $per_page);
?>
<!-- product item start -->
<div class="shop-product-wrap grid row">
    <?php
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
                        <h4><a href="product_details.php?productId=<?= $shopPdRelt['productId']?>"><?= $shopPdRelt['productName']; ?></a></h4>
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

<!-- rows count -->
<?php

$res = $pd->paginationBrand($id);
if($res){
    $total_rows = mysqli_num_rows($res);
    $total_pages = ceil($total_rows / $per_page);
?>
<!-- rows count -->

<!-- start pagination area -->
<div class="paginatoin-area text-center pt-28">
    <div class="row">
        <div class="col-12">
            <ul class="pagination-box">
                <!-- Pagination -->
                <li class="<?php if ($page == 1) {
                                echo 'active';
                            } ?>"><a href='shopbybrand.php?page=1&&brandid=<?=$id?>'>First Page</a></li>
                <?php
                if ($page >= 2) {
                    echo "<li><a href='shopbybrand.php?page=" . ($page - 1) ."&&brandid=".$id."'>  Prev </a></li>";
                }
                for ($i = 2; $i < $total_pages; $i++) {
                    echo "<li class='";
                    if ($page == $i) {
                        echo "active";
                    }
                    echo "'><a href='shopbybrand.php?page="
                    . $i ."&&brandid=".$id."'>" . $i . " </a>";
                }
                if ($total_pages > $page && $page >= 2) {
                    echo "<li><a href='shopbybrand.php?page=" . ($page + 1) ."&&brandid=".$id."'>  Next </a></li>";
                }
                ?>
                <li class="<?php if ($page == $total_pages) {
                                echo 'active';
                            } ?>"><a href='shopbybrand.php?page=<?= $total_pages ?>&&brandid=<?=$id?>'>Last Page</a></span></li>
                <!-- Pagination -->
            </ul>
        </div>
    </div>
</div>
<!-- end pagination area -->
<?php }?>
</div>
<!-- product main wrap end -->
</div>
</div>
</div>
<!-- page wrapper end -->
<?php include 'inc/footer.php'; ?>