<?php
include_once('header.php');

// Store data from page 1 in session
if ( ! empty( $_POST ) ) {
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
}
?>
  <section id="form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-container">
            <h3 class="heading">Step 2</h3>
            <form action="page3.php" method="post">
              <?php
              $options = array(
                'acrobatics' => 'Acrobatics',
                'acting' => 'Acting',
                'antiques' => 'Antiques',
                'sports' => 'Sports',
              );

              checkbox( 'interests', 'interests', 'Select your interests', $options );
              ?>
              <?php submit('Go To Step 3 &raquo;'); ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  <section>
<?php include_once('footer.php'); ?>
