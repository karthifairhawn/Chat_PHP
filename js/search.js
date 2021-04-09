
// // Serach Bar JS Start --------------------------------
const searchBox= document.getElementById("search-box");

const searchIcon = document.getElementById("search-icon");
const searchButton = document.getElementById("search-btn");
const crossIcon = document.getElementById("x_mark");



searchIcon.onclick= ()=>{
    searchButton.classList.toggle("active-search-logo");
    searchBox.classList.toggle("active");
    searchIcon.classList.toggle("active-search-icon");
    crossIcon.classList.toggle("x_mark-active")
    searchBox.focus();
}




// // Serach Bar JS End --------------------------------

// Sending value to php

searchBox.onkeyup = ()=>{
    
}