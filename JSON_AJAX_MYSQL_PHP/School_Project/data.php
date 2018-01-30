<?php
include 'db.php';
if($_REQUEST['req'] != ''){
    if($_REQUEST['req'] == 'add'){
        $name = $_REQUEST['st_name'];
        $fee = $_REQUEST['st_fee'];
        $sub = $_REQUEST['st_sub'];
        $ins = "INSERT INTO student (name,fee,subject) VALUES ('$name', '$fee', '$sub')";
        $ins_run = mysqli_query($conn, $ins);
    }
    elseif($_REQUEST['req'] == 'del'){
        $id = $_REQUEST['id'];
        $del = "DELETE FROM student WHERE id = '$id'";
        $del_run = mysqli_query($conn, $del);
    }
}
$sel = "SELECT * FROM student";
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
