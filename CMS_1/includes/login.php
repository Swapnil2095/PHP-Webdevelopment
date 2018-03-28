<?php include "db.php"; ?>
<?php include "header.php"; ?>
<?php session_start(); ?>

<?php

    if (isset($_POST['username']) && isset($_POST['password'])) {

        //login_user($_POST['username'], $_POST['password']);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT * FROM users WHERE user_name = '{$username}'";
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

        if($username !== $db_user_name && $password !== $db_user_password){
            header("Location: ../index.php");
        }else if($username == $db_user_name && $password == $db_user_password){
            $_SESSION['user_name'] = $db_user_name;
            $_SESSION['user_firstname'] = $user_firstname;
            $_SESSION['user_lastname'] = $user_lastname;
            $_SESSION['user_role'] = $user_role;

            header("Location: ../admin");
        }else{
            header("Location: ../index.php");
        }

    } 

?>