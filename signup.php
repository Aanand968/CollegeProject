<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="signup.css" />
</head>

<body>
  <div class="main">
    <div class="box2">
      <div class="btnbox2">
        <div id="btn2"></div>
        <button name="teacherbtn" type="button" class="toggle-btn2" onclick="teacher()">
          TEACHER
        </button>
        <button name="parentbtn" type="button" class="toggle-btn2" onclick="parent()">
          PARENT
        </button>
        <button name="studentbtn" type="button" class="toggle-btn2" onclick="student()">
          STUDENT
        </button>
      </div>
      <div class="social2">
        <img src="gmail.png" alt="" />
        <img src="twitter2.png" alt="" />
        <img src="fb2.png" alt="" />
      </div>
      <form id="teacher2" class="input-group2" method="POST" action="submit.php">
        <input type="text" name="tname" class="input-field2" placeholder="ENTER NAME">
        <input type="text" name="tphone" class="input-field2" placeholder="PHONE NO.">
        <input type="email" name="temail" class="input-field2" placeholder="EMAIL ID" required />
        <input type="text" name="tpassword" class="input-field2" placeholder="ENTER PASSWORD" required />
        <button type="submit" name="tsubmit" class="submit-btn2">SIGN UP</button>
      </form>

      <form id="parent2" class="parent-group2" method="POST" action="submit.php">
        <input type="text" name="pname" class="parent-field2" placeholder="ENTER NAME">
        <input type="text" name="pphone" class="parent-field2" placeholder="ENTER PHONE NUMBER" />
        <input type="text" name="pmpin" class="parent-field2" placeholder="ENTER  M-PIN OF STUDENT" required />
        <input type="text" name="ppassword" class="parent-field2" placeholder="ENTER PASSWORD" required />
        <button type="submit" name="psubmit" class="submit-btn2">SIGN UP</button>
      </form>
      <form id="student2" class="student-group2" method="POST" action="submit.php">
        <input type="text" name="sname" class="student-field2" placeholder="ENTER NAME">
        <input type="text" name="srollno" class="student-field2" placeholder="ENTER ROLL-NO">
        <input type="text" name="sphone" class="student-field2" placeholder="ENTER PHONE">
        <input type="email" name="semail" class="student-field2" placeholder="EMAIL" required />
        <input type="text" name="spassword" class="student-field2" placeholder="ENTER PASSWORD" required />
        <button type="submit" name="ssubmit" class="submit-btn2">SIGN UP</button>
      </form>
    </div>
  </div>
  <script>
    var x = document.getElementById("teacher2");
    var y = document.getElementById("parent2");
    var z = document.getElementById("student2");
    var b = document.getElementById("btn2");

    function teacher() {
      x.style = "0px";
      y.style.left = "-450px";
      z.style.left = "450px";
      b.style.left = "0px";
    }

    function parent() {
      x.style.left = "-450px";
      y.style.left = "0px";
      z.style.left = "450px";
      b.style.left = "100px";
    }

    function student() {
      x.style.left = "-450px";
      y.style.left = "-450px";
      z.style.left = "0";
      b.style.left = "200px";
    }
  </script>
</body>

</html>