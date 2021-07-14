<?php include 'inc/header.php'; ?>
<?php include 'classes/All.php'; ?>
<?php
if (!isset($_GET['sliderId']) || $_GET['sliderId'] == NULL) {
    echo "<script>window.location = 'slider.php'</script>;";
} else {
    $id = $_GET['sliderId'];
}

$all = new AllItem();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sliderUpdate = $all->getSliderUpdate($_POST,$_FILES);
}
?>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Slider</h6>
        <div class="pd-t-20 pd-b-20" id="message">
            <?php if (isset($sliderUpdate)) {
                echo $sliderUpdate;
                unset($sliderUpdate);
            } ?>
        </div>
        <?php
            $getSlider = $all->getSliderById($id);
            $getResult = $getSlider->fetch_assoc();
        ?>
        
        <form method="post" action="" enctype="multipart/form-data" data-parsley-validate>
            <input type="hidden" name="sliderId" value="<?= $getResult['sliderId'] ?>">
            <div class="row mg-b-30">
            <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Slider Background</label>
                    <input type="file" class="form-control" id="image_bg" name="image_bg" value="<?= $getResult['image_bg'];?>" onchange="document.getElementById('img_bg').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Slider Background Preview:</label>
                    <img id="img_bg" src="../assets/img/slider/<?= $getResult['image_bg'] ?>" height="200">
                </div>

                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 1</label>
                    <input type="file" class="form-control" value="<?= $getResult['image_1'];?>" id="image" name="image_1" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 1 Preview:</label>
                    <img id="image_id" src="../assets/img/slider/<?= $getResult['image_1'] ?>" height="200">
                </div>
                <!-- Image -->

                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 2</label>
                    <input type="file" class="form-control" value="<?= $getResult['image_2'];?>" id="image" name="image_2" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 2 Preview:</label>
                    <img id="image_id" src="../assets/img/slider/<?= $getResult['image_2'] ?>" height="200">
                </div>
                <!-- Image -->

                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 3</label>
                    <input type="file" class="form-control" value="<?= $getResult['image_3'];?>" id="image" name="image_3" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 3 Preview:</label>
                    <img id="image_id" src="../assets/img/slider/<?= $getResult['image_3'] ?>" height="200">
                </div>
                <!-- Image -->

                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 4</label>
                    <input type="file" class="form-control" value="<?= $getResult['image_4'];?>" id="image" name="image_4" onchange="document.getElementById('image_id').src= window.URL.createObjectURL(this.files[0])">
                </div>
                <div class="form-group col-lg-6 mg-b-30">
                    <label class="control-label">Image 4 Preview:</label>
                    <img id="image_id" src="../assets/img/slider/<?= $getResult['image_4'] ?>" height="200">
                </div>
                <!-- Image -->

                <div class="form-group col-lg-12 mg-b-30">
                    <label class="control-label">Heading</label>
                    <input type="text" class="form-control" value="<?=$getResult['heading']?>"  name="heading">
                </div>
                <div class="form-group col-lg-12 mg-b-30">
                    <label class="control-label">Slider Details </label>
                    <textarea type="text" class="form-control" rows="5" name="body"><?= $getResult['body']?></textarea>
                </div>
            </div><!-- d-flex -->
            <button type="submit" class="btn btn-info">Update Slider</button>
        </form><!-- Form -->
        <div class="block mg-t-30">
            <a class="btn bg-info text-white float-right text-left tx-22" href="slider.php">Back to Slider</a>
        </div>
    </div>
</div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>