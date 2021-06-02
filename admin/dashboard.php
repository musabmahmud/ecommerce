<?php include 'inc/header.php';?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title text-center text-uppercase">
          <h5>Welcome to Dashboard, <?= Session::get('username');?></h5>
        </div>

      </div><!-- sl-pagebody -->

    <?php include '../inc/footer.php';?>