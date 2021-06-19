<?php include 'inc/header.php'; ?>
<?php include 'classes/category_all.php'; ?>
<?php include 'classes/brand_all.php'; ?>
<?php include 'classes/product_all.php'; ?>
<?php
$cat = new Category();
$brand = new Brand();

$products = new Products();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $products->productInsert($_POST,$_FILES);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Product</h6>
        <div id="message">
            <?php if (isset($insertProduct)) {
                echo $insertProduct;
                unset($insertProduct);
            } ?>
        </div>
        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
            <div class="row">
                <div class="col-lg-12 mg-b-30">
                    <div class="form-group">
                        <label>Product Name: <span class="tx-danger">*</span></label>
                        <input type="text" name="productName" class="form-control" placeholder="Enter Product Name" required>
                    </div><!-- form-group -->
                </div><!-- col-4 -->
                <div class="col-lg-12 mg-b-30">
                    <div class="form-group">
                        <label class="form-control-label">Select Category : <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Select Category" name="catId">
                            <option label="Choose Category">*</option>
                            <?php
                            $getCat = $cat->getAll();
                            if (isset($getCat)) {
                                while ($catresult = $getCat->fetch_assoc()) {
                            ?>
                                    <option value="<?= $catresult['catId']; ?>"><?= $catresult['catName']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-12 mg-b-30">
                    <div class="form-group">
                        <label class="form-control-label">Select Brand : <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Select Brand" name="brandid">
                            <option label="Choose Brand"></option>
                            <?php
                            $getbrand = $brand->getAll();
                            if (isset($getbrand)) {
                                while ($brandresult = $getbrand->fetch_assoc()) {
                            ?>
                                    <option value="<?= $brandresult['brandid']; ?>"><?= $brandresult['brandname']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                </div><!-- col-12 -->
                <div class="form-group col-lg-12 mg-b-30">
                    <label>Price: <span class="tx-danger">*</span></label>
                    <input type="text" name="price" class="form-control" placeholder="Enter Product Price" required>
                </div><!-- form-group -->
                <div class="form-group col-lg-12 mg-b-30">
                    <label>Product Code: <span class="tx-danger">*</span></label>
                    <input type="text" name="productCode" class="form-control" placeholder="Enter Product Code">
                </div><!-- form-group -->
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image:</label>
                    <div class="">
                        <input type="file" class="form-control" id="image" name="image" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <div class="">
                        <img id="image_id" src="assets/img/<?= $result['image'] ?>" height="200">
                    </div>
                </div> 
                <div class="col-lg-12 mg-b-30">
                    <div class="form-group">
                        <label class="form-control-label">Product Type : <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Product Type" name="type">
                            <option label="Product Type"></option>
                            <option value="0">General</option>
                            <option value="1">Popular Image</option>
                            <option value="2">Featured</option>
                        </select>
                    </div>
                </div><!-- col-12 -->

                <div class="col-lg-12 mg-b-30">
                    <div class="form-group">
                        <label>Description Name: <span class="tx-danger">*</span></label>
                        <textarea type="text" name="body" class="form-control" rows="10" placeholder="Enter Product Name" id="summernote"></textarea>
                    </div><!-- form-group -->
                </div><!-- col-12 -->
            </div><!-- row -->
            <button type="submit" name="submit" class="btn btn-info">Add Product</button>

        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href=".php">Back to Product</a>
        </div>
    </div>
</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>