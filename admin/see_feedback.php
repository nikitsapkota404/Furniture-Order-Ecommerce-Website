<?php
$sql = "SELECT feedback.feedback_id, feedback.feedback_text, user_table.user_name,user_table.user_email,user_table.user_contact 
        FROM feedback 
        JOIN user_table ON feedback.feedback_id = user_table.user_id";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    
</head>
<body>
    <h3 class="text-center text-success">All Feedbacks</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-warning">
            <tr>
                <th>User ID</th>
                <th>User name</th>
                <th>User email</th>
                <th>User Contact</th>
                <th>Message from user</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["feedback_id"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["user_email"] . "</td>";
                echo "<td>" . $row["user_contact"] . "</td>";
                echo "<td>" . $row["feedback_text"] . "</td>";
                echo "<td><a href='adminstore.php?delete_feedback=" . $row["feedback_id"] . "'><i class='fa-solid fa-trash'></i></a></td>";                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
