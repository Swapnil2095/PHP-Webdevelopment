<?php
if ( ! empty ( $_POST ) ) {
    // Post data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    
    // Check for valid email
    if ( ! $email = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL ) ) {
        die('Invalid email');
    }
    
    // Database credentials
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'php101';
    $db_host = 'localhost';
    
    // Fire up the connection
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    
    // Check we're connected
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    // Prepare our query
    $stmt = $mysqli->prepare("INSERT INTO users (user_name, user_email) VALUES (?,?)");
    $stmt->bind_param('ss', $name, $email);
    
    // Run the query
    $stmt->execute();
    
    // Get ID of row we just inserted
    $id = $stmt->insert_id;
    //$id = mysqli_insert_id($mysqli);
    printf($id);
    echo "<br>";
    
    // Get the data we just submitted
    $result = $mysqli->query("SELECT user_name, user_email FROM users WHERE ID = {$id}");
    $user = $result->fetch_object();
    
    echo "<br>";
    //printf($result);
    echo "<br>";
    //echo $user;
    echo "<br>";
    //$result->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <style>
            body {
                margin: 0;
                padding: 10px;
                background:#208fe5;
                font-family: Arial, sans-serif;
                font-size: 14px;
            }
            .form {
                background: #ffffff;
                border-radius: 5px;
                padding: 20px;
                max-width: 480px;
                margin: 15px auto;
            }
            .form, 
            .text,
            .email,
            .submit {
                display: block;
                box-sizing: border-box;
                width: 100%;
            }
            .text,
            .email,
            .submit {
                padding: 10px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }
            .form h3 {
                line-height: 1.2;
                font-size: 14px;
                margin-top: 5px;
                font-weight: normal;
            }
            .submit {
                border: none;
                background: #FEBB13;
                color: #222;
                font-size: 24px;
            }
        </style>
        <title>Form to Database</title>
    </head>
    <body>
        <form action="" method="post" class="form">
            <?php if ( $user ) : ?>
                <h3>Here's the data you submitted:</h3>
                <p>Name: <?php echo htmlspecialchars($user->user_name, ENT_COMPAT, 'UTF-8'); ?></p>
                <p>Email: <?php echo htmlspecialchars($user->user_email, ENT_COMPAT, 'UTF-8'); ?></p>
            <?php endif; ?>
            
            <h3>Enter your name and email address below:</h3>
            <p><input type="text" name="name" class="text" placeholder="Enter your full name"></p>
            <p><input type="email" name="email" class="text email" placeholder="Enter your email address"></p>
            <p><input type="submit" class="submit" value="Submit"></p>
        </form>
    </body>
</html>
    