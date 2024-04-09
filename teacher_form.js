
//variable for the adding marks form
var open_marks_form = document.getElementById("add_marks_form");

//variable for the adding attendance form 
var open_atten_form = document.getElementById("add_atten_form");

//variable for the adding assignment form 
var open_assign_form = document.getElementById("add_assign_form");

// varible for the adding homework form
var open_hw_form = document.getElementById("add_hw_form");
//variable for the adding notice form 
var open_notice_form= document.getElementById("add_notice_form");

// variable to handle the update password container
var update_password=document.getElementById("update_pass_container");

//variable to handle doubt container elements
var err_doubt=document.getElementById("answer_sno_err")
var answer_number=document.getElementById("answer_number")

//variable to access the doubt section 
var doubt_container=document.getElementById("add_doubt_forms")


function open_student_doubt(){
    doubt_container.style.display="block";
    open_marks_form.style.display = "none";
    open_atten_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_hw_form.style.display="none"
    open_notice_form.style.display = "none";
    update_password.style.display="none";

}

function doubt_form_close(){
    doubt_container.style.display="none";

}

function val() 
{
    if (answer_number.value==='') {
        err_doubt.style.display="block";
        answer_number.focus();
        return false;
    }
    return true;
    
}

function menu(){
    var menudiv = document.getElementById("menu_div");
    var detaillist = document.getElementById("acadmic_list");
    if(menudiv.style.display==="block"){
        detaillist.style.display="none";
        menudiv.style.display="none";
      
    }else{
        menudiv.style.display="block";
    }
}

function acadmic_detail() {
    var detaillist = document.getElementById("acadmic_list");
    if (detaillist.style.display === "block") {
        detaillist.style.display = "none";
    } else {
        detaillist.style.display = "block";
    }
  }


function mark_form_close() {
    open_marks_form.style.display = "none";
}
function open_marks() {
    open_atten_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_hw_form.style.display="none"
    open_notice_form.style.display = "none";
    update_password.style.display="none";
    doubt_container.style.display="none";
    open_marks_form.style.display = "block";

}
function atten_form_close(){
    open_atten_form.style.display = "none";
}
function open_atten(){
    open_marks_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_hw_form.style.display="none"
    open_notice_form.style.display = "none";
    update_password.style.display="none";
    doubt_container.style.display="none";
    open_atten_form.style.display = "block";
}
function open_assign(){
    open_marks_form.style.display = "none";
    open_atten_form.style.display = "none";
    open_hw_form.style.display="none"
    open_notice_form.style.display = "none";
    update_password.style.display="none";
    doubt_container.style.display="none";
    open_assign_form.style.display = "block";
}
function assign_form_close() {
    open_assign_form.style.display = "none";
}

function hw_form_close(){
    open_hw_form.style.display="none"
}

function open_hw(){
    open_marks_form.style.display = "none";
    open_atten_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_notice_form.style.display = "none";
    update_password.style.display="none";
    doubt_container.style.display="none";
    open_hw_form.style.display="block"
}

function notice_form_close(){
    open_notice_form.style.display = "none";
}
function open_notice(){
    open_marks_form.style.display = "none";
    open_atten_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_hw_form.style.display="none"
    update_password.style.display="none";
    doubt_container.style.display="none";
    open_notice_form.style.display = "block";
}

function update_pass(){
    open_marks_form.style.display = "none";
    open_atten_form.style.display = "none";
    open_assign_form.style.display = "none";
    open_hw_form.style.display="none"
    open_notice_form.style.display = "none";
    doubt_container.style.display="none";
    update_password.style.display="block";
}

function close_update_container(){
    update_password.style.display="none";
}
