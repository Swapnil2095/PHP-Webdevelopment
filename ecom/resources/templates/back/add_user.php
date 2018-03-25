<?php add_user(); ?>

<div class="col-md-12">

<div class="row">

<h1 class="page-header">
   Add New User

</h1>
</div>


<aside id="admin_sidebar" class="col-md-5">

</aside><!--SIDEBAR-->


<aside id="admin_sidebar" class="col-md-7">


    <div class="col-md-8">

          <!---div class="form-group">
              <label for="user">Image</label>
              <input type="file" name="file">

          </div--->
      <form action="" method="post" >
        <div class="form-group">
            <label for="username">User Name </label>
                <input type="text" name="username" class="form-control">

        <div>

            <!---div class="form-group">
                <label for="user">First Name </label>
                    <input type="text" name="first_name" class="form-control">

                </div>
                <div class="form-group">
                    <label for="user">Last Name </label>
                        <input type="text" name="last_name" class="form-control">

                    </div---------->

            <div class="form-group">
                <label for="email">Email </label>
                    <input type="email" name="email" class="form-control">

            </div>

            <div class="form-group">
                <label for="password">Password </label>
                   <input type="password" name="password" class="form-control">

           </div>

          <div class="form-group">
                <a href="#" id="user-id" class="btn btn-danger">Delete</a>
                <input type="submit" name="add_user" class="btn btn-primary pull-right" value="Add User">
          </div>


        </form>


  </div>


</aside><!--SIDEBAR-->
