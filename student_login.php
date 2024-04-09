<?php
session_start();
$display = "none";
include("connection.php");
include("config.php");
$name = $_COOKIE['student_name'];
$roll = $_COOKIE['student_roll'];
if (isset($_SESSION['display'])) {
    $display = 'block';
    $message = $_SESSION['submission'];
}
session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="student-login.css?v=<?= $version ?>" />
</head>

<body>
    <!-- nav baar for the student portal  -->
    <div class="titlebar">
        <div class="logo">
            <img style="height: 60px; width: 100px" src="dav_logo-1.png" alt="" />
        </div>
        <div class="welcome_box">
            <h3><?php echo "Welcome&nbsp;&nbsp;&nbsp;&nbsp;" . $name . "!" ?> </h3>
        </div>
        <ul class="menulist">
            <li><a href="Main.php">Home</a></li>
            <li><a href="Main.php">Log out</a></li>
        </ul>
    </div>
    <!--Left side menu for the student portal  -->
    <div class="side_menu">
        <div class="width-15">
            <button class="student_menu" onclick="menu()">MENU</button>
            <div id="menu_div" class="menu_div">
                <button id="student_button" class="student-detail" onclick="student_detail()">STUDENT DETAILS</button>
                <div id="stu_detail" class="stu_details">
                    <ul class="detail-list">
                        <li><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $name; ?></li>
                        <li><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $roll; ?></li>
                        <!-- <li><button>Assignments</button></li>
                        <li><button>Home-work</button></li> -->
                    </ul>
                </div>
                <button id="student-button" class="update_pass_button" onclick="update_pass()">UPDATE PASSWORD</button>
                <button id="student-button" class="update_pass_button" onclick="open_doubt()">CHECK ME</button>
                <button id="student-button" class="update_pass_button" onclick="open_notice()">NOTICES</button>
            </div>
            <script src="student_login.js"></script>
        </div>
    </div>
    <!-- main center div -->
    <div class="main_center">
        <div id="popup-box" class="popup-box" style="display :<?= $display ?>" ;>
            <h3 class="close-button" onclick="document.getElementById('popup-box').style.display='none'">
                X
            </h3>
            <div class="box-title">
                <h3>MESSAGE!</h3>
            </div>
            <div class="box-content">
                <h4 class="box-text">
                    <?php echo "$message"; ?>
                </h4>

            </div>
        </div>

        <div id="update_pass_container" class="update_pass">
            <div class="close_btnn">
                <button class="update_close" id="update_close" onclick="close_update_container()">X</button>
            </div>
            <div class="pass_header">
                <h3><?php echo "Hello&nbsp;&nbsp;" . $name; ?></h3>
            </div>
            <form action="student_backend.php" method="POST">
                <div class="update_field">
                    <label> Enter your email</label><br>
                    <input class="update_input" type="email" name="email"><br>
                    <label> Enter your old password</label><br>
                    <input class="update_input" type="password" name="old_pass"><br>
                    <label>Enter your new password</label><br>
                    <input class="update_input" type="password" name="new_pass"><br>
                </div>
                <input type="submit" class="update_submit" name="update_submit">
            </form>
            <script src="student_login.js"></script>
        </div>

        <div class="width-85" id="subject_box">
            <!-- center div for the subjects -->
            <div class="all_subject">
                <div class="vb_subject_div">
                    <button class="all_button" onclick="open_vb_details()" name="vb_subject">Vb.Net</button>
                </div>
                <div>
                    <button class="all_button" onclick="open_cg_details()" name="cg_subject">Computer graphics</button>
                </div>
                <div><button class="all_button" onclick="open_project_details()" name="project_subject">Project</button>
                </div>
                <div>
                    <button class="all_button" onclick="open_ecom_details()" name="ecom_subject">Ecommerce</button>
                </div>
            </div>
        </div>
        <script src="student_login.js"></script>
        <!-- Now we will create the div for the subjects tha will display when you will click on the particular subjects -->
        <!-- creating the div for the VB subject -->
        <div class="all_container" id="all_container">
            <div class="close_btn">
                <button class="close_button" id="notice_close_btn" onclick="close_all_container()">X</button>
            </div>
            <!-- vb data display coding -->
            <div class="vb_data" id="vb_data">
                <!-- your teacher div -->
                <div class="subject_teacher">
                    <div class="div_heading">
                        <h3>Your Teacher</h3>
                    </div>
                    <div class="tcontainer">
                        <div class="tbox">
                            <div class="timgbox">
                                <img src="gunjanmam.jpg" alt="">
                            </div>
                            <div class="tcontent">
                                <h2 class="h2t">
                                    Gunjan Mam <br>
                                    <SPAN>Teaching PHP , VB.Net</SPAN>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- vb attandance div -->
                <div class="your_attendance">
                    <?php
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM vb_atten Where Roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    // Get the number of columns in the table
                    $vb_column = mysqli_num_fields($data);
                    //getting the number of rows 
                    $total = mysqli_num_rows($data);
                    $count1 = 0;
                    if ($total != 0) {
                        $result = mysqli_fetch_assoc($data);
                        foreach ($result as $key => $value) {
                            if ($value == 'present') {
                                $count1++;
                            }
                        }
                        $vb_column = $vb_column - 3;
                    } ?>
                    <div class="div_heading">
                        <h3>Your Attendance</h3>
                    </div>
                    <div class="atten_result">
                        <table>
                            <thead>
                                <tr>
                                    <th class="atten_lectures">LECTURES ATTENDED</th>
                                    <th class="atten_total">TOTAL LECTURES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2><?php echo $count1  ?></h2>
                                    </td>
                                    <td>
                                        <h2><?php echo $vb_column ?> </h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- vb marks div -->
                <div class="your_marks">
                    <div class="div_heading">
                        <h3>Your Marks</h3>
                    </div>
                    <div class="marks_result">
                        <?php
                        $roll = $_COOKIE['student_roll'];
                        $query = "SELECT * FROM vb_test Where Roll='$roll' ";
                        $data = mysqli_query($conn, $query);
                        //getting the number of rows 
                        $total = mysqli_num_rows($data);
                        $counter = 1;
                        if ($total != 0) {
                            $result = mysqli_fetch_assoc($data);
                            foreach ($result as $key => $value) {
                                if ($counter == 4) { ?>
                                    <table class="marks_table">
                                        <thead>
                                            <tr>
                                                <th class="marks_th_date">DATES</th>
                                                <th class="marks_th_obtained">MARKS OBTAINED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php }
                                    if ($counter > 3) { ?>
                                            <tr>
                                                <td class="marks_td"><?php echo  $key  ?></td>
                                                <td class="marks_td"><?php echo  $value; ?></td>
                                            </tr>
                                    <?php }
                                    $counter++;
                                }
                                echo "</tbody>  </table>";
                            }
                            if ($counter <= 4) { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no data"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!--vb Assignment div  -->
                <div class="your_assignment">
                    <div class="div_heading">
                        <h3>Assignments</h3>
                    </div>
                    <div class="assignment_result">
                        <?php
                        $query = "SELECT * FROM assign Where subject='vb' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        if ($total > 0) { ?>
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">SUBMISSION DATE</th>
                                        <th class="marks_th_obtained">ASSIGNMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="marks_td"><?php echo $row['last_date']; ?></td>
                                            <td class="marks_td"><?php echo  $row['assign']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    echo "</tbody>  </table>";
                                } else { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no Assignment"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- vb daily tasks -->
                <div class="daily_task">
                    <div class="div_heading">
                        <h3>Daily Tasks</h3>
                    </div>
                    <div class="task_results">
                        <?php
                        $today = date('Y-m-d');
                        $date = date('d_m_Y', strtotime($today));
                        $predate = date('d_m_Y', strtotime('-1 day', strtotime($date)));
                        $query = "SELECT * FROM homework Where subject='vb' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        $i = 1;
                        if ($total > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                if ($date == $row['date'] || $predate == $row['date']) {
                        ?>
                                    <h3><?php echo "<br>" . $i . "." . $row['homework']; ?></h3>
                            <?php
                                    $i++;
                                }
                            }
                        }
                        if ($i == 1) { ?>
                            <h2 class="data_not_found"> <?php echo "There is no Task"; ?></h2>
                        <?php }
                        ?>
                    </div>
                </div>
                <!-- vb doubt -->
                <div class="your_doubt">
                    <div class="div_heading">
                        <h3>Ask Doubt</h3>
                    </div>
                    <div class="doubt_data">
                        <form action="student_backend.php" method="POST">
                            <textarea class="doubt_area" name="your_doubt" id="your_doubt" cols="35" rows="10" placeholder="Write your doubt here"></textarea>
                    </div>
                    <input type="submit" name="vb_doubt_submit" id="doubt_submit" class="doubt_submit">
                    </form>
                </div>
            </div>

            <!-- cg data display codding -->
            <div class="cg_data" id="cg_data">
                <!-- your teacher div -->
                <div class="subject_teacher">
                    <div class="div_heading">
                        <h3>Your Teacher</h3>
                    </div>
                    <div class="tcontainer">
                        <div class="tbox">
                            <div class="timgbox">
                                <img src="gunjanmam.jpg" alt="">
                            </div>
                            <div class="tcontent">
                                <h2 class="h2t">
                                    Gunjan Mam <br>
                                    <SPAN>Teaching PHP , VB.Net</SPAN>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cg attandance div -->
                <div class="your_attendance">
                    <?php
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM cg_atten Where Roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    // Get the number of columns in the table
                    $cg_column = mysqli_num_fields($data);
                    //getting the number of rows 
                    $total = mysqli_num_rows($data);
                    $count2 = 0;
                    if ($total != 0) {
                        $result = mysqli_fetch_assoc($data);
                        foreach ($result as $key => $value) {
                            if ($value == 'present') {
                                $count2++;
                            }
                        }
                        $cg_column = $cg_column - 3;
                    } ?>
                    <div class="div_heading">
                        <h3>Your Attendance</h3>
                    </div>
                    <div class="atten_result">
                        <table>
                            <thead>
                                <tr>
                                    <th class="atten_lectures">LECTURES ATTENDED</th>
                                    <th class="atten_total">TOTAL LECTURES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2><?php echo $count2  ?></h2>
                                    </td>
                                    <td>
                                        <h2><?php echo $cg_column ?> </h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- cg marks div -->
                <div class="your_marks">
                    <div class="div_heading">
                        <h3>Your Marks</h3>
                    </div>
                    <div class="marks_result">
                        <?php
                        $roll = $_COOKIE['student_roll'];
                        $query = "SELECT * FROM cg_test Where Roll='$roll' ";
                        $data = mysqli_query($conn, $query);
                        //getting the number of rows 
                        $total = mysqli_num_rows($data);
                        $counter = 1;
                        if ($total != 0) {
                            $result = mysqli_fetch_assoc($data);
                            foreach ($result as $key => $value) {
                                if ($counter == 4) { ?>
                                    <table class="marks_table">
                                        <thead>
                                            <tr>
                                                <th class="marks_th_date">DATES</th>
                                                <th class="marks_th_obtained">MARKS OBTAINED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  }
                                    if ($counter > 3) { ?>
                                            <tr>
                                                <td class="marks_td"><?php echo  $key  ?></td>
                                                <td class="marks_td"><?php echo  $value; ?></td>
                                            </tr>
                                    <?php }
                                    $counter++;
                                }
                                echo "</tbody>  </table>";
                            }
                            if ($counter <= 4) { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no data"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- cg Assignment div  -->
                <div class="your_assignment">
                    <div class="div_heading">
                        <h3>Assignments</h3>
                    </div>
                    <div class="assignment_result">
                        <?php
                        $query = "SELECT * FROM assign Where subject='cg' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        if ($total > 0) { ?>
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">SUBMISSION DATE</th>
                                        <th class="marks_th_obtained">ASSIGNMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="marks_td"><?php echo $row['last_date']; ?></td>
                                            <td class="marks_td"><?php echo  $row['assign']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    echo "</tbody>  </table>";
                                } else { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no Assignment"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- cg daily tasks -->
                <div class="daily_task">
                    <div class="div_heading">
                        <h3>Daily Tasks</h3>
                    </div>
                    <div class="task_results">
                        <?php
                        $today = date('Y-m-d');
                        $date = date('d_m_Y', strtotime($today));
                        $predate = date('d_m_Y', strtotime('-1 day', strtotime($date)));
                        $query = "SELECT * FROM homework Where subject='cg' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        $i = 1;
                        if ($total > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                if ($date == $row['date'] || $predate == $row['date']) {
                        ?>
                                    <h3><?php echo "<br>" . $i . "." . $row['homework']; ?></h3>
                            <?php
                                    $i++;
                                }
                            }
                        }
                        if ($i == 1) { ?>
                            <h2 class="data_not_found"> <?php echo "There is no Task"; ?></h2>
                        <?php }
                        ?>
                    </div>
                </div>
                <!-- cg doubt -->
                <div class="your_doubt">
                    <div class="div_heading">
                        <h3>Ask Doubt</h3>
                    </div>
                    <div class="doubt_data">
                        <form action="student_backend.php" method="POST">
                            <textarea class="doubt_area" name="your_doubt" id="your_doubt" cols="35" rows="10" placeholder="Write your doubt here"></textarea>
                    </div>
                    <input type="submit" name="cg_doubt_submit" id="doubt_submit" class="doubt_submit">
                    </form>
                </div>
            </div>
            <!-- project data display codding -->
            <div class="project_data" id="project_data">
                <!-- your teacher div -->
                <div class="subject_teacher">
                    <div class="div_heading">
                        <h3>Your Teacher</h3>
                    </div>
                    <div class="tcontainer">
                        <div class="tbox">
                            <div class="timgbox">
                                <img src="gunjanmam.jpg" alt="">
                            </div>
                            <div class="tcontent">
                                <h2 class="h2t">
                                    Gunjan Mam <br>
                                    <SPAN>Teaching PHP , VB.Net</SPAN>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- project attandance div -->
                <div class="your_attendance">
                    <?php
                    $roll = $_COOKIE['student_roll'];

                    $query = "SELECT * FROM project_atten Where Roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    // Get the number of columns in the table
                    $project_column = mysqli_num_fields($data);
                    //getting the number of rows 
                    $total = mysqli_num_rows($data);
                    $count3 = 0;
                    if ($total != 0) {
                        $result = mysqli_fetch_assoc($data);
                        foreach ($result as $key => $value) {
                            if ($value == 'present') {
                                $count3++;
                            }
                        }
                        $project_column = $project_column - 3;
                    } ?>
                    <div class="div_heading">
                        <h3>Your Attendance</h3>
                    </div>
                    <div class="atten_result">
                        <table>
                            <thead>
                                <tr>
                                    <th class="atten_lectures">LECTURES ATTENDED</th>
                                    <th class="atten_total">TOTAL LECTURES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2><?php echo $count3  ?></h2>
                                    </td>
                                    <td>
                                        <h2><?php echo $project_column ?> </h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- project marks div -->
                <div class="your_marks">
                    <div class="div_heading">
                        <h3>Your Marks</h3>
                    </div>
                    <div class="marks_result">
                        <?php
                        $roll = $_COOKIE['student_roll'];
                        $query = "SELECT * FROM project_test Where Roll='$roll' ";
                        $data = mysqli_query($conn, $query);
                        //getting the number of rows 
                        $total = mysqli_num_rows($data);
                        $counter = 1;
                        if ($total != 0) {
                            $result = mysqli_fetch_assoc($data);
                            foreach ($result as $key => $value) {
                                if ($counter == 4) { ?>
                                    <table class="marks_table">
                                        <thead>
                                            <tr>
                                                <th class="marks_th_date">DATES</th>
                                                <th class="marks_th_obtained">MARKS OBTAINED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php }
                                    if ($counter > 3) { ?>
                                            <tr>
                                                <td class="marks_td"><?php echo  $key  ?></td>
                                                <td class="marks_td"><?php echo  $value; ?></td>
                                            </tr>
                                    <?php }
                                    $counter++;
                                }
                                echo "</tbody>  </table>";
                            }
                            if ($counter <= 4) { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no data"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- project Assignment div  -->
                <div class="your_assignment">
                    <div class="div_heading">
                        <h3>Assignments</h3>
                    </div>
                    <div class="assignment_result">
                        <?php
                        $query = "SELECT * FROM assign Where subject='project' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        if ($total > 0) { ?>
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">SUBMISSION DATE</th>
                                        <th class="marks_th_obtained">ASSIGNMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="marks_td"><?php echo $row['last_date']; ?></td>
                                            <td class="marks_td"><?php echo  $row['assign']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    echo "</tbody>  </table>";
                                } else { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no Assignment"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- project daily tasks -->
                <div class="daily_task">
                    <div class="div_heading">
                        <h3>Daily Tasks</h3>
                    </div>
                    <div class="task_results">
                        <?php
                        $today = date('Y-m-d');
                        $date = date('d_m_Y', strtotime($today));
                        $predate = date('d_m_Y', strtotime('-1 day', strtotime($date)));
                        $query = "SELECT * FROM homework Where subject='project' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        $i = 1;
                        if ($total > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                if ($date == $row['date'] || $predate == $row['date']) {
                        ?>
                                    <h3><?php echo "<br>" . $i . "." . $row['homework']; ?></h3>
                            <?php
                                    $i++;
                                }
                            }
                        }
                        if ($i == 1) { ?>
                            <h2 class="data_not_found"> <?php echo "There is no Task"; ?></h2>
                        <?php }
                        ?>
                    </div>
                </div>
                <!-- project doubt -->
                <div class="your_doubt">
                    <div class="div_heading">
                        <h3>Ask Doubt</h3>
                    </div>
                    <div class="doubt_data">
                        <form action="student_backend.php" method="POST">
                            <textarea class="doubt_area" name="your_doubt" id="your_doubt" cols="35" rows="10" placeholder="Write your doubt here"></textarea>
                    </div>
                    <input type="submit" name="project_doubt_submit" id="doubt_submit" class="doubt_submit">
                    </form>
                </div>
            </div>
            <!-- E-commerce data display codding -->
            <div class="ecom_data" id="ecom_data">
                <!-- your teacher div -->
                <div class="subject_teacher">
                    <div class="div_heading">
                        <h3>Your Teacher</h3>
                    </div>
                    <div class="tcontainer">
                        <div class="tbox">
                            <div class="timgbox">
                                <img src="gunjanmam.jpg" alt="">
                            </div>
                            <div class="tcontent">
                                <h2 class="h2t">
                                    Gunjan Mam <br>
                                    <SPAN>Teaching PHP , VB.Net</SPAN>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ecom attandance div -->
                <div class="your_attendance">
                    <?php
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM ecom_atten Where Roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    // Get the number of columns in the table
                    $ecom_column = mysqli_num_fields($data);
                    //getting the number of rows 
                    $total = mysqli_num_rows($data);
                    $count4 = 0;
                    if ($total != 0) {
                        $result = mysqli_fetch_assoc($data);
                        foreach ($result as $key => $value) {
                            if ($value == 'present') {
                                $count4++;
                            }
                        }
                        $ecom_column = $ecom_column - 3;
                    } ?>
                    <div class="div_heading">
                        <h3>Your Attendance</h3>
                    </div>
                    <div class="atten_result">
                        <table>
                            <thead>
                                <tr>
                                    <th class="atten_lectures">LECTURES ATTENDED</th>
                                    <th class="atten_total">TOTAL LECTURES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h2><?php echo $count4  ?></h2>
                                    </td>
                                    <td>
                                        <h2><?php echo $ecom_column ?> </h2>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ecom marks div -->
                <div class="your_marks">
                    <div class="div_heading">
                        <h3>Your Marks</h3>
                    </div>
                    <div class="marks_result">
                        <?php
                        $roll = $_COOKIE['student_roll'];
                        $query = "SELECT * FROM ecom_test Where Roll='$roll' ";
                        $data = mysqli_query($conn, $query);
                        //getting the number of rows 
                        $total = mysqli_num_rows($data);
                        $counter = 1;
                        if ($total != 0) {
                            $result = mysqli_fetch_assoc($data);
                            foreach ($result as $key => $value) {
                                if ($counter == 4) { ?>
                                    <table class="marks_table">
                                        <thead>
                                            <tr>
                                                <th class="marks_th_date">DATES</th>
                                                <th class="marks_th_obtained">MARKS OBTAINED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php }
                                    if ($counter > 3) { ?>
                                            <tr>
                                                <td class="marks_td"><?php echo  $key  ?></td>
                                                <td class="marks_td"><?php echo  $value; ?></td>
                                            </tr>
                                    <?php }
                                    $counter++;
                                }
                                echo "</tbody>  </table>";
                            }
                            if ($counter <= 4) { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no data"; ?></h2>
                                <?php }

                                ?>
                    </div>
                </div>
                <!-- ecom Assignment div  -->
                <div class="your_assignment">
                    <div class="div_heading">
                        <h3>Assignments</h3>
                    </div>
                    <div class="assignment_result">
                        <?php
                        $query = "SELECT * FROM assign Where subject='ecom' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        if ($total > 0) {
                            echo " successfully found the date "; ?>
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">SUBMISSION DATE</th>
                                        <th class="marks_th_obtained">ASSIGNMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="marks_td"><?php echo $row['last_date']; ?></td>
                                            <td class="marks_td"><?php echo  $row['assign']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    echo "</tbody>  </table>";
                                } else { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no Assignment"; ?></h2>
                                <?php }
                                ?>
                    </div>
                </div>
                <!-- ecom daily tasks -->
                <div class="daily_task">
                    <div class="div_heading">
                        <h3>Daily Tasks</h3>
                    </div>
                    <div class="task_results">
                        <?php
                        $today = date('Y-m-d');
                        $date = date('d_m_Y', strtotime($today));
                        $predate = date('d_m_Y', strtotime('-1 day', strtotime($date)));
                        $query = "SELECT * FROM homework Where subject='ecom' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        $i = 1;
                        if ($total > 0) {
                            while ($row = mysqli_fetch_array($data)) {
                                if ($date == $row['date'] || $predate == $row['date']) {
                        ?>
                                    <h3><?php echo "<br>" . $i . "." . $row['homework']; ?></h3>
                            <?php
                                    $i++;
                                }
                            }
                        }
                        if ($i == 1) { ?>
                            <h2 class="data_not_found"> <?php echo "There is no Task"; ?></h2>
                        <?php }
                        ?>
                    </div>
                </div>
                <!-- ecom notices -->
                <div class="your_doubt">
                    <div class="div_heading">
                        <h3>Ask Doubt</h3>
                    </div>
                    <div class="doubt_data">
                        <form action="student_backend.php" method="POST">
                            <textarea class="doubt_area" name="your_doubt" id="your_doubt" cols="35" rows="10" placeholder="Write your doubt here"></textarea>
                    </div>
                    <input type="submit" name="ecom_doubt_submit" id="doubt_submit" class="doubt_submit">
                    </form>
                </div>
            </div>
        </div>


        <!-- creating a container so student check doubter question is answered or not  -->
        <div id="doubt_container" class="doubt_container">
            <div class="close_btnn">
                <button class="update_close" onclick="close_doubt_container()">X</button>
            </div>
            <div class="doubt_header">
                <div class="subject_list">
                    <ul class="ul_list">
                        <li><button id="vb_doubt_answer" onclick="open_vb_doubt()"> VB.NET</button></li>
                        <li><button id="cg_doubt_answer" onclick="open_cg_doubt()"> COMPUTER GRAPHICS</button></li>
                        <li><button id="project_doubt_answer" onclick="open_project_doubt()">PROJECT</button></li>
                        <li><button id="ecom_doubt_answer" onclick="open_ecom_doubt()">E-COMMERCE</button></li>
                    </ul>
                </div>
            </div>
            <div class="main_doubt_container">
            <!-- <p class="select_subject_doubt">  SELECT THE SUBJECT PLEASE  </p>   -->
                <!-- vb doubt container -->
                <div id="vb_doubt_container">
                    <?php
                    $predate = date('Y-m-d', strtotime('-7 day'));
                    $previous_date = strtotime($predate);
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM  vb_doubt where roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    if ($total > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $stored_date = $row['date'];
                            $data_date = strtotime(str_replace('_', '-', $stored_date));
                            $data_date2 = strtotime($data_date);
                            if ($previous_date < $data_date) {
                    ?>
                                <h3 class="question_asked"><?php echo "Question : " . $row['question']  ?> </h3>
                                <h4 class="answered_by_teacher"><?php echo "Answer :" . $row['answer']  ?> </h4>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <h2 class="no_answers">There is no data </h2>
                    <?php
                    }
                    ?>
                </div>
                <!-- cg doubts -->
                <div id="cg_doubt_container">
                    <?php
                    $predate = date('Y-m-d', strtotime('-7 day'));
                    $previous_date = strtotime($predate);
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM  cg_doubt where roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    if ($total > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $stored_date = $row['date'];
                            $data_date = strtotime(str_replace('_', '-', $stored_date));
                            $data_date2 = strtotime($data_date);
                            if ($previous_date < $data_date) {
                    ?>
                                <h3 class="question_asked"><?php echo "Question : " . $row['question']  ?> </h3>
                                <h4 class="answered_by_teacher"><?php echo "Answer :" . $row['answer']  ?> </h4>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <h2 class="no_answers">There is no data </h2>
                    <?php }
                    ?>
                </div>
                <!-- project doubts -->
                <div id="project_doubt_container">
                    <?php
                    $predate = date('Y-m-d', strtotime('-7 day'));
                    $previous_date = strtotime($predate);
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM  project_doubt where roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    if ($total > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $stored_date = $row['date'];
                            $data_date = strtotime(str_replace('_', '-', $stored_date));
                            $data_date2 = strtotime($data_date);
                            if ($previous_date < $data_date) {
                    ?>
                                <h3 class="question_asked"><?php echo "Question : " . $row['question']  ?> </h3>
                                <h4 class="answered_by_teacher"><?php echo "Answer :" . $row['answer']  ?> </h4>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <h2 class="no_answers">There is no data </h2>
                    <?php
                    }
                    ?>
                </div>
                <!-- E-commerce doubts -->
                <div id="ecom_doubt_container">
                    <?php
                    $predate = date('Y-m-d', strtotime('-7 day'));
                    $previous_date = strtotime($predate);
                    $roll = $_COOKIE['student_roll'];
                    $query = "SELECT * FROM  ecom_doubt where roll='$roll' ";
                    $data = mysqli_query($conn, $query);
                    $total = mysqli_num_rows($data);
                    if ($total > 0) {
                        while ($row = mysqli_fetch_array($data)) {
                            $stored_date = $row['date'];
                            $data_date = strtotime(str_replace('_', '-', $stored_date));
                            $data_date2 = strtotime($data_date);
                            if ($previous_date < $data_date) {
                    ?>
                                <h3 class="question_asked"><?php echo "Question : " . $row['question']  ?> </h3>
                                <h4 class="answered_by_teacher"><?php echo "Answer :" . $row['answer']  ?> </h4>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <h2 class="no_answers">There is no data </h2>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="student_login.js?v=1"></script>

        <!-- container for the notices of all subjects  -->
        <div id="add_notice_form">
            <div class="close_btnn">
                <button class="update_close" onclick="close_notice_container()">X</button>
            </div>
            <div class="notice_header">
                <h2> NOTICE BOARD</h2>
            </div>
            <div class="notice_data">
                <?php
                $predate = date('Y-m-d', strtotime('-10 day'));
                $previous_date = strtotime($predate);
                $query = "SELECT * FROM notice Where subject='vb' ";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);
                if ($total > 0) { ?>
                    <table class="notice_table">
                        <thead>
                            <tr>
                                <th class="notice_th_date">Date</th>
                                <th class="notice_th_subject">Subject</th>
                                <th class="notice_th_data">Notice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($data)) {
                                $stored_date = $row['notice_date'];
                                $data_date = strtotime(str_replace('_', '-', $stored_date));
                                $data_date2 = strtotime($data_date);
                                if ($previous_date < $data_date) {
                            ?>
                                    <tr class="notice_tr">
                                        <td class="notice_td"><?php echo $row['notice_date']; ?></td>
                                        <td class="notice_td"><?php echo $row['subject']; ?></td>
                                        <td class="notice_td"><?php echo  $row['notice']; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            echo "</tbody>  </table>";
                        } else { ?>
                            <h2 class="notice_not_found"> <?php echo "There is no Notice"; ?></h2>
                        <?php }
                        ?>
            </div>





        </div>
        <script src="student_login.js?v=4"></script>

    </div>

</body>

</html>