<?php include 'inc/header.php'; ?>
<?php include 'classes/order_all.php';

$order = new Order();
if (!isset($_GET['email'])) {
    echo "<script>window.location = 'order.php'</script>;";
} else {
    $email = $_GET['email'];
    $date = $_GET['date'];
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="block">
            <h2 class="text-uppercase">View Order Details</h2>
        </div>
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Email</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>image</th>
                    <th>Product Code</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getOrderD = $order->getOrderDetails($email,$date);
                $i = 0;
                if (isset($getOrderD)) {
                    while ($result = $getOrderD->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $result['email']; ?></td>
                            <td><?= $result['productName']; ?></td>
                            <td><?= $result['price']; ?></td>
                            <td><?= $result['quantity']; ?></td>
                            <td><a href="../assets/img/product/<?= $result['image']; ?>" target="_blank"><img src="../assets/img/product/<?= $result['image']; ?>" height="60"></a></td>
                            <td><?= $result['productCode']; ?></td><td><?= $result['date']; ?></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <div class="block">
        <a class="btn btn-info float-right text-white mg-t-20" href="order.php">Back to Order</a>
        </div>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>