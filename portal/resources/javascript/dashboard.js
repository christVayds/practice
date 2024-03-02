document.getElementById("new-photo").addEventListener("click", ()=>{
    var popup = document.getElementById("popup-menu");
    popup.classList.add("user_option_show");
});

document.getElementById("new-photo2").addEventListener("click", ()=>{
    var popup = document.getElementById("popup-menu");
    popup.classList.add("user_option_show");
});

document.getElementById("exitpop").addEventListener("click", ()=>{
    var popup = document.getElementById("popup-menu");
    popup.classList.remove("user_option_show");
});

document.getElementById("fileopener").addEventListener("click", ()=>{
    document.getElementById("fileinput").click();
});