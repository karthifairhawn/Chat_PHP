// Pass Hide and Show Button Start --------------------------------

const passfield = document.getElementById("pass");
toggleBtn = document.getElementById("pass-hide");

toggleBtn.onclick = ()=>{
    if(passfield.type=='password'){
        passfield.type="text";
    }else{
        passfield.type="password";
    };
};

// Pass Hide and Show Button End --------------------------------

