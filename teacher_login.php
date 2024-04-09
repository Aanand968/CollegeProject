<?php
session_start();
$display = "none";
include("connection.php");
include("config.php");
$teacher_subject=$_COOKIE['teacher_subject'];
$teacher_name = $_COOKIE['teacher_name'];
//check if session for the submission set or not 
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
    <link rel="stylesheet" href="teacher-login.css?v=<?= $version ?>" />
</head>

<body>
    <!-- title bar for the teaher login page  -->
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
    <!-- Menu bar for teacher -->
    <div class="margin-top-10">
        <div class="container">
            <div class="width-15">
                <button id="menu_button" class="menu_button" onclick="menu()">MENU</button>
                <div id="menu_div" class="menu_div">
                    <button id="acadmic_button" class="menu_list" onclick="acadmic_detail()">ACADEMIC</button>
                    <div id="acadmic_list" class="acadmic_list">
                        <ul class="detail-list">
                            <li><button id="open_atten" onclick="open_atten()">Attendance</button></li>
                            <li><button id="open_marks" onclick="open_marks()">Add Marks</button></li>
                            <li><button id="open_assign" onclick="open_assign()">Assignments</button></li>
                            <li><button id="open_hw" onclick="open_hw()">Daily tasks</button></li>
                            <li><button id="open_notice" onclick="open_notice()">Notice</button></li>
                            <li><button   onclick="open_student_doubt()" >Answer doubts</button></li>
                        </ul>
                    </div>
                    <button class="menu_list" onclick="update_pass()">UPDATE PASSWORD</button>
                </div>
                <script src="teacher_form.js"></script>
            </div>
        </div>
    </div>
    <!-- Center container for the content  -->
    <div class="width-60">
        <!-- pop-up message if data submited into database or if fail to submit  -->
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
        <!-- Update pass work -->
        <div id="update_pass_container" class="update_pass">
            <div class="close_btn">
                <button class="update_close" id="update_close" onclick="close_update_container()">X</button>
            </div>
            <div class="pass_header">
                <h3><?php echo "Hello&nbsp;&nbsp;" . $teacher_name; ?></h3>
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
        <!-- form for adding marks -->
        <div id="add_marks_form" class="marks_container">
            <div class="close-btn-teacher">
                <button class="close-button" id="marks_close_btn" onclick="mark_form_close()">X</button>
            </div>
            <form method="Post" action="marks_submit.php" name="form">
                <div id="add-score" class="add-score">
                    <div class="header_marks">
                        <div class="date">
                            <input id="marks-date" class="date-box" type="date" name="marks-date" required />
                        </div>
                    </div>
                    <div class="fetched_name">
                        <div class="table-heading">
                            <h2>S.No</h2>
                            <h2>Roll No</h2>
                            <h2>Name</h2>
                            <h2>Marks</h2>
                        </div>
                        <div class="table-data">
                            <br />
                            <?php
                            $query = "SELECT * FROM student_login";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);
                            if ($total != 0) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[SNo]";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[Roll]";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[Name]";
                            ?>
                                    <input class="marks-box" type="text" name="marks[]" required />
                            <?php
                                    echo "<br><br />";
                                }
                            } ?>+
                        </div>
                    </div>
                    <input class="marks-submit" type="submit" name="submit_marks" />
                </div>
            </form>
            <script src="teacher_form.js"> </script>
        </div>

        <!-- //form to enter attendance for the student  -->
        <div id="add_atten_form" class="atten_container">
            <div class="close-btn-teacher">
                <button class="close-button" id="atten_close_btn" onclick="atten_form_close()">X</button>
            </div>
            <form method="Post" action="marks_submit.php" name="form2">
                <div id="add-score" class="add-score">
                    <div class="header_marks">
                        <div class="date">
                            <input id="marks-date" class="date-box" type="date" name="atten_date" required />
                        </div>
                    </div>
                    <div class="fetched_name">
                        <div class="table-heading">
                            <h2>S.No</h2>
                            <h2>Roll No</h2>
                            <h2>Name</h2>
                            <h2>Attendance</h2>
                        </div>
                        <div class="table-data">
                            <br />
                            <?php
                            $query = "SELECT * FROM student_login";
                            $data = mysqli_query($conn, $query);
                            $total = mysqli_num_rows($data);
                            $i = 0;
                            if ($total != 0) {
                                while ($result = mysqli_fetch_assoc($data)) {
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[SNo]";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[Roll]";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo " $result[Name]";
                            ?>
                                    <div class="radio_div">
                                        <label class="radio">
                                            <?php
                                            echo '<tr>';
                                            echo '<td>&nbsp;&nbsp;<input class="radio_btn" type="radio" name="attendance[' . $i . ']" value="present">Present</td>';
                                            ?>
                                            <span></span>
                                        </label>
                                        <label class="radio">
                                            <?php
                                            echo '<td>&nbsp;&nbsp;<input class="radio_btn" type="radio" name="attendance[' . $i . ']" value="absent">Absent</td>';
                                            echo '</tr>';
                                            ?>
                                            <span></span>
                                        </label>
                                    </div>
                            <?php
                                    echo "<br> <br />";
                                    $i++;
                                }
                            } ?>
                        </div>
                    </div>
                    <input class="marks-submit" type="submit" name="submit_atten" />
                </div>
            </form>
            <script src="teacher_form.js"></script>
        </div>
        <!-- form to enter assignment for the studetns -->
        <div id="add_assign_form" class="assign_container">
            <div class="close-btn-teacher">
                <button class="close-button" id="assign_close_btn" onclick="assign_form_close()">X</button>
            </div>
            <form action="marks_submit.php" method="post">
                <div class="header_assign">
                    <div class="date_label">
                        <label class="lable">LAST DATE FOR SUBMISSION : </label>
                    </div>

                    <div class="assign_date">
                        <input id="assign_date" class="date-box" type="date" name="assign_date" required />
                    </div>
                </div>
                <div class="assign_div">
                    <textarea id="assign_input" class="assign_input" name="assignment" rows="5" cols="50" placeholder=""></textarea>
                </div>
                <input type="submit" name="assign_submit" id="assign_submit" class="assign_submit">
            </form>
            <script src="teacher_form.js"></script>
        </div>

        <!-- form to enter Howmwork for students -->
        <!-- hw refer to the home-work container -->
        <div id="add_hw_form" class="hw_container">
            <div class="close-btn-teacher">
                <button class="hw_close_button" id="hw_close_btn" onclick="hw_form_close()">X</button>
            </div>
            <form action="marks_submit.php" method="post">
                <div class="header_hw">
                    <div class="date_label">
                        <label class="lable">DAILY TASKS : </label>
                    </div>
                </div>
                <div class="hw_div">
                    <textarea id="hw_input" class="hw_input" name="homework" rows="5" cols="50" placeholder=""></textarea>
                </div>
                <input type="submit" name="hw_submit" id="hw_submit" class="hw_submit">
            </form>
            <script src="teacher_form.js"></script>
        </div>

        <!-- form for notice board  -->
        <div id="add_notice_form" class="notice_container">
            <div class="close-btn-teacher">
                <button class="notice_close_button" id="notice_close_btn" onclick="notice_form_close()">X</button>
            </div>
            <form action="marks_submit.php" method="post">
                <div class="header_notice">
                    <div class="notice_label">
                        <label class="lable">NOTICE : </label>
                    </div>
                    <div class="notice_date">
                        <input class="date-box" type="date" name="notice_date" required />
                    </div>
                </div>
                <div class="notice_div">
                    <textarea id="notice_input" class="notice_input" name="notice" rows="5" cols="50" placeholder=""></textarea>
                </div>
                <input type="submit" name="notice_submit" id="notice_submit" class="notice_submit">
            </form>
            <script src="teacher_form.js"></script>
        </div>

        <!-- form to answer the doubts or students -->
        <div id="add_doubt_forms" class="answer_container">
            <div class="close-btn-teacher">
                <button class="close-button" onclick="doubt_form_close()">X</button>
                <h2 class="heading_doubt"> Question asked by the students </h2>
            </div>
            <div class="question_box">
                <?php
                $table_name='';
                if ($teacher_subject=='vb') {
                    $table_name='vb_doubt';
                    $_SESSION['table_name']='vb_doubt';
                    // setcookie("table_name","$table_name",time() + 600, "/");
                }elseif ($teacher_subject=='cg') {
                    $table_name='cg_doubt';
                    $_SESSION['table_name']='vb_doubt';
                    // setcookie("table_name","$table_name",time() + 600, "/");
                }elseif ($teacher_subject=='project') {
                    $table_name='project_doubt';
                    $_SESSION['table_name']='vb_doubt';
                    // setcookie("table_name","$table_name",time() + 600, "/");
                }else{
                    $table_name ='ecom_doubt';
                    $_SESSION['table_name']='vb_doubt';
                    // setcookie("table_name","$table_name",time() + 600, "/");
                }
                $predate = date('Y-m-d', strtotime('-7 day'));
                $previous_date = strtotime($predate);
                $query = "SELECT * FROM  $table_name ";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);
                $counter = 1;
                if ($total > 0) {
                    while ($row = mysqli_fetch_array($data)) {
                        $stored_date = $row['date'];
                        $data_date = strtotime(str_replace('_', '-', $stored_date));
                        $data_date2 = strtotime($data_date);
                        if ($previous_date < $data_date) {
                            if ($counter == 1) { ?>
                                <table class="doubt_table">
                                    <thead>
                                        <tr>
                                            <th class="doubt_sno">S.NO</th>
                                            <th class="doubt_by">DOUBT BY</th>
                                            <th class="doubt_question">QUESTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $counter++;
                                } ?>
                                    <tr class="doubt_data">
                                        <td class="doubt_data"><?php echo $row['sno']; ?></td>
                                        <td class="doubt_data"><?php echo  $row['doubt_by']; ?></td>
                                        <td class="doubt_data"><?php echo  $row['question']; ?></td>
                                    </tr>
                                <?php
                            }
                                ?>
                        <?php }
                    echo "</tbody>  </table>";
                }
                        ?>
            </div>
            <div class="answer_doubt">
                <form action="marks_submit.php" method="POST" name="answer_doubt_form">
                <div class="answer_div_heading">
                <h3 class="answer_heading_line">Answer questions here</h3>
                    <div id="answer_sno" class="answer_sno">
                        <input type="number" id="answer_number" name="answer_number">
                    </div>
                    
                    <div id="answer_sno_err" class="answer_sno_err">
                        Please enter the question number!
                    </div>
                    
                </div>
                <div class="answer_box">
                    <form action="marks_submit.php" method="post">
                    <textarea name="answer_input" id="answer_input" cols="80" rows="10"></textarea>
                </div>
                <input type="submit" class="submit_doubt" name="submit_doubt" onclick="return val()" >
                </form>
                <script src="teacher_form.js?v=3"></script>
            </div>
        </div>
        <script src="teacher_form.js?v=3"></script>
    </div>

</body>

</html>