<?php
include 'db.php';
if($_REQUEST['req'] == 'upd_req'){
    $sel = "SELECT * FROM student WHERE id = '$_REQUEST[id]'";
    $sel_run = mysqli_query($conn, $sel);
    while($rows = mysqli_fetch_assoc($sel_run)){ ?>
    <div class="form-group">
                    <label class="label-control col-md-2" for="name">Name</label>
                    <div class="col-md-10">
                        <input type="text" id="upd_name" class="form-control" value="<?php echo $rows['name']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label-control col-md-2" for="fee">Student Fee</label>
                    <div class="col-md-10">
                        <input type="number" id="upd_fee" class="form-control" value="<?php echo $rows['fee']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="label-control col-md-2" for="subject">Student Subject</label>
                    <div class="col-md-10">
                        <select class="form-control" id="upd_subject">
                            <option value="Chemistry" <?php if($rows['subject'] == 'Chemistry'){ echo 'selected'; } ?>>Chemistry</option>
                            <option value="Computer" <?php if($rows['subject'] == 'Computer'){ echo 'selected'; } ?>>Computer</option>
                            <option value="Physics" <?php if($rows['subject'] == 'Physics'){ echo 'selected'; } ?>>Physics</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-success btn-block" onclick="edit_ajax('upd_btn',<?php echo $rows['id']; ?>);">Edit Record</button>
                    </div>
        </div>    
<?php    
}
}
elseif($_REQUEST['req'] == 'upd_btn'){
    $upd = "UPDATE student SET name ='$_REQUEST[u_name]', fee= '$_REQUEST[u_fee]', subject ='$_REQUEST[u_sub]' WHERE id = '$_REQUEST[id]'";
    $upd_run = mysqli_query($conn, $upd);
}
?>
