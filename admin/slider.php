<?php include 'inc/header.php'; ?>
<?php include 'classes/All.php'; ?>
<?php
$all = new AllItem();

if (isset($_GET['sliderdelId'])) {
    $id = $_GET['sliderdelId'];
    $delSlider = $all->sliderdelId($id);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="block mg-b-30">
        <h2 class="text-uppercase">Slider</h2>
        <a class="btn bg-info d-flex float-right text-white text-left tx-22" href="slider_add.php">Add New Slider</a></div>
        <div class="mg-t-5" id="message">
                <?php if (isset($delSlider)) {
                    echo $delSlider;
                    unset($delSlider);
                }
            ?>
        </div>
        <table class="table table-bordered table-striped table-responsive" id="myTable">
            <thead>
            <tr>
                <th>Serial No.</th>
                <th>Slider background</th>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
                <th>Image 4</th>
                <th>Heading</th>
                <th>Details</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $getSlider = $all->getSlider();
                $i = 0;
                if($getSlider){
                while($result = $getSlider->fetch_assoc()){
                    $i++;
            ?>
            <tr>
                <td><?= $i ;?></td>
                <td><img src="../assets/img/slider/<?= $result['image_bg'];?>" height="50"></td>
                <td><img src="../assets/img/slider/<?= $result['image_1'];?>" height="50"></td>
                <td><img src="../assets/img/slider/<?= $result['image_2'];?>" height="50"></td>
                <td><img src="../assets/img/slider/<?= $result['image_3'];?>" height="50"></td>
                <td><img src="../assets/img/slider/<?= $result['image_4'];?>" height="50"></td>
                <td><h4><?= $result['heading'];?></h4></td>
                <td><p><?= $result['body'];?></p></td>
                <td><a class="btn btn-primary" href="slider_edit.php?sliderId=<?= $result['sliderId']; ?>">EDIT</a> 
                <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" href="?sliderdelId=<?= $result['sliderId']; ?>">DELETE</a>
                
                
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
                                <a type="submit" class="btn btn-danger" href="?sliderdelId=<?= $result['sliderId']; ?>">Delete</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php } }?>
            </tbody>
        </table>
    </div><!-- Card -->
</div><!-- sl-pagebody -->


<?php include 'inc/footer.php'; ?>