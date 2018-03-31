<?php include "db.php"; ?>
<?php include "header.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php

    if (isset($_POST['user_name']) && isset($_POST['password'])) {

        //login_user($_POST['username'], $_POST['password']);

        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $user_name = mysqli_real_escape_string($connection, $user_name);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE user_name = '{$user_name}'";
        $select_user_query = mysqli_query($connection, $query);
        if(!$select_user_query){
            die("Query Failed." .mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_user_query)){

            $db_user_id = $row['user_id'];
            $db_user_role = $row['user_role'];
            $db_user_name =  $row['user_name'];
            $db_user_firstname =  $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_password =  $row['user_password'];

        }

        //$password = crypt($password, $db_user_password);

        if(password_verify($password, $db_user_password)){
            echo "Entry Matched.";
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            header("Location: ../admin");

        }else{

            header("Location: ../index.php");
        }

    }

?>
