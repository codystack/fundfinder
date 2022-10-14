<?php
session_start();
// Connect database
include "./config/db.php";

// Login script
if (isset($_POST['login_btn'])) {

    $password = $conn->real_escape_string($_POST['password']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $email = $conn->real_escape_string($_POST['email']);
    $status = $conn->real_escape_string($_POST['status']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $userID = $conn->real_escape_string($_POST['userID']);

    $password = sha1($password);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $companyName = $row['companyName'];
        $email = $row['email'];
        $id = $row['id'];
        $status = $row['status'];
        $picture = $row['picture'];
        $phone = $row['phone'];
        $userID = $row['userID'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['companyName'] = $companyName;
        $_SESSION['picture'] = $picture;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['id'] = $id;
        $_SESSION['userID'] = $userID;
        if ($status == 'Inactive'){
            $_SESSION['error_message'] = "Account Deactivated";
            echo "<meta http-equiv='refresh' content='5; URL=login'>";
        }if ($status == 'Active') {
            $_SESSION['success_message'] = "Login Successful, you're been redirected...";
            header('location: dashboard');
        }
    }else {
        $_SESSION['error_message'] = "Incorrect Login Details".mysqli_error($conn);
        echo "<meta http-equiv='refresh' content='5; URL=login'>";
    }
}



// Account creation script
if (isset($_POST['register_btn'])) {

    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $date = $conn->real_escape_string($_POST['date']);
    $revenue = $conn->real_escape_string($_POST['revenue']);

    
    $query = "INSERT INTO getStarted (firstName, lastName, companyName, email, phone, amount, date, revenue) 
                VALUES('$firstName', '$lastName', '$companyName', '$email', '$phone', '$amount', '$date', '$revenue')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        $_SESSION['email'] = $email;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        header('location: successful');
    }else {
        $_SESSION['error_message']    = "Error processing registration".mysqli_error($conn);
        echo "<meta http-equiv='refresh' content='5; URL=register'>";
    }
}
