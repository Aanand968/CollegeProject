<?php
$conn = mysqli_connect("localhost", "root", "", "tsm");
$ndate=date('d-m-Y',strtotime($_POST['ndate']));
$result=mysqli_query($conn,"ALTER TABLE date ADD $ndate varchar(50);");
if ($result) {
    echo"enterd succesfully";
}
else{
    echo"NOt enterd";
}
echo"$ndate";
?>