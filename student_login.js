var subject_box = document.getElementById("subject_box");
var all_container = document.getElementById("all_container");
var vb_data = document.getElementById("vb_data");
var cg_data = document.getElementById("cg_data");
var project_data = document.getElementById("project_data");
var ecom_data = document.getElementById("ecom_data");
var update_container = document.getElementById("update_pass_container");

//variable to handle doubt container
var doubt_container = document.getElementById("doubt_container");

//variables to handle the perticular subjects
var vb_answer = document.getElementById("vb_doubt_container");
var cg_answer = document.getElementById("cg_doubt_container");
var project_answer = document.getElementById("project_doubt_container");
var ecom_answer = document.getElementById("ecom_doubt_container");
var vb_doubt_btn=document.getElementById("vb_doubt_answer");
var cg_doubt_btn=document.getElementById("cg_doubt_answer");
var project_doubt_btn=document.getElementById("project_doubt_answer");
var ecom_doubt_btn=document.getElementById("ecom_doubt_answer");

//variable to handle notice contaier
var notice_board = document.getElementById("add_notice_form");

function close_notice_container(){
  notice_board.style.display='none';
  subject_box.style.display = "block";
}

function open_notice(){
  notice_board.style.display='block';
  subject_box.style.display = "none";
  all_container.style.display = "none";
  doubt_container.style.display = "none";
  update_container.style.display = "none";
}
function update_pass() {
  update_container.style.display = "block";
  subject_box.style.display = "none";
  notice_board.style.display='none';
  all_container.style.display = "none";
  doubt_container.style.display = "none";
}
function close_update_container() {
  update_container.style.display = "none";
  subject_box.style.display = "block";
}

function open_doubt() {
  doubt_container.style.display = "block";
  subject_box.style.display = "none";
  all_container.style.display = "none";
  notice_board.style.display='none';
  update_container.style.display = "none";
}

function close_doubt_container() {
  doubt_container.style.display = "none";
  subject_box.style.display = "block";
  vb_doubt_btn.style.boxShadow="none"
  cg_doubt_btn.style.boxShadow="none"
  project_doubt_btn.style.boxShadow="none"
  ecom_doubt_btn.style.boxShadow="none"
}

function open_vb_doubt() {
  vb_answer.style.display = "block";
  cg_answer.style.display = "none";
  project_answer.style.display = "none";
  ecom_answer.style.display = "none";
  vb_doubt_btn.style.boxShadow="0 0 5px 5px white"
  cg_doubt_btn.style.boxShadow="none"
  project_doubt_btn.style.boxShadow="none"
  ecom_doubt_btn.style.boxShadow="none"

}

function open_cg_doubt() {
  vb_answer.style.display = "none";
  cg_answer.style.display = "block";
  project_answer.style.display = "none";
  ecom_answer.style.display = "none";
  vb_doubt_btn.style.boxShadow="none"
  cg_doubt_btn.style.boxShadow="0 0 5px 5px white"
  project_doubt_btn.style.boxShadow="none"
  ecom_doubt_btn.style.boxShadow="none"
}

function open_project_doubt() {
  vb_answer.style.display = "none";
  cg_answer.style.display = "none";
  project_answer.style.display = "block";
  ecom_answer.style.display = "none";
  vb_doubt_btn.style.boxShadow="none"
  cg_doubt_btn.style.boxShadow="none"
  project_doubt_btn.style.boxShadow="0 0 5px 5px white"
  ecom_doubt_btn.style.boxShadow="none"
}

function open_ecom_doubt() {
  vb_answer.style.display = "none";
  cg_answer.style.display = "none";
  project_answer.style.display = "none";
  ecom_answer.style.display = "block";
  vb_doubt_btn.style.boxShadow="none"
  cg_doubt_btn.style.boxShadow="none"
  project_doubt_btn.style.boxShadow="none"
  ecom_doubt_btn.style.boxShadow="0 0 5px 5px white"
}

function menu() {
  var menudiv = document.getElementById("menu_div");
  var detailsDiv = document.getElementById("stu_detail");

  if (menudiv.style.display === "block") {
    menudiv.style.display = "none";
    detailsDiv.style.display = "none";
  } else {
    menudiv.style.display = "block";
  }
}

// student detail list on side menu
function student_detail() {
  var detailsDiv = document.getElementById("stu_detail");
  if (detailsDiv.style.display === "block") {
    detailsDiv.style.display = "none";
  } else {
    detailsDiv.style.display = "block";
  }
}



function close_all_container() {
  subject_box.style.display = "block";
  all_container.style.display = "none";
  vb_data.style.display = "none";
  cg_data.style.display = "none";
  project_data.style.display = "none";
  ecom_data.style.display = "none";
}

function open_vb_details() {
  subject_box.style.display = "none";
  all_container.style.display = "block";
  vb_data.style.display = "flex";
  cg_data.style.display = "none";
  project_data.style.display = "none";
  ecom_data.style.display = "none";
}

function open_cg_details() {
  subject_box.style.display = "none";
  all_container.style.display = "block";
  vb_data.style.display = "none";
  cg_data.style.display = "flex";
  project_data.style.display = "none";
  ecom_data.style.display = "none";
}

function open_project_details() {
  subject_box.style.display = "none";
  all_container.style.display = "block";
  vb_data.style.display = "none";
  cg_data.style.display = "none";
  project_data.style.display = "flex";
  ecom_data.style.display = "none";
}
function open_ecom_details() {
  subject_box.style.display = "none";
  all_container.style.display = "block";
  vb_data.style.display = "none";
  cg_data.style.display = "none";
  project_data.style.display = "none";
  ecom_data.style.display = "flex";
}
