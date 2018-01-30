<?php
    $errors = array();   
    $response = array(); 
    
    // Check for errors
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required.'; 
        
    }
    
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required.';
        
    }
    
    if (!empty($errors)) {
        $response['success'] = false;
        $response['errors']  = $errors;
    } else {
        $response['success'] = true;
        $response['message'] = 'Success!';
    }
    
    echo json_encode($response);
?>