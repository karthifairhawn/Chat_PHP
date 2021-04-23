var ot_id_box = document.getElementById("outgoing_id");
var in_id_box = document.getElementById("incoming_id");
var chatBox = document.getElementById("chat-box");


chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active")
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active")
}


setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/update_chat.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data1 = xhr.response;
                console.log(data1);
                chatBox.innerHTML=data1;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
        }
    }
}    
    let formData = new FormData(form);
    xhr.send(formData);
},200)


function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}