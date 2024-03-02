// add new course pop up option
document.getElementById("add").addEventListener("click", ()=>{
    var popup = document.getElementById("popup");
    popup.classList.add("new_section_show");
});
document.getElementById("exitpop").addEventListener("click", ()=>{
    var popup = document.getElementById("popup");
    popup.classList.remove("new_section_show");
});

// add existing student

document.getElementById("add_es").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_add_es");
    popup.classList.add("es_show");
});
document.getElementById("exit_add_es").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_add_es");
    popup.classList.remove("es_show");
});

// assign teacher

document.getElementById("add_t").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_assign_teacher");
    popup.classList.add("at_show");
});
document.getElementById("exit_add_t").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_assign_teacher");
    popup.classList.remove("at_show");
});

// for adding teacher or student pop up action
document.getElementById("add_people").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_option");
    popup.classList.add("new_teacher_show");
});
document.getElementById("exit_add").addEventListener("click", ()=>{
    var popup = document.getElementById("popup_option");
    popup.classList.remove("new_teacher_show");
});

function clickTable(subname){
    console.log(subname);
}