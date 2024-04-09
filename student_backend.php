<?php
include("connection.php");
include("config.php");
session_start();

if (isset($_POST['update_submit'])) {
    $email=$_POST['email'];
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $query = "SELECT * FROM student_login WHERE Email = '$email' && pass = '$old_pass' ";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $sql = "UPDATE student_login SET Pass ='$new_pass' WHERE email='$email' ;";
        $result = mysqli_query($conn, $sql);
        $_SESSION['submission']='PASSWORD UPDATED';
        $_SESSION['display']=1;
        header('location:student_login.php');
        
    } else {
        $_SESSION['submission']='Please fill correct infomation';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
}

if (isset($_POST['vb_doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO vb_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}

if (isset($_POST['cg__doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO cg_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}


if (isset($_POST['cg_doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO cg_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}

if (isset($_POST['project_doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO project_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}

if (isset($_POST['ecom_doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO cg_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}


if (isset($_POST['ecom_doubt_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $doubt_by=$_COOKIE['student_name'];
    $student_roll=$_COOKIE['student_roll'];
    $doubt=$_POST['your_doubt'];
    $query = "INSERT INTO cg_doubt(date,doubt_by,roll,question) values('$date','$doubt_by','$student_roll','$doubt')  ";
    $result=mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['submission']='Doubt submitted successfully';
        $_SESSION['display']=1;
        header('location:student_login.php');
    }
    else{
        $_SESSION['submission']='Something Went wrong';
        $_SESSION['display']=1;
        header('location:student_login.php');

    }
}



?>