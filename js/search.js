

// // Serach Bar JS Start --------------------------------
const serachBox= document.getElementById("search-box");
const searchIcon = document.getElementById("search-icon");

searchIcon.onclick= ()=>{
    serachBox.classList.toggle("active");
    searchIcon.classList.toggle("active-search-icon");
    serachBox.focus();
}



// // Serach Bar JS End --------------------------------