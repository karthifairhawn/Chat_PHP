const searchBox= document.getElementById("search-box");
var user_body = document.getElementById("user_body");

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/users_list.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBox.classList.contains("active")){
                    user_body.innerHTML = data;
                }
        }
    }
}
    xhr.send();
},200)

