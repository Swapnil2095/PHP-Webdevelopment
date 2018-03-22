<div class="col-md-3">
    <p class="lead">Shop Name</p>
    <div class="list-group">

       <?php
          $query = "select * from categories";
          $send_query = mysqli_query($connection, $query);

          if(!$send_query){
            die("Query Failed" . mysqli_error($connection));
          }

          while($row = mysqli_fetch_array($send_query)){
            echo "<a href='' class='list-group-item'> {$row['cat_title']}</a>";
          }

       ?>
       
    </div>
</div>
