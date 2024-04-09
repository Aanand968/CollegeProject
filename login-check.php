 <?php
    $conn = mysqli_connect("localhost", "root", "", "tsm");

if (isset($_POST['lssubmit'])) {
        $email = $_POST['lsemail'];
        $pass   =  $_POST['lspassword'];
        $query = "SELECT * FROM student_login WHERE Email = '$email' && pass = '$pass' ";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if ($total == 1) {
            $_SESSION['lsemail'] = $email;
            header('location:student-login.html');
        } else {
            header('location:test2.php');
        }
    }
    
    mysqli_close($conn);
    ?>