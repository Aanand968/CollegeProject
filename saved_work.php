
<!-- student page teacher container -->
<div id="teachers-container" class="tcontainer">
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
    <div class="tbox">

        <div class="timgbox">
            <img src="simmi-mam.jpg" alt="">
        </div>
        <div class="tcontent">
            <h2 class="h2t">
                Simmi Mam <br>
                <SPAN> Teaching DSA, <br> C++ , C</SPAN>
            </h2>
        </div>
    </div>
    <script src="student_login.js"></script>
</div>

<!-- notice field of the student login page  -->


<div class="notice_data">
                        <?php
                        $predate = date('Y-m-d', strtotime('-10 day'));
                        $previous_date = strtotime($predate);
                        $query = "SELECT * FROM notice Where subject='vb' ";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);
                        if ($total > 0) { ?>
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">DATE</th>
                                        <th class="marks_th_obtained">Notices</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($data)) {
                                        $stored_date = $row['notice_date'];
                                        $data_date = strtotime(str_replace('_', '-', $stored_date));
                                        $data_date2 = strtotime($data_date);
                                        if ($previous_date < $data_date ) {
                                    ?>
                                            <tr>
                                                <td class="marks_td"><?php echo $row['notice_date']; ?></td>
                                                <td class="marks_td"><?php echo  $row['notice']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    echo "</tbody>  </table>";
                                } else { ?>
                                    <h2 class="data_not_found"> <?php echo "There is no Notice"; ?></h2>
                                <?php }
                                ?>
                    </div>




<!-- css for the student portal your teacher div -->

.your-teachers {
    width: 100%;
    font-size: 20px;
    font-weight: bold;
    color: rgb(0, 0, 0);
    background: #74b9ff;
    padding: 15px 30px;
    cursor: pointer;
}

.tcontainer {
    width: 100%;
    height: 100%;
    flex-wrap: wrap;
    display: block;
    display: none;
}
/* close button div */
.close-btn-teacher{
position: absolute;
top: 63px;
right: 0;
}

.close-button {
    font-size: 15px;
    float: right;
    border: 0.5px solid black;
    font-weight: bold;
    padding:   2px 5px;
    cursor: pointer;
    border-top: none;
}

.close-button:hover {
    background: black;
    color: white;
}

.tbox {
    position: relative;
    width: 10rem;
    height: 10rem;
    margin: 3rem;
}

.tcontainer .tbox:hover .timgbox {
    transform: translate(-1.5rem, -1.5rem);
}

.tcontainer .tbox:hover .tcontent {
    transform: translate(1.5rem, 2rem);
}

.timgbox {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    transition: all 0.5s ease-in-out;
}

.tcontent {
    background: linear-gradient(to right, #2196f3, #00aed9);
    color: white;
    width: 10rem;
    height: 10rem;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    transition: all 0.5s ease-in-out;
}

.h2t {
    position: absolute;
    top: 65%;
    left: 10%;
    z-index: 1;
    font-size: 15px;
    transition: all 0.5s ease-in-out;
}


.timgbox img {
    width: 10rem;
    height: 10rem;
    object-fit: cover;
    resize: both;
}

<!-- students detail -->
<div class="close-btn-teacher">
                <button class="notice_close_button" id="notice_close_btn" onclick="notice_form_close()">X</button>
            </div>
            <div class="vb_container">
                <!-- Teacher container  -->
                <div class="vb_teacher">
                    <div class="vb_your_teacher">
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
                <!-- Attendance container of the students  -->
                <div class="vb_attendance">
                    
                        <?php
                        $roll = $_COOKIE['student_roll'];
                        $table = mysqli_query($conn, "DESCRIBE vb_atten");
                        // Get the number of columns in the table
                        $columns = mysqli_num_fields($table);
                        $query = "SELECT * FROM vb_atten Where Roll='$roll' ";
                        $data = mysqli_query($conn, $query);
                        //getting the number of rows 
                        $total = mysqli_num_rows($data);
                        $count = 0;
                        if ($total != 0) {
                            $result = mysqli_fetch_assoc($data);
                            foreach ($result as $key => $value) {
                                if ($value == 'present') {
                                    $count++;
                                }
                            }
                            $columns = $columns - 3;
                        } ?>
                        <div class="vb_your_teacher">
                            <h3>Your Attendance</h3>
                        </div>
                        <div class="vb_atten_result">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="atten_total">TOTAL_LECTURES</th>
                                        <th class="atten_lectures">LECTURES_ATTENDED</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h2><?php echo $columns ?></h2>
                                        </td>
                                        <td>
                                            <h2><?php echo $count ?> </h2>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- Marks container for the students  -->
                <div class="vb_marks">
                    <div class="vb_teacher">
                        <div class="vb_your_teacher">
                            <h3>Your Marks</h3>
                        </div>
                        <div class="vb_marks_result">
                            <table class="marks_table">
                                <thead>
                                    <tr>
                                        <th class="marks_th_date">DATES</th>
                                        <th class="marks_th_obtained">MARKS_OBTAINED</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            if ($counter > 3) { ?>
                                                <tr>
                                                    <td class="marks_td"><?php echo  $key  ?></td>
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
                </div>
                <div class="vb_assignment">

                </div>
                <div class="vb_daily_task">

                </div>
                <div class="vb_doubt">

                </div>
            </div>
        </div>













