<?php
include("config.php");
// Get the date from the form.
$conn = mysqli_connect("localhost", "root", "", "tsm");
$marks=$_POST['marks'];
$select=$_POST['select'];

if(isset($_COOKIE['work_completion'])) {
    $work_completion = ++$_COOKIE['work_completion'];
} else {
    $work_completion = 1;
}
setcookie('work_completion', $work_completion, time() + (86400 * 30), "/");
//echo$_COOKIE['work_completion'];
$new_name=$select.$_COOKIE['work_completion'];
$sql = "ALTER TABLE student ADD  $new_name VARCHAR(255)";
$i=1;
if (mysqli_query($conn, $sql)) {
    echo " successfully!";
} else {
    echo "Error : " . mysqli_error($conn);
}
foreach ($marks as $mark) {
    $sql = "UPDATE student SET $new_name ='$mark' WHERE SNo= '$i' ;";
    if (mysqli_query($conn, $sql)) {
        echo "<br>Data inserted successfully!";
    } else {
        echo "<br>Error inserting data: " . mysqli_error($conn);
    }
    $i++;
}
?>