<?php
// heaper functions

function set_message($msg){
  if(!empty($msg)){
    $_SESSION['message'] = $msg;
  }else{
    $msg = "";
  }
}

function display_message(){
  if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}


function redirect($location){
  header("Location: $location");
}

function query($sql){
  global $connection;
  return mysqli_query($connection, $sql);
}

function confirm($result){
  global $connection;

  if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
  }
}


function escape_string($string){
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
  return mysqli_fetch_array($result);
}

//get Product
function get_products(){
  $query = query("SELECT * FROM products");
  confirm($query);

while($row = fetch_array($query)){
  $product = <<<DELIMETER
<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
            <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Add to Cart</a>
        </div>
    </div>
</div>
DELIMETER;
echo $product;

}
}


function get_categories(){
  $query = query("select * from categories");
  confirm($query);

  while($row = fetch_array($query)){

$categories_links = <<<DELIMETER
<a href='category.php?id={$row['cat_id']}' class='list-group-item'> {$row['cat_title']}</a>
DELIMETER;

echo $categories_links;
  }
}

//get Category
function get_products_in_cat_page(){
  $query = query("SELECT * FROM products where product_category_id =".escape_string($_GET['id']));
  confirm($query);

while($row = fetch_array($query)){
  $product = <<<DELIMETER
  <div class="col-md-3 col-sm-6 hero-feature">
      <div class="thumbnail">
          <img src="{$row['product_image']}" alt="">
          <div class="caption">
              <h3>{$row['product_title']}</h3>
              <p>{$row['short_desc']}</p>
              <p>
                  <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
              </p>
          </div>
      </div>
  </div>
DELIMETER;
echo $product;

}
}

//shop
function get_products_in_shop_page(){
  $query = query("SELECT * FROM products");
  confirm($query);

while($row = fetch_array($query)){
  $product = <<<DELIMETER
  <div class="col-md-3 col-sm-6 hero-feature">
      <div class="thumbnail">
          <img src="{$row['product_image']}" alt="">
          <div class="caption">
              <h3>{$row['product_title']}</h3>
              <p>{$row['short_desc']}</p>
              <p>
                  <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
              </p>
          </div>
      </div>
  </div>
DELIMETER;
echo $product;

}
}


//Login

function login_user(){

  if(isset($_POST['submit'])){
    $username = escape_string($_POST['username']);
    $password = escape_string($_POST['password']);

    $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
    confirm($query);

    if(mysqli_num_rows($query) == 0){
      set_message("Your Password or Username is Wrong..");
      redirect("login.php");
    }else{
      set_message("Welcome to Admin {$username}");
      redirect("admin");
    }

  }

}


function send_message(){
  if(isset($_POST['submit'])){

    $to = "admin@gmail.com";
    $from_name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $headers = "FROM : {$from_name} {$email}";

    $result = mail($to, $subject, $message, $headers);

    if(!$result){
      set_message("Sorry.. WE could not able to sent your message.");
      redirect("contact.php");
    }else{
      set_message("Your message sent.");
      redirect("contact.php");
    }

  }
}




 ?>
