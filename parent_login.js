//variable to handle the marks container
var marks_container=document.getElementById('mark_container');
//variable to handle the marks container
var atten_container=document.getElementById('atten_container');


//variable to handle the subject 
var vb_atten=document.getElementById('vb_atten_container');
var cg_atten=document.getElementById('cg_atten_container');
var project_atten=document.getElementById('project_atten_container');
var ecom_atten=document.getElementById('ecom_atten_container');


function open_marks_div() {
    marks_container.style.display="block";
    atten_container.style.display='none';
}

function close_marks_container(){
    marks_container.style.display="none";
   
}

function open_atten_div() {
    marks_container.style.display="none";
    atten_container.style.display='block';
}

function close_atten_container(){
    atten_container.style.display='none';
}

function open_vb_atten() {
    vb_atten.style.display='block';
    cg_atten.style.display='none';
    project_atten.style.display='none';
    ecom_atten.style.display='none';
}

function open_cg_atten() {
    vb_atten.style.display='none';
    cg_atten.style.display='block';
    project_atten.style.display='none';
    ecom_atten.style.display='none'; 
}
function open_project_atten() {
    vb_atten.style.display='none';
    cg_atten.style.display='none';
    project_atten.style.display='block';
    ecom_atten.style.display='none'; 
}
function open_ecom_atten() {
    vb_atten.style.display='none';
    cg_atten.style.display='none';
    project_atten.style.display='none';
    ecom_atten.style.display='block'; 
}












