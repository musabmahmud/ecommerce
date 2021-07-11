<?php include 'inc/header.php'; ?>
<?php include 'classes/brand_all.php'; ?>
<?php
$brand = new Brand();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['brandname'];
    $insertBrand = $brand->brandimgInsert($name);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Brand</h6>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($insertBrand)) {
                echo $insertBrand;
                unset($insertBrand);
            } ?>
        </div>
        <form method="post" action="brand_add.php" enctype="multipart/form-data" data-parsley-validate>
            <div class="row mg-b-30">
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image:</label>
                    <input type="file" class="form-control" id="image" name="image" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="image_id" src="../assets/img/product/<?= $result['image'] ?>" height="200">
                </div>
                <!-- Image -->
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-info">Add Brand</button>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="brand.php">Back to Brand</a>
        </div>
    </div>
</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>