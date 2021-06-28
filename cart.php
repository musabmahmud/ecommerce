<?php include_once 'inc/header.php'; ?>
<?php include 'inc/breadcrumb.php'; ?>


<?php

if (isset($_GET['delCartPro'])) {
    $delId = $_GET['delCartPro'];
    $delProduct = $cart->delCatById($delId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $updateCart = $cart->updateTocart($cartId, $quantity);
}

if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}

?>
<!-- cart main wrapper start -->
<div class="cart-main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($updateCart)) { ?>
                    <div class="alert alert-dismissible bg-success">
                        <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
                        <?php echo $updateCart;
                        unset($updateCart);
                        ?>
                    </div>
                <?php  } elseif (isset($delProduct)) { ?>
                    <div class="alert alert-dismissible bg-danger">
                        <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
                        <?php echo $delProduct;
                        unset($delProduct);
                        ?>
                    </div>
                <?php  } ?>
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-quantity">Product Code</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cartDetails = $cart->cartDetails();
                            $sum = 0;
                            $totalAmount = 0;
                            if ($cartDetails) {
                                $sum = 0;
                                $i = 0;
                                while ($cartResult = $cartDetails->fetch_assoc()) {
                                    $i++; ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="product_details.php?productId=<?= $cartResult['productId'] ?>"><img class="img-fluid" src="assets/img/product/<?= $cartResult['image']; ?>" alt="Product" /></a></td>
                                        <td class="pro-title"><a href="product_details.php?productId=<?= $cartResult['productId'] ?>"><?= $cartResult['productName']; ?></a></td>
                                        <td class="pro-thumbnail"><a href="product_details.php?productId=<?= $cartResult['productId'] ?>"><?= $cartResult['productCode']; ?></a></td>
                                        <td class="pro-price"><span>$<?= $cartResult['price']; ?></span></td>
                                        <td class="pro-quantity">

                                            <form action="" method="post">
                                                <input type="hidden" name="cartId" value="<?= $cartResult['cartId']; ?>">
                                                <div class="pro-qty"><input type="int" name="quantity" value="<?= $cartResult['quantity']; ?>"></div>
                                                <button type="submit" class="btn btn-danger" name="update">update</button>
                                            </form>
                                        </td>
                                        <td class="pro-subtotal"><span>
                                                $<?php
                                                    $total = $cartResult['price'] * $cartResult['quantity'];
                                                    echo $total;
                                                    ?></span></td>
                                        <td class="pro-remove"><a class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" href="?delCartPro=<?= $cartResult['cartId'] ?>"><i class="fa fa-trash-o"></i></a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content p-sm-4">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title text-danger text-center text-uppercase" id="exampleModalCenterTitle">Delete Data!!</h2>
                                                            <a type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span class="d-block fa-2x" aria-hidden="false">&times;</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body p-sm-3">
                                                            Are you sure you want to delete? Delete it for forever!!
                                                        </div>
                                                        <div class="modal-footer pd-t-20 text-white">
                                                            <a type="button" class="btn btn-secondary" href="#" data-dismiss="modal">Close</a>
                                                            <a type="submit" class="btn btn-danger" href="?delCartPro=<?= $cartResult['cartId'] ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                            <?php $sum = $sum + $total;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12 col-md-6 mt-20">
                <a href="shop.php" class="btn btn-danger">Continue Shopping</a>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    <td>$<?php echo $sum;
                                            Session::set("total", $sum);
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vat(10%)</td>
                                    <td>$<?= $totalAmount = $sum + $sum * .1; ?></td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">$<?= $totalAmount;
                                                                ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout.php" class="sqr-btn d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->
<?php include 'inc/footer.php'; ?>