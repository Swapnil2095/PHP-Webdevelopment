
<form action="" method='comment'>
    <table class="table table-bordered table-hover">

        <thead>
            <tr>        
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>Status</th>
                <th>Date</th>
                <th>In Responce To</th>
                <th>Approve</th>
                <th>UnApprove</th>
                <th>Delete</th>
            </tr>
        </thead>
                
    <tbody>

        <?php 

            $query = "SELECT * FROM comments ";
            $select_comments = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_comments)) {
                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_post_id = $row['comment_post_id'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
                $comment_email = $row['comment_email'];
                echo "<tr>";

                echo "<td>$comment_id </td>";
                echo "<td>$comment_author</td>";


                echo "<td>$comment_content</td>";

                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";

    /*
                $query = "SELECT * FROM comments WHERE comment_comment_id = $comment_id";
                $send_comment_query = mysqli_query($connection, $query);

                $row = mysqli_fetch_array($send_comment_query);
                $comment_id = $row['comment_id'];
                $count_comments = mysqli_num_rows($send_comment_query);

                echo "<td><a href='comment_comments.php?id=$comment_id'>$count_comments</a></td>";
    */
                echo "<td>$comment_date </td>";

                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                $select_post_id_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                }


                echo "<td><a class='btn btn-primary' href='comments.php?approve=$comment_id'>Approve</a></td>";
                echo "<td><a class='btn btn-info' href='comments.php?unapprove=$comment_id'>Discard</a></td>";
                echo "<td><a class='btn btn-danger' href='comments.php?delete=$comment_id'>Delete</a></td>";
                echo "</tr>";
        
            }
            ?>

        </tbody>
    </table>         
</form>
            

<?php

    if (isset($_GET['approve'])) {

        $the_comment_id = escape($_GET['approve']);
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id   ";
        $approve_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");

    }


    if (isset($_GET['unapprove'])) {

        $the_comment_id = escape($_GET['unapprove']);
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
        $unapprove_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");

    }


    if (isset($_GET['delete'])) {

        $the_comment_id = escape($_GET['delete']);
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: comments.php");

    }


?>     
        
