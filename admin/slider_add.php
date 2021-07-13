<?php include 'inc/header.php'; ?>
<?php include 'classes/All.php'; ?>
<?php
$all = new AllItem();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $insertSlider = $all->InsertSlider($_POST,$_FILES);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Slider</h6>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($insertSlider)) {
                echo $insertSlider;
                unset($insertSlider);
            } ?>
        </div>
        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
            <div class="row mg-b-30">
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Slider Background</label>
                    <input type="file" class="form-control" id="image_bg" name="image_bg" onchange="document.getElementById('img_bg').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="img_bg" src="../assets/img/slider/<?= $result['image_bg'] ?>" height="100">
                </div>

                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 1:</label>
                    <input type="file" class="form-control" id="image_1" name="image_1" onchange="document.getElementById('image_id_1').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="image_id_1" src="../assets/img/slider/<?= $result['image_1'] ?>" height="100">
                </div>
                <!-- Image -->
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 2:</label>
                    <input type="file" class="form-control" id="image_2" name="image_2" onchange="document.getElementById('image_id_2').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="image_id_2" src="../assets/img/slider/<?= $result['image_2'] ?>" height="100">
                </div>
                <!-- Image -->
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 3:</label>
                    <input type="file" class="form-control" id="image_3" name="image_3" onchange="document.getElementById('image_id_3').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="image_id_3" src="../assets/img/slider/<?= $result['image_3'] ?>" height="100">
                </div>
                <!-- Image -->
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 4:</label>
                    <input type="file" class="form-control" id="image_4" name="image_4" onchange="document.getElementById('image_id_4').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Preview:</label>
                    <img id="image_id_4" src="../assets/img/slider/<?= $result['image_4'] ?>" height="100">
                </div>
                <!-- Image -->
                <div class="form-group col-lg-12 mg-b-30">
                    <label class="control-label">Heading</label>
                    <input type="text" class="form-control" name="heading">
                </div>
                <div class="form-group col-lg-12 mg-b-30">
                    <label class="control-label">Slider Details </label>
                    <textarea type="text" class="form-control" rows="5" name="body"></textarea>
                </div>
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-info">Add Slider</button>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="slider.php">Back to Slider</a>
        </div>
    </div>
</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>