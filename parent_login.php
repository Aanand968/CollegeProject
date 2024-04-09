<?php
include("connection.php");
include("config.php");
session_unset();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="parent_login.css?v=<?= $version ?>" />
</head>

<body>
    <div class="titlebar">
        <div class="logo">
            <img style="height: 60px; width: 100px" src="dav_logo-1.png" alt="" />
        </div>
        <div class="menu">
            <ul class="menulist">
                <li><a href="Main.php">Home</a></li>
                <li><a href="Main.php">Log out</a></li>
            </ul>
        </div>
    </div>
    <div class="center_content">
        <div class="side_bar">
            <div class="menu_heading">
                <button onclick="open_marks_div()"> MARKS </button>
                <button onclick="open_atten_div()"> ATTENDANCE </button>
            </div>
        </div>
        <script src="parent_login.js"></script>
        <div class="main_center">
            <div class="marks_container" id="mark_container">
                <div class="close_btn">
                    <button class="close_button" id="update_close" onclick="close_marks_container()">X</button>
                    <h2>MARKS OF STUDENT</h2>
                </div>
                <div class="marks_result">
                    <table class="marks_table">
                        <thead>
                            <tr>
                                <th class="marks_th_date">DATES</th>
                                <th class="marks_th_subject">SUBJECT</th>
                                <th class="marks_th_obtained">MARKS OBTAINED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $roll = $_COOKIE['roll_for_parent'];
                            $query = "SELECT * FROM vb_test Where Roll='$roll' ";
                            $data = mysqli_query($conn, $query);
                            //getting the number of rows 
                            $total = mysqli_num_rows($data);
                            $counter = 1;
                            if ($total != 0) {
                                $result = mysqli_fetch_assoc($data);
                                foreach ($result as $key => $value) {
                                    if ($counter > 3) { ?>
                                        <tr>
                                            <td class="marks_td"><?php echo  $key  ?></td>
                                            <td class="marks_td"><?php echo  "Vb.Net"  ?></td>
                                            <td class="marks_td"><?php echo  $value; ?></td>
                                        </tr>
                                    <?php }
                                    $counter++;
                                }
                            }
                            $query = "SELECT * FROM cg_test Where Roll='$roll' ";
                            $data = mysqli_query($conn, $query);
                            //getting the number of rows 
                            $total = mysqli_num_rows($data);
                            $counter = 1;
                            if ($total != 0) {
                                $result = mysqli_fetch_assoc($data);
                                foreach ($result as $key => $value) {
                                    if ($counter > 3) { ?>
                                        <tr>
                                            <td class="marks_td"><?php echo  $key  ?></td>
                                            <td class="marks_td"><?php echo  "Computer Graphics"  ?></td>
                                            <td class="marks_td"><?php echo  $value; ?></td>
                                        </tr>
                                    <?php }
                                    $counter++;
                                }
                            }
                            $query = "SELECT * FROM project_test Where Roll='$roll' ";
                            $data = mysqli_query($conn, $query);
                            //getting the number of rows 
                            $total = mysqli_num_rows($data);
                            $counter = 1;
                            if ($total != 0) {
                                $result = mysqli_fetch_assoc($data);
                                foreach ($result as $key => $value) {
                                    if ($counter > 3) { ?>
                                        <tr>
                                            <td class="marks_td"><?php echo  $key  ?></td>
                                            <td class="marks_td"><?php echo  "Project"  ?></td>
                                            <td class="marks_td"><?php echo  $value; ?></td>
                                        </tr>
                                    <?php }
                                    $counter++;
                                }
                            }
                            $query = "SELECT * FROM ecom_test Where Roll='$roll' ";
                            $data = mysqli_query($conn, $query);
                            //getting the number of rows 
                            $total = mysqli_num_rows($data);
                            $counter = 1;
                            if ($total != 0) {
                                $result = mysqli_fetch_assoc($data);
                                foreach ($result as $key => $value) {
                                    if ($counter > 3) { ?>
                                        <tr>
                                            <td class="marks_td"><?php echo  $key  ?></td>
                                            <td class="marks_td"><?php echo  "E-Commerce"  ?></td>
                                            <td class="marks_td"><?php echo  $value; ?></td>
                                        </tr>
                            <?php }
                                    $counter++;
                                }
                            }
                            echo "</tbody>  </table>";
                            ?>
                </div>
            </div>
            <script src="parent_login.js"></script>

            <!-- now we will create a container to fetch the attendance of the student -->
            <div id="atten_container" class="atten_container">
                <div class="close_btnn">
                    <button class="close_button" onclick="close_atten_container()">X</button>
                </div>
                <div class="atten_header">
                    <div class="subject_list">
                        <ul class="ul_list">
                            <li><button id="vb_doubt_answer" onclick="open_vb_atten()"> VB.NET</button></li>
                            <li><button id="cg_doubt_answer" onclick="open_cg_atten()"> COMPUTER GRAPHICS</button></li>
                            <li><button id="project_doubt_answer" onclick="open_project_atten()">PROJECT</button></li>
                            <li><button id="ecom_doubt_answer" onclick="open_ecom_atten()">E-COMMERCE</button></li>
                        </ul>
                    </div>
                </div>
                <div class="main_atten_container">
                    <!-- vb doubt container -->
                    <div id="vb_atten_container">
                        <table>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="atten_total">LECTURES DATE</th>
                                    <th class="atten_lectures">STATUS</th>
                                </tr>
                                </thead>
                                <?php
                                $roll = $_COOKIE['roll_for_parent'];
                                $query = "SELECT * FROM vb_atten Where Roll='$roll' ";
                                $data = mysqli_query($conn, $query);
                                // Get the number of columns in the table
                                $vb_column = mysqli_num_fields($data);
                                //getting the number of rows 
                                $total = mysqli_num_rows($data);
                                $count = 1;
                                if ($total != 0) {
                                    $result = mysqli_fetch_assoc($data);
                                    foreach ($result as $key => $value) {
                                        if ($count > 3) { ?>
                                            <tr>
                                                <td>
                                                    <h2><?php echo $key  ?></h2>
                                                </td>
                                                <td>
                                                    <h2><?php echo $value ?> </h2>
                                                </td>
                                            </tr>
                                    <?php  }
                                        $count++;
                                    }
                                    echo "</tbody>  </table> ";
                                }
                                if ($count == 4) {
                                    ?>
                                    <h2 class="no_answers">There is no data </h2>
                                <?php
                                } ?>
                    </div>
                    <!-- cg doubts -->
                    <div id="cg_atten_container">
                        <table>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="atten_total">LECTURES DATE</th>
                                    <th class="atten_lectures">STATUS</th>
                                </tr>
                                </thead>
                                <?php
                                $roll = $_COOKIE['roll_for_parent'];
                                $query = "SELECT * FROM cg_atten Where Roll='$roll' ";
                                $data = mysqli_query($conn, $query);
                                // Get the number of columns in the table
                                $vb_column = mysqli_num_fields($data);
                                //getting the number of rows 
                                $total = mysqli_num_rows($data);
                                $count = 1;
                                if ($total != 0) {
                                    $result = mysqli_fetch_assoc($data);
                                    foreach ($result as $key => $value) {
                                        if ($count > 3) { ?>
                                            <tr>
                                                <td>
                                                    <h2><?php echo $key  ?></h2>
                                                </td>
                                                <td>
                                                    <h2><?php echo $value ?> </h2>
                                                </td>
                                            </tr>
                                    <?php  }
                                        $count++;
                                    }
                                    echo "</tbody>  </table> ";
                                }
                                if ($count == 4) {
                                    ?>
                                    <h2 class="no_answers">There is no data </h2>
                                <?php
                                } ?>
                    </div>
                    <!-- project doubts -->
                    <div id="project_atten_container">
                        <table>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="atten_total">LECTURES DATE</th>
                                    <th class="atten_lectures">STATUS</th>
                                </tr>
                                </thead>
                                <?php
                                $roll = $_COOKIE['roll_for_parent'];
                                $query = "SELECT * FROM project_atten Where Roll='$roll' ";
                                $data = mysqli_query($conn, $query);
                                // Get the number of columns in the table
                                $vb_column = mysqli_num_fields($data);
                                //getting the number of rows 
                                $total = mysqli_num_rows($data);
                                $count = 1;
                                if ($total != 0) {
                                    $result = mysqli_fetch_assoc($data);
                                    foreach ($result as $key => $value) {
                                        if ($count > 3) { ?>
                                            <tr>
                                                <td>
                                                    <h2><?php echo $key  ?></h2>
                                                </td>
                                                <td>
                                                    <h2><?php echo $value ?> </h2>
                                                </td>
                                            </tr>
                                    <?php  }
                                        $count++;
                                    }
                                    echo "</tbody>  </table> ";
                                }
                                if ($count == 4) {
                                    ?>
                                    <h2 class="no_answers">There is no data </h2>
                                <?php
                                } ?>
                    </div>
                    <!-- E-commerce doubts -->
                    <div id="ecom_atten_container">
                        <table>
                            <thead>
                            <tbody>
                                <tr>
                                    <th class="atten_total">LECTURES DATE</th>
                                    <th class="atten_lectures">STATUS</th>
                                </tr>
                                </thead>
                                <?php
                                $roll = $_COOKIE['roll_for_parent'];
                                $query = "SELECT * FROM ecom_atten Where Roll='$roll' ";
                                $data = mysqli_query($conn, $query);
                                // Get the number of columns in the table
                                $vb_column = mysqli_num_fields($data);
                                //getting the number of rows 
                                $total = mysqli_num_rows($data);
                                $count = 1;
                                if ($total != 0) {
                                    $result = mysqli_fetch_assoc($data);
                                    foreach ($result as $key => $value) {
                                        if ($count > 3) { ?>
                                            <tr>
                                                <td>
                                                    <h2><?php echo $key  ?></h2>
                                                </td>
                                                <td>
                                                    <h2><?php echo $value ?> </h2>
                                                </td>
                                            </tr>
                                    <?php  }
                                        $count++;
                                    }
                                    echo "</tbody>  </table> ";
                                }
                                if ($count == 4) {
                                    ?>
                                    <h2 class="no_answers">There is no data </h2>
                                <?php
                                } ?>
                    </div>
                </div>
            </div>
            <script src="parent_login.js"></script>
        </div>
    </div>
    </div>
</body>

</html>