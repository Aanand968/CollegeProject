<?php
session_start();
$display = "none";
//stablish connection with the database
include("connection.php");
//using this file browser have to reload file after every refresh 
include("config.php");
if (isset($_SESSION['message'])) {
    $wrongid = $_SESSION['message'];
    $display = "block";
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
    <link rel="stylesheet" href="home.css?v=<?= $version ?>" />
</head>

<body>
    <!-- nav baar heading -->
    <div class="width-100 header-menu">
        <div class="container">
            <div class="logo">
                <img style="height: 70px; width: 100px" src="dav_logo-1.png" alt="" />
            </div>
            <ul class="main-menu">
                <li><a href="Main.php">HOME</a></li>
                <li>
                    <button id="open_login" class="login-btn" name="login" type="button" onclick="open_login_box()">
                        LOGIN
                    </button>
                </li>
                <li>
                    <button class="login-btn" name="signup" type="button" onclick="open_signup_box()">
                        SIGN UP
                    </button>
                </li>
                <li><a href="#">CONTACT US</a></li>
            </ul>
        </div>
    </div>
    <script src="home_page.js?<?= $version ?>"></script>
    <!-- center content area -->
    <div class="bkimage">
        <!-- if login or signup fails message will display -->
        <div id="popup-box" class="popup-box" style="display :<?= $display ?>" ;>
            <h3 class="close_button" onclick="document.getElementById('popup-box').style.display='none'">
                X
            </h3>
            <div class="box-title">
                <h3>WARNING!</h3>
            </div>
            <div class="box-content">
                <h4 class="box-text">
                    <?php echo "$wrongid"; ?>
                </h4>

            </div>
        </div>
        <!-- Login box for everyone  -->
        <div id="box" class="box">
            <div class="close-btn-teacher">
                <button class="close_button" onclick="document.getElementById('box').style.display='none'">X</button>
            </div>
            <div class="btnbox">
                <div id="btn"></div>
                <button id="teacher_btn" name="teacher" type="button" class="toggle-btn" onclick="teacher()">
                    TEACHER
                </button>
                <button id="parent_btn" name="parent" type="button" class="toggle-btn" onclick="parent()">
                    PARENT
                </button>
                <button id="student_btn" name="student" type="button" class="toggle-btn" onclick="student()">
                    STUDENT
                </button>
            </div>
            <div class="social2">
                <img src="gmail.png" alt="" />
                <img src="twitter2.png" alt="" />
                <img src="fb2.png" alt="" />
            </div>
            <!-- login form for teachers -->
            <form id="teacher" class="input-group" method="POST" action="submit.php">
                <input type="email" name="ltemail" class="input-field" placeholder="EMAIL ID" required />
                <input type="password" name="ltpassword" class="input-field" placeholder="ENTER PASSWORD" required />
                <button name="ltsubmit" type="submit" class="submit-btn">
                    LOGIN
                </button>
            </form>
            <!-- //login form for parents -->
            <form id="parent" class="parent-group" method="POST" action="submit.php">
                <input type="text" name="lpphone" class="parent-field" placeholder="ENTER PHONE NUMBER" />
                <input type="password" name="lppassword" class="parent-field" placeholder="ENTER PASSWORD" required />
                <button name="lpsubmit" type="submit" class="submit-btn">
                    LOGIN
                </button>
            </form>
            <!-- login form for student -->
            <form id="student" class="input-group" method="POST" action="submit.php">
                <input type="email" name="lsemail" class="input-field" placeholder="EMAIL" required />
                <input type="password" name="lspassword" class="input-field" placeholder="ENTER PASSWORD" required />
                <button name="lssubmit" type="submit" class="submit-btn">
                    LOGIN
                </button>
            </form>
        </div>
        <script src="home_page.js<?= $version ?>"></script>

        <!-- sign-up form for everyone  -->
        <div id="box2" class="box2">
            <div class="close-btn-teacher">
                <button class="close_button" onclick="close_signup_box()">X</button>
            </div>
            <div class="btnbox2">
                <div id="btn2"></div>
                <button id="teacher2_btn" name="teacher" type="button" class="toggle-btn2" onclick="teacher2()">
                    TEACHER
                </button>
                <button name="parent" id="parent2_btn" type="button" class="toggle-btn2" onclick="parent2()">
                    PARENT
                </button>
                <button name="student" type="button" id="student2_btn" class="toggle-btn2" onclick="student2()">
                    STUDENT
                </button>
            </div>
            <div class="social2">
                <img src="gmail.png" alt="" />
                <img src="twitter2.png" alt="" />
                <img src="fb2.png" alt="" />
            </div>
            <!-- teacher sign-up form -->
            <form id="teacher2" class="input-group2" method="POST" action="submit.php" name="form">
                <input type="text" name="tname" class="input-field2" placeholder="ENTER NAME" required />
                <div class="subject_select">
                    <div class="subject_options">
                        <label class="heading_option">Choose subject :</label>
                        <select name="select" id="check_subject" class="options">
                            <option id="no_value" value="none"></option>
                            <option value="ecom">ECOMMERCE</option>
                            <option value="vb">VB.NET</option>
                            <option value="cg">COMPUTER GRAPHICS</option>
                            <option value="project">PROJECT</option>
                        </select>
                    </div>
                    <div class="err_message" id="err_message">
                        Please Select Subject!
                    </div>
                </div>
                <input type="text" name="tphone" class="input-field2" placeholder="PHONE NO." required />
                <input type="email" name="temail" class="input-field2" placeholder="EMAIL ID" required />
                <input type="password" name="tpassword" class="input-field2" placeholder="ENTER PASSWORD" required />
                <input type="submit" name="tsubmit" class="submit-btn2" onclick="return val()">
            </form>
            <script src="home_page.js"></script>
            <!-- parent sign-up form -->
            <form id="parent2" class="parent-group2" method="POST" action="submit.php">
                <input type="text" name="pname" class="parent-field2" placeholder="ENTER NAME" />
                <input type="text" name="pphone" class="parent-field2" placeholder="ENTER PHONE NUMBER" />
                <input type="text" name="pmpin" class="parent-field2" placeholder="ENTER  STUDENT PHONE NUMBER" required />
                <input type="password" name="ppassword" class="parent-field2" placeholder="ENTER PASSWORD" required />
                <input type="submit" name="psubmit" class="submit-btn2" />
            </form>
            <!-- student sign-up form -->
            <form id="student2" class="student-group2" method="POST" action="submit.php">
                <input type="text" name="sname" class="student-field2" placeholder="ENTER NAME" />
                <input type="text" name="srollno" class="student-field2" placeholder="ENTER ROLL-NO" />
                <input type="text" name="sphone" class="student-field2" placeholder="ENTER PHONE" />
                <input type="email" name="semail" class="student-field2" placeholder="EMAIL" required />
                <input type="password" name="spassword" class="student-field2" placeholder="ENTER PASSWORD" required />
                <button type="submit" name="ssubmit" class="submit-btn2">
                    SIGN UP
                </button>
            </form>
        </div>
        <script src="home_page.js"></script>
    </div>
    <!-- div for important notices  -->
    <div class="width-100 margin-top-50">
        <div class="container">
            <div class="width-33">
                <div class="latest-news">
                    <div class="heading-sect">
                        <h3 class="head-title">Latest News</h3>
                    </div>
                    <marquee direction="up">
                        <ul class="latest-news-ul">
                            <li>
                                31 mar 2022 Ph D merit list Part 01_16 feb 2022
                                <img src="new.gif" />
                            </li>
                            <li>
                                31 mar 2022 Ph D merit list Part 02_16 feb 2022
                                <img src="new.gif" />
                            </li>
                            <li>24 May 2022 Incubation Center<img src="new.gif" /></li>
                            <li>
                                31 mar 2022 Institutional Distinctiveness<img src="new.gif" />
                            </li>
                            <li>
                                31 mar 2022 Academic Calender Session 2019-20<img src="new.gif" />
                            </li>
                            <li>
                                16 feb 2022 Ph D merit list Part 01 16 feb 2022<img src="new.gif" />
                            </li>
                            <li>
                                17 Oct 2022 Consolidate academic Calender<img src="new.gif" />
                            </li>
                        </ul>
                    </marquee>
                </div>
            </div>
            <div class="width-33">
                <div class="event-list">
                    <div class="heading-sect">
                        <h3 class="head-title">Upcoming event</h3>
                    </div>
                    <ul class="upcoming-event-list">
                        <li>
                            <span class="event-date">27 <br />
                                April</span><span>Seminar is conducted on BCA Course</span>
                        </li>
                        <li>
                            <span class="event-date">29 <br />
                                April</span><span>Seminar is conducted on B.Com Course</span>
                        </li>
                        <li>
                            <span class="event-date">2 <br />
                                May</span><span>Painting comptition for final year students</span>
                        </li>
                        <li>
                            <span class="event-date">5 <br />
                                May</span><span>Annual Metting for Batch of BBA( 2018 to 2021 ) and seminar
                                will be conducted for future growth and oppurtunity</span>
                        </li>
                        <li>
                            <span class="event-date">8 <br />
                                May</span><span>Singing comptition for all students</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="width-33">
                <div class="notice-board">
                    <div class="heading-sect">
                        <h3 class="head-title">Notice Board</h3>
                    </div>
                    <ul class="notice-board-list">
                        <li>
                            <img src="notice.png" alt="" /> Participate in Climate
                            correction Day (CCD) challenge for Mission LIFE
                        </li>
                        <li>
                            <img src="notice.png" alt="" /> West Zone Inter University Table
                            Teniss (man) Turnament 2022
                        </li>
                        <li>
                            <img src="notice.png" alt="" /> BCA Registration Form for
                            Selected Candidate
                        </li>
                        <li>
                            <img src="notice.png" alt="" /> List of Activites organised
                            under IT-Fest
                        </li>
                        <li>
                            <img src="notice.png" alt="" /> Holiday from 3 to 6 march on the
                            festival of Holi
                        </li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer of the website -->
    <div class="width-100 margin-top-50 footer">
        <div class="container">
            <div class="width-25">
                <h2 class="quicklink-heading">Quick Links</h2>
                <ul class="quicklink-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="width-25">
                <h2 class="quicklink-heading">Student Section</h2>
                <ul class="quicklink-menu">
                    <li><a href="#">Result</a></li>
                    <li><a href="#">Pay Fee</a></li>
                    <li><a href="#">Training</a></li>
                    <li><a href="#">Placements</a></li>
                </ul>
            </div>
            <div class="width-25">
                <h2 class="quicklink-heading">Information Links</h2>
                <ul class="quicklink-menu">
                    <li><a href="#">News</a></li>
                    <li><a href="#">R&D Policy</a></li>
                    <li><a href="#">Anti-Ragging</a></li>
                    <li><a href="#">Admission</a></li>
                </ul>
            </div>
            <div class="width-25">
                <h2 class="quicklink-heading">GET IN TOUCH</h2>
                <ul class="get-in-touch">
                    <li>
                        E-MAIL : <a class="footer-email" href="#">infodav@gmail.com</a>
                    </li>
                    <li>WHATS-APP : +91 9998887776</li>
                    <li>CONTACT NO : +91 8887776665</li>
                    <li>
                        WEBSITE :<a class="footer-website" href="#">https://www.dav10.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>