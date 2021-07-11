<?php include 'inc/header.php'; ?>
<?php include 'classes/brand_all.php'; 


$brand = new Brand();

if (isset($_GET['brandimgdelid'])) {
    $id = $_GET['brandimgdelid'];
    $delBrand = $brand->delBrandImgById($id);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="block mg-b-30">
        <h2 class="text-uppercase">Brand</h2>
        <a class="btn bg-info d-flex float-right text-white text-left tx-22" href="brand_add.php">Add New Brand</a></div>
        <div class="mg-t-5" id="message">
                <?php if (isset($delBrand)) {
                    echo $delBrand;
                    unset($delBrand);
                }
                ?>
        </div>
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
            <tr>
                <th>Serial No.</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $getbrand = $brand->getimgAll();
                $i = 0;
                if($getbrand){
                while($result = $getbrand->fetch_assoc()){
                    $i++;
            ?>
            <tr>
                <td><?= $i ;?></td>
                <td><img src="../assets/img/brand/<?= $result['imag'];?>" height="200"></td>
                <td><a href="brand_img_edit.php?bandImageId =<?= $result['bandImageId ']; ?>">EDIT</a> || 
                <a data-toggle="modal" data-target="#exampleModalCenter" href="?brandimgdelid=<?= $result['bandImageId']; ?>">DELETE</a>
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
                                <a type="submit" class="btn btn-danger" href="?branddelid=<?= $result['bandImageId ']; ?>">Delete</a>
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