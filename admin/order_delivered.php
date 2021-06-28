<?php include 'inc/header.php'; ?>
<?php include 'classes/order_all.php';

$order = new Order();
if (isset($_GET['delId'])) {
    $id = $_GET['delId'];
    $delOrder = $order->delOrderById($id);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <div class="block">
            <h2 class="text-uppercase ">View Delivered Order</h2>
        </div>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($delOrder)) {
                echo $delOrder;
                unset($delOrder);
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
                $getDeliverOrder = $order->getDeliverOrder();
                $i = 0;
                if ($getDeliverOrder) {
                    while ($result = $getDeliverOrder->fetch_assoc()) {
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
                            <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#exampleModalCenter" href="?delId=<?= $result['orderid']; ?>">DELETE</a>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content pd-20">
                                            <div class="modal-header">
                                                <h2 class="modal-title text-center text-uppercase" id="exampleModalCenterTitle">Delete Data!!</h2>
                                                <a type="button" href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span class="d-block fa-2x" aria-hidden="true">&times;</span>
                                                </a>
                                            </div>
                                            <div class="modal-body pd-20">
                                                Are you sure you want to delete? Delete it for forever!!
                                            </div>
                                            <div class="modal-footer pd-t-20 text-white">
                                                <a type="button" class="btn btn-secondary" href="#" data-dismiss="modal">Close</a>
                                                <a type="submit" class="btn btn-danger" href="?delId=<?= $result['orderid'];?>">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
        <div class="block">
        <a class="btn btn-success float-right text-white mg-t-20" href="order.php">View New Order</a>
        </div>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>