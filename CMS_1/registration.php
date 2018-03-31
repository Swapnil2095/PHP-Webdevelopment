<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $user_name = ($_POST['user_name']);
        $email = ($_POST['email']);
        $password = ($_POST['password']);

        if(!empty($user_name) && !empty($email) && !empty($password)){

            $user_name = mysqli_real_escape_string($connection, $user_name);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);

            $password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

            $query = "INSERT INTO users (user_name, user_email, user_password, user_role) ";
            $query .= "VALUES ('{$user_name}', '{$email}', '{$password}', 'subscriber') ";
            $register_user_query = mysqli_query($connection, $query);

            if(!$register_user_query){
                die("Query Failed. " . mysqli_error($connection));
            }

            $message = "Your Registration has been submitted.";
        }else{
            $message = "Some fields are empty.";
        }

    }else{
        $message = "";
    }
?>

    <!-- Navigation -->
    <?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">

                        <h1>Register</h1>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <h3 class="text-center"><?php echo $message; ?> </h3>
                                <div class="form-group">
                                    <label for="user_name" class="sr-only">user_name</label>
                                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Desired Username">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>

                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>
        <hr>

<?php include "includes/footer.php";?>
