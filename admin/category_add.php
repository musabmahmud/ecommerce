<?php include 'inc/header.php'; ?>
<?php include 'classes/category_all.php'; ?>
<?php
$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['catName'];
    $insertCat = $cat->catInsert($name);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Category</h6>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($insertCat)) {
                echo $insertCat;
                unset($insertCat);
            }?>
        </div>
        <form method="post" action="" data-parsley-validate>
            <div class="wd-300">
                <div class="d-flex mg-b-30">
                    <div class="form-group mg-b-0">
                        <label>Category Name: <span class="tx-danger">*</span></label>
                        <input type="text" name="catName" class="form-control wd-300" placeholder="Enter Category Name" required>
                    </div><!-- form-group -->
                </div><!-- d-flex -->
                <button type="submit" class="btn btn-info">Add Category</button>
            </div>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="category.php">Back to Category</a></div>
        </div>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>