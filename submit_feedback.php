
<?php
include('includes/connect.php');
session_start();


// Prepare SQL statement to insert feedback into the database
if(isset($_SESSION['user_name'])){
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO feedback (feedback_text) VALUES ('$feedback')";
    if ($con->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully')</script>";
    echo "<script>window.open('contact.php','_self')</script>";
            
              
            }
   
}else{
    echo "<script>alert('First login to send feedback.')</script>";
    echo "<script>window.open('./user_store/user_login.php','_self')</script>";
}
?>
