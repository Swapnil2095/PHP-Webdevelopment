<?php include_once('header.php'); ?>
  <section id="form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-container">
            <h3 class="heading">Step 1: Contact Information</h3>
            <form action="page2.php" method="post">
              <?php
              text('name', 'name', 'Your name', 'Enter your name');
              text('email', 'email', 'Your email address', 'Enter your email address');
              submit('Go To Step 2 &raquo;');
              ?>
            </form>
        </div>
        </div>
      </div>
    </div>
  <section>
<?php include_once('footer.php'); ?>
