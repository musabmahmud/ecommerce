<?php include 'inc/header.php'; ?>
<?php include 'classes/category_all.php'; ?>
<?php
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    echo "<script>window.location = 'category.php'</script>;";
} else {
    $id = $_GET['catId'];
}

$cat = new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $name = $_POST['catName'];
    $id = $_POST['catId'];
    $catUpdate = $cat->catUpdate($name, $id);
}

?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Category</h6>
        <div class="mg-t-5" id="message">
            <?php if (isset($catUpdate)) {
                echo $catUpdate;
                unset($catUpdate);
            }?>
        </div>
        <?php
        $getCat = $cat->getCarById($id);
        $catresult = $getCat->fetch_assoc();
        ?>
        <form method="post" action="" data-parsley-validate>
            <input type="hidden" name="catId" value="<?= $catresult['catId']; ?>">
            <div class="wd-300">
                <div class="d-flex mg-b-30">
                    <div class="form-group mg-b-0">
                        <label>Category Name: <span class="tx-danger">*</span></label>
                        <input type="text" name="catName" value="<?= $catresult['catName']; ?>" class="form-control wd-300" placeholder="Enter Category Name" required>
                    </div><!-- form-group -->
                </div><!-- d-flex -->
                <button type="submit" name="update" class="btn btn-info">Update Category</button>
            </div>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="category.php">Back to Category</a>
        </div>
    </div>


</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>