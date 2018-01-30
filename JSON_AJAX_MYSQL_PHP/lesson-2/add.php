<?php
    //add.php
    include('conn.php');
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    
    $sql = "INSERT INTO users (`firstName`, `lastName`, `age`) VALUES ('".$firstName."','".$lastName."','".$age."')";
   
    if(mysqli_query($conn, $sql)){
        echo 'success';
    }else{
        echo 'error '. mysqli_error($conn);
    }
    
    mysqli_close($conn);


?>