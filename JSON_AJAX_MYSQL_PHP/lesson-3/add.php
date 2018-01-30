<?php
    $conn = new mysqli("localhost","root","","jsoncourse");
    
    if($conn->connect_error){
        die("error");
    }
    
    $sql = $conn->prepare("INSERT INTO users (`firstName`, `lastName`, `age`) VALUES (?,?,?)");
    $sql->bind_param("ssi",$_POST['firstName'],$_POST['lastName'], $_POST['age']);
    
    if($sql->execute()){
        echo 'success';
    }else{
        echo 'error '. mysqli_error($conn);
    }
    
    $sql->close();
?>