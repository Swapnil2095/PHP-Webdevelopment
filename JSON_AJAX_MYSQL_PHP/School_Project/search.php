<?php
include 'db.php';
$sel = "SELECT * FROM student WHERE name LIKE '%$_REQUEST[name]%'";
$sel_run = mysqli_query($conn, $sel);
$count = 1;
while($rows = mysqli_fetch_assoc($sel_run)){ ?>
    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['fee']; ?></td>
                        <td><?php echo $rows['subject']; ?></td>
                        <td>
                            <a class="btn btn-success btn-xs" onclick="edit_ajax('upd_req',<?php echo $rows['id']; ?>);">Edit</a>
                            <a class="btn btn-danger btn-xs" onclick="ajax('del', <?php echo $rows['id']; ?>)">Delete</a>
                        </td>
                    </tr>
<?php
$count++;
}
   ?>
