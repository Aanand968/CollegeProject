//script for the login page
var x = document.getElementById("teacher");
var y = document.getElementById("parent");
var z = document.getElementById("student");
var b = document.getElementById("btn");

var box1 = document.getElementById("box");
var box2 = document.getElementById("box2");
//variabe to handle the toggel btn of logn and signup page
var teacher_btn = document.getElementById("teacher_btn");
var parent_btn = document.getElementById("parent_btn");
var student_btn = document.getElementById("student_btn");


//script for the sign-up page
var x2 = document.getElementById("teacher2");
var y2 = document.getElementById("parent2");
var z2 = document.getElementById("student2");
var b2 = document.getElementById("btn2");
//for button color management
var teacher2_btn = document.getElementById("teacher2_btn");
var parent2_btn = document.getElementById("parent2_btn");
var student2_btn = document.getElementById("student2_btn");




function close_box1() {
    box1.style.display = "none";
    teacher_btn.style.color = "BLACK";
    parent_btn.style.color = "BLACK";
    student_btn.style.color = "BLACK";
    b.style.left = "0px";
}

function open_login_box() {
    box1.style.display = "block";
    box2.style.display = "none";
    teacher();
}

function teacher() {
    x.style = "0px";
    y.style.left = "-450px";
    z.style.left = "450px";
    b.style.left = "0px";
    teacher_btn.style.color = "WHITE";
    student_btn.style.color = "BLACK";
    parent_btn.style.color = "BLACK";
}

function parent() {
    x.style.left = "-450px";
    y.style.left = "0px";
    z.style.left = "450px";
    b.style.left = "100px";
    teacher_btn.style.color = "BLACK";
    student_btn.style.color = "BLACK";
    parent_btn.style.color = "WHITE";
}

function student() {
    x.style.left = "-450px";
    y.style.left = "-450px";
    z.style.left = "0";
    b.style.left = "200px";
    teacher_btn.style.color = "BLACK";
    student_btn.style.color = "WHITE";
    parent_btn.style.color = "BLACK";
}


function open_signup_box() {
    box1.style.display = "none";
    box2.style.display = "block";
    teacher2();
}

function close_signup_box() {
    box2.style.display = "none";
}

function teacher2() {
    x2.style = "0px";
    y2.style.left = "-450px";
    z2.style.left = "450px";
    b2.style.left = "0px";
    teacher2_btn.style.color = "WHITE";
    parent2_btn.style.color = "BLACK";
    student2_btn.style.color = "BLACK";
}

function parent2() {
    x2.style.left = "-450px";
    y2.style.left = "0px";
    z2.style.left = "450px";
    b2.style.left = "100px";
    teacher2_btn.style.color = " BLACK";
    parent2_btn.style.color = "WHITE";
    student2_btn.style.color = "BLACK";
}

function student2() {
    x2.style.left = "-450px";
    y2.style.left = "-450px";
    z2.style.left = "0";
    b2.style.left = "200px";
    teacher2_btn.style.color = " BLACK";
    parent2_btn.style.color = "BLACK";
    student2_btn.style.color = " WHITE";
}

// checkig is teacher selected the subject
var option = document.getElementById("check_subject");
var err = document.getElementById("err_message");
function val() {
    if (form.select.selectedIndex == 0) {
        err.style.display = "block";
        option.style.border = "1px solid red";
        form.select.focus();
        return false;
    }
    return true;
}
