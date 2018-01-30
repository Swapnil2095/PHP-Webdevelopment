<?php include('header.php'); ?>
<div class="wrapper">
    <form action="index.php" method="post">
        <h1 class="text-center">Login</h1>
        <?php if ( isset( $login_status ) && false == $login_status ) : ?>
        <div class="error">
            <p>Your username and password are incorrect. Try again.</p>
        </div>
        <?php endif; ?>
        <input type="text" class="text" name="username" placeholder="Enter username">
        <input type="text" class="text" name="password" placeholder="Enter password">
        <input type="submit" class="submit" value="Submit">
    </form>
</div>
<?php include('footer.php'); ?>