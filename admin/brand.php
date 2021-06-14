<?php include 'inc/header.php'; ?>
<?php include 'classes/brand_all.php'; 


$brand = new Brand();
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
        <?php if (isset($insertBrand)) { ?>
            <p class="" id="message">
            <?= $insertBrand;
        } ?>
            </p>
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
                $getbrand = $brand->getAll();
                $i = 0;
                if(isset($getbrand)){
                while($result = $getbrand->fetch_assoc()){
                    $i++;
            ?>
            <tr>
                <td><?= $i ;?></td>
                <td><?= $result['brandname'];?></td>
                <td><a href="brand_edit.php?brandid=<?= $result['brandid']; ?>">EDIT</a> || 
                <a data-toggle="modal" data-target="#exampleModalCenter" href="?branddelid=<?= $result['brandid']; ?>">DELETE</a><?php include 'inc/modal.php';?></td>
            </tr>
            <?php } }?>
            </tbody>
        </table>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>