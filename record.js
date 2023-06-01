var search_close_btn = document.getElementById("search-close-btn");
var search_box = document.getElementById("search-box");

search_close_btn.addEventListener('click', Toggle);
function Toggle(){
    if (search_close_btn.innerHTML == "Search"){
        search_close_btn.innerHTML = "Close";
        search_close_btn.style.backgroundColor = "red";
        search_close_btn.style.border = "1px solid red";
        search_box.style.display = "flex";
    } else {
        search_close_btn.innerHTML = "Search";
        search_close_btn.style.backgroundColor = "#675cff";
        search_close_btn.style.border = "1px solid #675cff";
        search_box.style.display = "none";
    }
}