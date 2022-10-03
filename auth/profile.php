<?php

// Connect database
include "./config/db.php";

    //Profile Update
    if(isset($_POST['update_profile_btn'])) {

        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $email = $conn->real_escape_string($_POST['email']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $companyName = $conn->real_escape_string($_POST['companyName']);

        $id = $_SESSION['id'];
        $sql=mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
        $result=mysqli_fetch_array($sql);
        if($result>0)
        {
            $conn=mysqli_query($conn,"UPDATE users SET firstName='$firstName', lastName='$lastName', firstName='$firstName', email='$email', phone='$phone', companyName='$companyName' where id='".$_SESSION['id']."'");
            $_SESSION['success_message'] = "Profile updated 👍";
            echo "<meta http-equiv='refresh' content='5; URL=account'>";
        }
        else
        {
            $_SESSION['error_message'] = "Error updating profile.".mysqli_error($conn);
            echo "<meta http-equiv='refresh' content='5; URL=account'>";
        }
    }