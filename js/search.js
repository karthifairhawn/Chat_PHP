
// // Serach Bar JS Start --------------------------------

const searchIcon = document.getElementById("search-icon");
const searchButton = document.getElementById("search-btn");
const crossIcon = document.getElementById("x_mark");



searchIcon.onclick= ()=>{
    searchButton.classList.toggle("active-search-logo");
    searchBox.classList.toggle("active");
    searchIcon.classList.toggle("active-search-icon");
    crossIcon.classList.toggle("x_mark-active")
    searchBox.focus();
    if(!searchBox.classList.contains("active")){
        searchBox.value = "";
    }
}




// // Serach Bar JS End --------------------------------

// Sending value to php

var user_body = document.getElementById("user_body");
searchBox.onkeyup = ()=>{
    // if(searchBox.value==""){
    //     searchBox.classList.add("not-typing");
    // }else{
    //     searchBox.classList.remove("not-typing");
    // }
    let searchterm = searchBox.value;
    if(searchterm!=""){
        let xhr = new XMLHttpRequest();
        xhr.open("POST","php/search.php",true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    user_body.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchterm);
    }
}