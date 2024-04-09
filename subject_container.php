<?php 
$conn = mysqli_connect("localhost", "root", "", "tsm");

$_COOKIE['notice_table']='notice';
$_COOKIE['assign_table']='assign';
$_COOKIE['homework_table']='homework';

//if vb button clicked 
if(isset($_POST['vb_subject'])) {
    $_COOKIE['test_table']='vb_test';
    $_COOKIE['atten_table']='vb_atten';
    $_COOKIE['subject']='vb';
    header("location:student_login.php");
}
//cg button clicked
elseif(isset($_POST['cg_subject'])) {
    $_COOKIE['test_table']='cg_test';
    $_COOKIE['atten_table']='cg_atten';
    $_COOKIE['subject']='cg';
    header("location:student_login.php");
}
//project button clicked
elseif(isset($_POST['project_subject'])) {
    $_COOKIE['test_table']='project_test';
    $_COOKIE['atten_table']='project_atten';
    $_COOKIE['subject']='project';
    header("location:student_login.php");
}
//ecom button clicked
elseif(isset($_POST['ecom_subject'])) {
    $_COOKIE['test_table']='ecom_test';
    $_COOKIE['atten_table']='ecom_atten';
    $_COOKIE['subject']='ecom';
    header("location:student_login.php");
}
else{
   echo"Something went wrong please contact to the Host". mysqli_errno($conn);
}

header("location:student_login.php");