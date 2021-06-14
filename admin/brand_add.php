<?php include 'inc/header.php'; ?>
<?php include 'classes/brand_all.php'; ?>
<?php
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['brandname'];
    $insertBrand = $cat->brandInsert($name);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Brand</h6>
        <p class="mg-b-20 mg-t-30" id="message">
            <?php if (isset($insertBrand)) {
                echo $insertBrand;
                header("Location: dashboard.php");
            } ?></p>
        <form method="post" action="" data-parsley-validate>
            <div class="wd-300">
                <div class="d-flex mg-b-30">
                    <div class="form-group mg-b-0">
                        <label>Brand Name: <span class="tx-danger">*</span></label>
                        <input type="text" name="brandname" class="form-control wd-300" placeholder="Enter Category Name" required>
                    </div><!-- form-group -->
                </div><!-- d-flex -->
                <button type="submit" class="btn btn-info">Add Brand</button>
            </div>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="category.php">Back to Brand</a></div>
        </div>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>