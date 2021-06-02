<?php include '../inc/header.php';?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">
      <?php
        if(isset($_GET["username"])){
          echo $_GET["username"];
        }
      ?>

      </div><!-- sl-pagebody -->

    <?php include '../inc/footer.php';?>