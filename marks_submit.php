<?php
$conn = mysqli_connect("localhost", "root", "", "tsm");
session_start();
//code to save marks into datavbase
if (isset($_POST['submit_marks'])) {
    # code...
    $marks = $_POST['marks'];
    $date = $_POST['marks-date'];
    $new_date = date('d_m_Y', strtotime($date));
    $d = "Date";
    $i = 1;
    $subject = $_COOKIE['teacher_subject'];
    if ($subject == 'vb') {
        $sql = "ALTER TABLE vb_test ADD $new_date int(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($marks as $mark) {
            $sql = "UPDATE vb_test SET $new_date='$mark' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Marks submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == 'cg') {
        $sql = "ALTER TABLE cg_test ADD $new_date int(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($marks as $mark) {
            $sql = "UPDATE cg_test SET $new_date='$mark' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Marks submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == 'ecom') {
        $sql = "ALTER TABLE ecom_test ADD $new_date int(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($marks as $mark) {
            $sql = "UPDATE ecom_test SET $new_date='$mark' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Marks submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == 'project') {
        $sql = "ALTER TABLE project_test ADD $new_date int(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($marks as $mark) {
            $sql = "UPDATE project_test SET $new_date='$mark' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Marks submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    }
}

//code to save the attendance information 
if (isset($_POST['submit_atten'])) {
    $attendance = $_POST['attendance'];
    $date = $_POST['atten_date'];
    $new_date = date('d_m_Y', strtotime($date));
    $i = 1;
    $subject = $_COOKIE['teacher_subject'];
    if ($subject == 'vb') {
        $sql = "ALTER TABLE vb_atten ADD $new_date varchar(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($attendance as $atten) {
            $sql = "UPDATE vb_atten SET $new_date='$atten' WHERE SNo= '$i';";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Attendance submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == 'cg') {
        $sql = "ALTER TABLE cg_atten ADD $new_date varchar(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($attendance as $atten) {
            $sql = "UPDATE cg_atten SET $new_date='$atten' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Attendance submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == 'ecom') {
        $sql = "ALTER TABLE ecom_atten ADD $new_date varchar(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($attendance as $atten) {

            $sql = "UPDATE ecom_atten  SET $new_date='$atten' WHERE SNo= '$i' ;";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Attendance submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } elseif ($subject == "project") {
        $sql = "ALTER TABLE project_atten ADD $new_date varchar(50)";
        $result = mysqli_query($conn, $sql);
        foreach ($attendance as $atten) {
            $sql = "UPDATE project_atten SET $new_date='$atten' WHERE SNo= '$i';";
            $result = mysqli_query($conn, $sql);
            $i++;
        }
        if ($result) {
            $_SESSION['submission'] = 'Attendance submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'Error while submiting';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    }
}

//code to save the assignment information 
if (isset($_POST['assign_submit'])) {
    $todate = $_POST['assign_date'];
    $date = date('d_m_Y', strtotime($todate));
    $assign = $_POST['assignment'];
    $subject = $_COOKIE['teacher_subject'];
    $sanitizedInput = mysqli_real_escape_string($conn, $assign);
    $sql = "INSERT INTO assign (last_date,subject,assign) VALUES ('$date','$subject','$sanitizedInput')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['submission'] = 'Assignment submited succesfully';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    } else {
        $_SESSION['submission'] = 'Error while submiting';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    }
    mysqli_close($conn);
}

//code to save the Homework 
if (isset($_POST['hw_submit'])) {
    $today = date('Y-m-d');
    $date = date('d_m_Y', strtotime($today));
    $homework = $_POST['homework'];
    $subject = $_COOKIE['teacher_subject'];
    $sanitizedInput = mysqli_real_escape_string($conn, $homework);

    $sql = "INSERT INTO homework (date,subject,homework) values('$date','$subject','$sanitizedInput')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['submission'] = 'Homework submited succesfully';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    } else {
        $_SESSION['submission'] = 'Error while submiting';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    }
    mysqli_close($conn);
}

//code to save the Notice +
if (isset($_POST['notice_submit'])) {
    $date = date('d_m_Y', strtotime($_POST['notice_date']));
    $notice = $_POST['notice'];
    $subject = $_COOKIE['teacher_subject'];
    $sanitizedInput = mysqli_real_escape_string($conn, $notice);
    $sql = "INSERT INTO notice (notice_date,subject,notice) VALUES ('$date','$subject','$sanitizedInput')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['submission'] = 'Notice submited succesfully';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    } else {
        $_SESSION['submission'] = 'Error while submiting';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    }
}


if (isset($_POST['submit_doubt'])) {
    $answer = $_POST['answer_input'];
    $number = $_POST['answer_number'];
    $table_name = $_SESSION['table_name'];
    if ($number > 0) {
        $query = "SELECT * FROM $table_name WHERE sno=$number";
        $result = mysqli_query($conn, $query);
        $num_row = mysqli_num_rows($result);
        if ($num_row == 1) {
            $sql = "UPDATE $table_name SET answer='$answer' WHERE sno= '$number' ;";
            mysqli_query($conn, $sql);
            $_SESSION['submission'] = 'Answer submited succesfully';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        } else {
            $_SESSION['submission'] = 'INCORRECT QUESTION NUMBER';
            $_SESSION['display'] = 1;
            header("location:teacher_login.php");
        }
    } else {
        $_SESSION['submission'] = 'Question number must be > 0';
        $_SESSION['display'] = 1;
        header("location:teacher_login.php");
    }
}

if (isset($_POST['update_submit'])) {
    $email = $_POST['email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $query = "SELECT * FROM teacher_login WHERE Email = '$email' && Pass = '$old_pass' ";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if ($total == 1) {
        $sql = "UPDATE teacher_login SET Pass ='$new_pass' WHERE email='$email' ;";
        $result = mysqli_query($conn, $sql);
        $_SESSION['submission'] = 'PASSWORD UPDATED';
        $_SESSION['display'] = 1;
        header('location:student_login.php');
    } else {
        $_SESSION['submission'] = 'Please fill correct infomation';
        $_SESSION['display'] = 1;
        header('location:student_login.php');
    }
}
