<?php require_once("../resources/config.php");  ?>
<?php include(TEMPLATE_FRONT .DS. "header.php");  ?>
<?php

if(isset($_GET['tx'])){
  process_transaction();
}

 ?>
  <!-- Page Content -->
    <div class="container">
      <h1 class="text-center">THANKS YOU.</h1>
    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT .DS. "footer.php");  ?>