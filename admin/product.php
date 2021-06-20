<?php include 'inc/header.php';
include 'classes/product_all.php';
include_once '../helpers/format.php';


$products = new Products();

$format = new Format();

if (isset($_GET['delPro'])) {
    $delId = $_GET['delPro'];
    $delProduct = $products->delCatById($delId);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="block">
            <h2 class="text-uppercase ">Products</h2>
            <a class="btn bg-info d-flex float-right text-white text-left tx-22" href="product_add.php">Add New Products</a>
        </div>
        <div class="mg-t-5" id="message">
            <?php if (isset($delProduct)) {
                echo $delProduct;
                unset($delProduct);
            }
            ?>
        </div>
        <table class="table table-bordered table-striped table-responsive" id="myTable">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Products Name</th>
                    <th>Category Id</th>
                    <th>Brand Id</th>
                    <th>Body</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Product Code</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $getproducts = $products->getAll();
                $i = 0;
                if (isset($getproducts)) {
                    while ($result = $getproducts->fetch_assoc()) {
                        $i++;
                ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $result['productName']; ?></td>
                            <td><?= $result['catName']; ?></td>
                            <td><?= $result['brandname']; ?></td>
                            <td><?= $format->textShorten($result['body'], 50); ?></td>
                            <td><?= $result['price']; ?></td>
                            <td><a href="assets/img/<?= $result['image']; ?>" target="_blank"><img src="assets/img/<?= $result['image']; ?>" height="60"></a></td>
                            <td><?= $result['productCode']; ?></td>
                            <td><?php
                                if ($result['type'] == 2) {
                                    echo "Featured Image";
                                } elseif ($result['type'] == 1) {
                                    echo "Popular Image";
                                } else {
                                    echo "General";
                                }
                                ?></td>
                            <td><a href="product_edit.php?proId=<?= $result['productId']; ?>">EDIT</a> || <a  data-toggle="modal" data-target="#exampleModalCenter" href="?delPro=<?= $result['productId']; ?>">DELETE</a>
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
                                                <a type="submit" class="btn btn-danger" href="?delPro=<?= $result['productId']; ?>">Delete</a>
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
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>