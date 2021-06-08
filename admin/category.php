<?php include 'inc/header.php'; ?>
<?php include 'classes/category_add.php'; 

$cat = new Category();

if(isset($_GET['delId'])){
    $id = $_GET['delId'];
    $delCat = $cat->delCatById($id);
}
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5></h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="block mg-b-30">
        <h2 class="text-uppercase">Category</h2>
        <a class="btn bg-info d-flex float-right text-white text-left tx-22" href="category_add.php">Add New Category</a></div>
        <p class="mg-b-20" id="message">
            <?php if (isset($delCat)) {
                echo $delCat;
            } ?>
            <?php if (isset($catUpdate)) {
                echo $catUpdate;
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
                $getCat = $cat->getAll();
                $i = 0;
                if(isset($getCat)){
                while($result = $getCat->fetch_assoc()){
                    $i++;
            ?>
            <tr>
                <td><?= $i ;?></td>
                <td><?= $result['name'];?></td>
                <td><a href="category_edit.php?catId=<?= $result['id'];?>">EDIT</a> || <a  data-toggle="modal" data-target="#exampleModalCenter" href="?delId=<?= $result['id'];?>">DELETE</a><?php include 'inc/modal.php'; ?></td>
            </tr>
            <?php } }?>
            </tbody>
        </table>
    </div><!-- Card -->
</div><!-- sl-pagebody -->
<?php include 'inc/footer.php'; ?>