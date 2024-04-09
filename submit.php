
    <?php
    include("config.php");
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "tsm");
    //teacher signup
    if (isset($_POST['tsubmit'])) {
        $name   =  $_POST['tname'];
        $phone   =  $_POST['tphone'];
        $email   =  $_POST['temail'];
        $pass   =  $_POST['tpassword'];
        $subject = $_POST['select'];
        $checkid = "SELECT * FROM teacher_login WHERE Email = '$email'";
        $data = mysqli_query($conn, $checkid);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $_SESSION['message'] = 'Email allready exist !';
            header('location:Main.php');
        } else {
            $query = "INSERT INTO teacher_login VALUES ('$name','$subject','$phone','$email','$pass')";
            $result1 = mysqli_query($conn, $query);
            if ($result1) {
                setcookie("teacher_subject", "$subject", time() + 7200, "/");
                header("location:teacher_login.php");
            }
        }
    }
    // parents signup
    if (isset($_POST['psubmit'])) {
        # code...
        $name   =  $_POST['pname'];
        $phone  =  $_POST['pphone'];
        $mpin   =  $_POST['pmpin'];
        $pass   =  $_POST['ppassword'];
        $sql = "SELECT * FROM student_login WHERE Phone='$mpin'";
        $result = mysqli_query($conn, $sql);
        $data_found = mysqli_num_rows($result);
        if ($data_found == 1) {
            $row = mysqli_fetch_assoc($result);
            $roll = $row['Roll'];
            setcookie("roll_for_parent", "$roll", time() + 7200, "/");
            $checkid = "SELECT * FROM parent_login WHERE Phone = '$phone'";
            $data = mysqli_query($conn, $checkid);
            $total = mysqli_num_rows($data);
            if ($total == 1) {
                $_SESSION['message'] ='You allready hava account';
                header('location:Main.php');
            } else {
                $result1 = mysqli_query($conn, "INSERT INTO parent_login VALUES ('$name','$phone','$mpin','$pass')");
                header("location:student-login.html");
            }
        }else{
            $_SESSION['message']="Student number doesn't match";
            header('location:parent_login.php');
        }
    }


    //student submit 
    if (isset($_POST['ssubmit'])) {
        $name   =  $_POST['sname'];
        $roll =  $_POST['srollno'];
        $phone   =  $_POST['sphone'];
        $email  =  $_POST['semail'];
        $pass   =  $_POST['spassword'];
        $checkid = "SELECT * FROM student_login WHERE Email = '$email'";
        $data = mysqli_query($conn, $checkid);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $_SESSION['message'] = 'Email already exist';
            header('location:Main.php');
        } else {
            //main table to store all data 
            mysqli_query($conn, "INSERT INTO student_login (Name, Roll, Phone, Email, Pass) VALUES ('$name','$roll','$phone','$email','$pass')");
            //computer graphics table 
            mysqli_query($conn, "INSERT INTO cg_atten ( Roll,Name) VALUES ('$roll','$name')");
            mysqli_query($conn, "INSERT INTO cg_test ( Roll,Name) VALUES ('$roll','$name')");
            //e-commerce table
            mysqli_query($conn, "INSERT INTO ecom_test ( Roll,Name) VALUES ('$roll','$name')");
            mysqli_query($conn, "INSERT INTO ecom_atten ( Roll,Name) VALUES ('$roll','$name')");
            //project table 
            mysqli_query($conn, "INSERT INTO project_atten ( Roll,Name) VALUES ('$roll','$name')");
            mysqli_query($conn, "INSERT INTO project_test ( Roll,Name) VALUES ('$roll','$name')");
            //visual basics 
            $query2 = "INSERT INTO vb_atten (Roll ,Name) values('$roll','$name') ";
            $query2 = "INSERT INTO vb_test (Roll ,Name) values('$roll','$name') ";
            setcookie("student_roll", "$roll", time() + 7200, "/");
            setcookie("student_name", "$name", time() + 7200, "/");
            header("location:student_login.php");
        }
    }
    //student login check
    if (isset($_POST['lssubmit'])) {
        $email = $_POST['lsemail'];
        $pass   =  $_POST['lspassword'];
        $query = "SELECT * FROM student_login WHERE Email = '$email' && pass = '$pass' ";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $row = mysqli_fetch_assoc($data);
            $roll = $row['Roll'];
            $name = $row['Name'];
            setcookie("student_roll", "$roll", time() + 7200, "/");
            setcookie("student_name", "$name", time() + 7200, "/");
            header('location:student_login.php');
        } else {
            $_SESSION['message'] = 'Please fill correct information';
            header('location:Main.php');
        }
    }
    //teacher login check
    if (isset($_POST['ltsubmit'])) {
        $email = $_POST['ltemail'];
        $pass   =  $_POST['ltpassword'];
        $query = "SELECT * FROM teacher_login WHERE Email = '$email' && pass = '$pass' ";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $row = mysqli_fetch_assoc($data);
            $subject = $row["subject"];
            $name = $row['Name'];
            setcookie("teacher_name", "$name", time() + 7200, "/");
            setcookie("teacher_subject", "$subject", time() + 7200, "/");
            header('location:teacher_login.php');
        } else {
            $_SESSION['message'] = 'Please fill correct information';
            header('location:Main.php');
        }
    }
    //parent login check
    if (isset($_POST['lpsubmit'])) {
        $phone = $_POST['lpphone'];
        $pass   =  $_POST['lppassword'];
        $query = "SELECT * FROM parent_login WHERE Phone = '$phone' && pass = '$pass'  ";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $row = mysqli_fetch_assoc($data);
            $student_phone=$row['student_phone'];
            $sql="SELECT * FROM student_login WHERE Phone='$student_phone'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $roll = $row['Roll'];
            setcookie("roll_for_parent", "$roll", time() + 7200, "/");
            header('location:parent_login.php');
        } else {
            $_SESSION['message'] = 'Please fill correct information';
            header('location:Main.php');
        }
    }
    mysqli_close($conn);
    ?>