console.log("1");
const submitBtn = document.getElementById("submit");
const errorBox = document.getElementById("error-msg");


const fname = document.getElementById("s_name");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const pass = document.getElementById ("pass");


submitBtn.onclick=() => {
    
   if (fname.value=="" || lname.value=="" || email.value=="" || pass.value=="" ) {

        errorBox.style.display = "flex";
        errorBox.innerHTML = "All fields are required";
   }
}
