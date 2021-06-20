<?php include 'inc/header.php'; ?>
<?php include '../classes/brand_all.php'; ?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location = 'brand.php'</script>;";
} else {
    $id = $_GET['brandid'];
}

$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['brandname'];
    $id = $_POST['brandid'];
    $brandUpdate = $brand->brandUpdate($name, $id);
}

?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Category</h6>
        <div class="mg-t-5" id="message">
            <?php if (isset($brandUpdate)) {
                echo $brandUpdate;
                unset($brandUpdate);
            }?>
        </div>
        <?php
        $getBrand = $brand->getBrandById($id);
        $brandresult = $getBrand->fetch_assoc();
        ?>
        <form method="post" action="" data-parsley-validate>
            <input type="hidden" name="brandid" value="<?= $brandresult['brandid']; ?>">
            <div class="wd-300">
                <div class="d-flex mg-b-30">
                    <div class="form-group mg-b-0">
                        <label>Brand Name: <span class="tx-danger">*</span></label>
                        <input type="text" name="brandname" value="<?= $brandresult['brandname']; ?>" class="form-control wd-300" placeholder="Enter Brand Name" required>
                    </div><!-- form-group -->
                </div><!-- d-flex -->
                <button type="submit" class="btn btn-info">Update Brand</button>
            </div>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="brand.php">Back to Category</a>
        </div>
    </div>


</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>