<?php
include_once('header.php');

// Store data from page 1 in session
if ( ! empty( $_POST ) ) {
  $_SESSION['address'] = $_POST['address'];
  $_SESSION['city'] = $_POST['city'];
  $_SESSION['state'] = $_POST['state'];

  $insert_id = insert($_SESSION);
}

?>
  <section id="form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-container">
            <h3 class="heading">Finished</h3>
            <?php if ( ! empty( $insert_id ) ) : ?>
              <?php
              session_destroy();
              $results = show_results($insert_id);
              ?>
              <p>Your submission was successful. Here's the information we submitted.</p>
              <ul>
              <?php foreach ($results as $key=>$val) {
                if ( $key == 'interests' ) {
                  $arr = unserialize($val);
                  $val = implode(', ', $arr);
                }

                printf('<li>%s: %s</li>', ucwords($key), __($val));
              }
              ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <section>
<?php include_once('footer.php'); ?>
