<?php include 'inc/header.php'; ?>
<?php include 'classes/order_all.php';

$order = new Order();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $acceptOrder = $order->delivered($id);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <div class="block">
            <h2 class="text-uppercase ">View Order</h2>
        </div>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($acceptOrder)) {
                echo $acceptOrder;
                unset($acceptOrder);
            }?>
        </div>
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Email</th>
                    <th>Payment</th>
                    <th>Date</th>
                    <th>Order Note</th>
                    <th>Total</th>
                    <th>View Details</th>
                    <th>Accept</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getOrder = $order->getOrderAll();
                $i = 0;
                if ($getOrder) {
                    while ($result = $getOrder->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $result['email']; ?></td>
                            <td><?= $result['payment']; ?></td>
                            <td><?= $result['date']; ?></td>
                            <td><?= $result['ordernote']; ?></td>
                            <td>$<?= $result['total']; ?></td>
                            <td><a class="btn btn-primary" href="order_details.php?email=<?= $result['email'];?>&date=<?= $result['date'];?>">View Details</a></td>
                            <td><a class="btn btn-warning" href="?id=<?= $result['orderid'];?>">Delivered</a></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <div class="block">
        <a class="btn btn-warning float-right text-white mg-t-20" href="order_delivered.php">View Delivered Order</a>
        </div>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>